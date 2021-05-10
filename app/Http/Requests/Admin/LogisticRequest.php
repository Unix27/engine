<?php

namespace App\Http\Requests\Admin;

class LogisticRequest extends Request
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

        ];
    }
}
