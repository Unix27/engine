<?php

namespace App\Http\Requests;

use App\Helpers\Files\Storage\StorageDisk;
use App\Models\CategoryField;
use App\Models\PostValue;

class CustomFieldRequest extends Request
{
	protected $customFields = [];
	
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$request = request();
		if ($this->has('parent_id') && $this->has('category_id')) {
			$request = $this;
		}
		
		$rules = [];
		
		// Get Category nested IDs
		$catNestedIds = (object)[
			'parentId' => $request->input('parent_id'),
			'id'       => $request->input('category_id'),
		];
		
		// Custom Fields
		$this->customFields = CategoryField::getFields($catNestedIds);
		if ($this->customFields->count() > 0) {
			foreach ($this->customFields as $field) {
				$cfRules = [];
				
				// Check if the field is required
				if ($field->required == 1 && $field->type != 'file') {
					$cfRules[] = 'required';
				}
				
				// Check if the field is an upload type
				if ($field->type == 'file') {
					$fileExists = false;
					
					if ($request->filled('post_id')) {
						$postValue = PostValue::where('post_id', $request->input('post_id'))->where('field_id', $field->tid)->first();
						if (!empty($postValue)) {
							$disk = StorageDisk::getDisk();
							if (trim($postValue->value) != '' && $disk->exists($postValue->value)) {
								$fileExists = true;
							}
						}
					}
					
					if ($field->required == 1) {
						if (!$fileExists) {
							$cfRules[] = 'required';
						}
					}
					
					$cfRules[] = 'mimes:' . getUploadFileTypes('file');
					$cfRules[] = 'min:' . (int)config('settings.upload.min_file_size', 0);
					$cfRules[] = 'max:' . (int)config('settings.upload.max_file_size', 1000);
				}
				
				$rules['cf.' . $field->tid] = $cfRules;
			}
		}
		
		return $rules;
	}
	
	/**
	 * @return array
	 */
	public function messages()
	{
		$messages = [];
		
		if ($this->customFields->count() > 0) {
			foreach ($this->customFields as $field) {
				// If the field is required
				if ($field->required == 1) {
					$messages['cf.' . $field->tid . '.required'] = t('The :field is required.', ['field' => mb_strtolower($field->name)]);
				}
				
				// If the field is an upload type
				if ($field->type == 'file') {
					$messages['cf.' . $field->tid . '.mimes'] = t('The file of :field must be in the good format.', ['field' => mb_strtolower($field->name)]);
					$messages['cf.' . $field->tid . '.min'] = t('The file size of :field may not be lower than :min.', [
						'field' => mb_strtolower($field->name),
						'min'   => (int)config('settings.upload.min_file_size', 0),
					]);
					$messages['cf.' . $field->tid . '.max'] = t('The file size of :field may not be greater than :max.', [
						'field' => mb_strtolower($field->name),
						'max'   => (int)config('settings.upload.max_file_size', 1000),
					]);
				}
			}
		}
		
		return $messages;
	}
}
