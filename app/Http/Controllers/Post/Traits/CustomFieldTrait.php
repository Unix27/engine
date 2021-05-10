<?php

namespace App\Http\Controllers\Post\Traits;


use App\Models\CategoryField;
use App\Models\Field;
use App\Models\Post;
use App\Models\PostValue;
use App\Models\Product;
use App\Models\ProductField;
use App\Models\ProductFieldOption;
use App\Models\ProductOptValPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

trait CustomFieldTrait
{
	/**
	 * Get Category's Custom Fields Buffer
	 *
	 * @param $catNestedIds
	 * @param $languageCode
	 * @param null $errors
	 * @param null $oldInput
	 * @param null $postId
	 * @return string
	 */
	public function getCategoryFieldsBuffer($catNestedIds, $languageCode, $errors = null, $oldInput = null, $postId = null)
	{
		$html = '';
		
		$fields = CategoryField::getFields($catNestedIds, $postId, $languageCode);
		
		if (count($fields) > 0) {
			$view = View::make('post.inc.fields', [
				'fields'       => $fields,
				'languageCode' => $languageCode,
				'errors'       => $errors,
				'oldInput'     => $oldInput,
			]);
			$html = $view->render();
		}
		
		return $html;
	}
	
	/**
	 * Create & Update for Custom Fields
	 *
	 * @param Post $post
	 * @param Request $request
	 * @return array
	 */
	public function createPostFieldsValues(Post $post, Request $request)
	{
		$postValues = [];
		
		if (empty($post)) {
			return $postValues;
		}
		
		// Delete all old PostValue entries, if exist
		$oldPostValues = PostValue::with(['field'])->where('post_id', $post->id)->get();
		if ($oldPostValues->count() > 0) {
			foreach ($oldPostValues as $oldPostValue) {
				if ($oldPostValue->field->type == 'file') {
					if ($request->hasFile('cf.' . $oldPostValue->field->tid)) {
						$oldPostValue->delete();
					}
				} else {
					$oldPostValue->delete();
				}
			}
		}
		
		// Get Category nested IDs
		$catNestedIds = (object)[
			'parentId' => $request->input('parent_id'),
			'id'       => $request->input('category_id'),
		];
		
		// Get Category's Fields details
		$fields = CategoryField::getFields($catNestedIds);
		if ($fields->count() > 0) {
			foreach ($fields as $field) {
				if ($field->type == 'file') {
					if ($request->hasFile('cf.' . $field->tid)) {
						// Get file's destination path
						$destinationPath = 'files/' . strtolower($post->country_code) . '/' . $post->id;
						
						// Get the file
						$file = $request->file('cf.' . $field->tid);
						
						// Check if the file is valid
						if (!$file->isValid()) {
							continue;
						}
						
						// Get filename & file path
						$filename    = $file->getClientOriginalName();
						$extension   = $file->getClientOriginalExtension();
						$newFilename = md5($filename . time()) . '.' . $extension;
						$filePath    = $destinationPath . '/' . $newFilename;
						
						$postValueInfo = [
							'post_id'  => $post->id,
							'field_id' => $field->tid,
							'value'    => $filePath,
						];
						
						$newPostValue = new PostValue($postValueInfo);
						$newPostValue->save();
						
						$this->disk->put($newPostValue->value, File::get($file->getrealpath()));
						
						$postValues[$newPostValue->id] = $newPostValue;
					}
				} else {
					if ($request->filled('cf.' . $field->tid)) {
						// Get the input
						$input = $request->input('cf.' . $field->tid);
						
						if (is_array($input)) {
							foreach ($input as $optionId => $optionValue) {
								$postValueInfo = [
									'post_id'   => $post->id,
									'field_id'  => $field->tid,
									'option_id' => $optionId,
									'value'     => $optionValue,
								];
								
								$newPostValue = new PostValue($postValueInfo);
								$newPostValue->save();
								$postValues[$newPostValue->id][$optionId] = $newPostValue;
							}
						} else {
							$postValueInfo = [
								'post_id'  => $post->id,
								'field_id' => $field->tid,
								'value'    => $input,
							];
							
							$newPostValue = new PostValue($postValueInfo);
							$newPostValue->save();
							$postValues[$newPostValue->id] = $newPostValue;
						}
					}
				}
			}
		}
		
		return $postValues;
	}

    /**
     * Get Post's Custom Fields Values
     * Поск доступных опций атрибутов
     *
     * @param $catNestedIds
     * @param $postId
     * @param null $productId
     * Массив ОБЯЗАТЕЛЬНО должен быть формата: $field_id => $option_id
     * @param null $provider
     * @param array $fieldOptionSet
     * @return \Illuminate\Support\Collection
     */
	public function getPostFieldsValues($catNestedIds, $postId, $productId = null, $provider = null, array $fieldOptionSet = [])
	{
//        $cacheId = 'products.' . $productId . '.customFields.'. implode('-', $fieldOptionSet) . '.' . config('app.locale') . '-' . currency()->getUserCurrency();

        // Get the Post's Custom Fields by its Parent Category
        $customFields = CategoryField::getFields($catNestedIds, $postId, config('app.locale'), $provider);
        // Get the Post's Custom Fields that have a value
        $postValue = [];
        if ($customFields->count() > 0) {
            $selectedField = null;
            foreach ($customFields as $key => $field) {
                if (!empty($field->default)) {
                    if($productId) {
                        if(collect($field->default)->count() == 1) {
                            $fieldOptionSet = array_merge($fieldOptionSet, collect($field->default)->pluck('product_field_option_id')->toArray());
                            $fieldOptionSet = array_unique($fieldOptionSet);
                        }
                        foreach ($field->default as $fieldOption) {
                            if (sizeof($fieldOptionSet) > 0) {
                                if(in_array($fieldOption->product_field_option_id, $fieldOptionSet)) {
                                    $field->setAttribute('selected_option_name', $fieldOption->value);
                                    $fieldOption->setAttribute('selected', 1);
                                } else {
                                    if(!in_array($field->id, array_keys($fieldOptionSet))) {
                                        $fieldOptionSetPrices = $this->getPostFieldOptionPreSetPrices($productId, array_merge($fieldOptionSet, [$fieldOption->product_field_option_id]), true);
                                        $fieldOption->setAttribute('disabled', (!$fieldOptionSetPrices->count()));
                                    }
                                }
                            } else {
                                $fieldOptionSetPrices = $this->getPostFieldOptionPreSetPrices($productId, [$fieldOption->product_field_option_id]);
                                $fieldOption->setAttribute('disabled', !$fieldOptionSetPrices->count());
                            }
                        }
                        $postValue[$key] = $field;
                    } else {
                        $postValue[$key] = $field;
                    }
                }
            }
        }

        return collect($postValue);
    }

    /**
     * Поиск доступных цен опций атрибутов
     * Ид продукта ))
     * @param int $productId
     * Набор атрибутов для поиска цен
     * @param array $fieldOptionSet
     * Метод сравнения наборов атрибутов ($isIdenticalOptionSet = true - поиск идентичного набора атрибутов)
     * @param bool $isIdenticalOptionSet
     * @return mixed
     */
    public function getPostFieldOptionPreSetPrices(int $productId, array $fieldOptionSet, $isIdenticalOptionSet = false)
    {
        $cacheId = 'products.' . $productId . '.postFieldOptionPreSetPrices.'. implode('-', $fieldOptionSet) . '.isIdenticalOptionSet.'. $isIdenticalOptionSet . '.' . config('app.locale') . '-' . currency()->getUserCurrency();
        return Cache::remember($cacheId, $this->cacheExpiration, function () use ($productId, $fieldOptionSet, $isIdenticalOptionSet) {
            $product = Product::find($productId);
            $provider = $product->provider;
            $availOptValPrices = $product->availOptValPrices;
            $skuPropIds = [];
            $availOptValPrices->pluck('sku_prop_ids')->each(function ($value) use(&$skuPropIds) {
                $skuPropIds = array_merge($skuPropIds, explode(',', $value));
            });

            $propertyValueIds = ProductFieldOption::$provider()
                ->whereIn('id', $fieldOptionSet)
//                ->whereIn('property_value_id', array_unique($skuPropIds))
                ->pluck('property_value_id')
                ->toArray();

            $sortPropertyValueIds = array_sort($propertyValueIds);
            return $availOptValPrices
                ->filter(function ($row) use($sortPropertyValueIds, $isIdenticalOptionSet) {
                    $res = array_sort(array_intersect($row->sku_prop_ids_array, $sortPropertyValueIds));
                    if($isIdenticalOptionSet) {
                        return array_values($res) === array_values($sortPropertyValueIds);
                    } else {
                        return sizeof($res) > 0;
                    }
                });
        });
    }
//
//    /**
//     * Поиск цены набора атрибутов (По идее это цена с учетом выбора юзером полного набора опций)
//     *
//     * @param int $productId
//     * @param array $optionValueIds
//     * @return mixed
//     */
//    public function getPostFieldOptionSetPrice(int $productId, array $optionValueIds)
//    {
//        $product = Product::find($productId);
//        $provider = $product->provider;
//        $skuPropIds = ProductFieldOption::$provider()
//            ->whereIn('option_id', $optionValueIds)
//            ->orderBy('property_value_id')
//            ->pluck('property_value_id')
//            ->toArray();
//
//        return ProductOptValPrice::trans()
//            ->whereProductId($productId)
//            ->get()
//            ->filter(function ($row) use($skuPropIds) {
//                $sortedProps = array_sort(explode(',', $row->sku_prop_ids));
//                $skuPropIds = array_sort(array_values($skuPropIds));
//                return array_values($sortedProps) === array_values($skuPropIds);
//            })
//            ->first();
//    }
//
//    /**
//     * Поиск цен опций атрибутов при выборе
//     *
//     * @param int $productId
//     * @param array $optionValueIds
//     * @return mixed
//     */
//    public function getPostFieldOptionPreSetPrice(int $productId, array $optionValueIds)
//    {
//        $product = Product::find($productId);
//        $provider = $product->provider;
//        $skuPropIds = ProductFieldOption::$provider()
//            ->whereIn('option_id', $optionValueIds)
//            ->orderBy('property_value_id')
//            ->pluck('property_value_id')
//            ->toArray();
//
//        return ProductOptValPrice::trans()
//            ->whereProductId($productId)
//            ->get()
//            ->filter(function ($row) use($skuPropIds) {
//                $sortedProps = array_sort(explode(',', $row->sku_prop_ids));
//                $skuPropIds = array_sort(array_values($skuPropIds));
//                return array_values($sortedProps) === array_values($skuPropIds);
//            })
//            ->first();
//    }
}
