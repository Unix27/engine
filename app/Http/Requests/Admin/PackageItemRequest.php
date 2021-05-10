<?php

namespace App\Http\Requests\Admin;

class PackageItemRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'          => ['required', 'min:2', 'max:255'],
            'status'          => ['required'],
//            'short_name'    => ['required', 'min:2', 'max:255'],
//            'price'         => ['required', 'numeric'],
//            'currency_code' => ['required'],
        ];
    }
}
