<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Auth\Traits\VerificationTrait;
use Larapen\Admin\app\Http\Controllers\PanelController;
use App\Models\PostType;
use App\Models\Category;
use App\Http\Requests\Admin\ProductRequest as StoreRequest;
use App\Http\Requests\Admin\ProductRequest as UpdateRequest;

class ProductController extends PanelController
{
	use VerificationTrait;
	
	public function setup()
	{
		/*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
		$this->xPanel->setModel('App\Models\Product');
		$this->xPanel->setRoute(admin_uri('products'));
		$this->xPanel->setEntityNameStrings('product', 'products');
//		$this->xPanel->denyAccess(['create']);
		if (!request()->input('order')) {
			$this->xPanel->orderBy('created_at', 'DESC');
		}
        $this->xPanel->enableDetailsRow();
        $this->xPanel->allowAccess(['reorder', 'details_row']);

		$this->xPanel->addButtonFromModelFunction('top', 'bulk_delete_btn', 'bulkDeleteBtn', 'end');
		
		// Hard Filters
		if (request()->filled('active')) {
			if (request()->get('active') == 0) {
				$this->xPanel->addClause('where', 'verified_email', '=', 0);
				$this->xPanel->addClause('orWhere', 'verified_phone', '=', 0);
				if (config('settings.single.posts_review_activation')) {
					$this->xPanel->addClause('orWhere', 'reviewed', '=', 0);
				}
			}
			if (request()->get('active') == 1) {
				$this->xPanel->addClause('where', 'verified_email', '=', 1);
				$this->xPanel->addClause('where', 'verified_phone', '=', 1);
				if (config('settings.single.posts_review_activation')) {
					$this->xPanel->addClause('where', 'reviewed', '=', 1);
				}
			}
		}
		
		// Filters
		// -----------------------
		$this->xPanel->addFilter([
			'name'  => 'id',
			'type'  => 'text',
			'label' => 'ID',
		],
		false,
		function ($value) {
			$this->xPanel->addClause('where', 'post_id', '=', $value);
		});
		// -----------------------
		$this->xPanel->addFilter([
			'name'  => 'from_to',
			'type'  => 'date_range',
			'label' => trans('admin::messages.Date range'),
		],
		false,
		function ($value) {
			$dates = json_decode($value);
			$this->xPanel->addClause('where', 'created_at', '>=', $dates->from);
			$this->xPanel->addClause('where', 'created_at', '<=', $dates->to);
		});
		// -----------------------
		$this->xPanel->addFilter([
			'name'  => 'title',
			'type'  => 'text',
			'label' => trans('admin::messages.Title'),
		],
		false,
		function ($value) {
			$this->xPanel->addClause('where', 'title', 'LIKE', "%$value%");
		});

		/*
		|--------------------------------------------------------------------------
		| COLUMNS AND FIELDS
		|--------------------------------------------------------------------------
		*/
		// COLUMNS
		$this->xPanel->addColumn([
			'name'  => 'id',
			'label' => '',
			'type'  => 'checkbox',
			'orderable' => false,
		]);
		$this->xPanel->addColumn([
			'name'  => 'created_at',
			'label' => trans("admin::messages.Date"),
			'type'  => 'datetime',
		]);
		$this->xPanel->addColumn([
			'name'          => 'title',
			'label'         => trans("admin::messages.Title"),
			'type'          => 'model_function',
			'function_name' => 'getTitleHtml',
		]);
        $this->xPanel->addColumn([
            'name'          => 'formated_activity_price', // Put unused field column
            'label'         => trans("admin::messages.Main Picture"),
            'type'          => 'model_function',
            'function_name' => 'getPictureHtml',
        ]);

		$this->xPanel->addColumn([
			'name'          => 'provider',
			'label'         => 'Provider',
			'type'          => 'model_function',
			'function_name' => 'getProviderHtml',
		]);

		// FIELDS
		$this->xPanel->addField([
			'name'       => 'title',
			'label'      => trans("admin::messages.Title"),
			'type'       => 'text',
			'attributes' => [
				'placeholder' => trans("admin::messages.Title"),
			],
		]);
		$this->xPanel->addField([
			'name'       => 'description',
			'label'      => trans("admin::messages.Description"),
			'type'       => (config('settings.single.simditor_wysiwyg'))
				? 'simditor'
				: 'textarea',
			'attributes' => [
				'placeholder' => trans("admin::messages.Description"),
				'id'          => 'description',
				'rows'        => 10,
			],
		]);
	}
	
	public function store(StoreRequest $request)
	{
		return parent::storeCrud();
	}
	
	public function update(UpdateRequest $request)
	{
		return parent::updateCrud();
	}
	
	public function postType()
	{
		$entries = PostType::trans()->get();
		
		return $this->getTranslatedArray($entries);
	}
}
