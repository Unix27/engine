<?php

namespace App\Http\Requests;

use App\Rules\BetweenRule;
use App\Rules\BlacklistDomainRule;
use App\Rules\BlacklistEmailRule;
use App\Rules\BlacklistTitleRule;
use App\Rules\BlacklistWordRule;
use App\Rules\MbAlphanumericRule;
use App\Rules\EmailRule;

/**
 * Class OrderRequest
 * @package App\Http\Requests
 */
class OrderRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'first_and_last_names' => ['required'],
            'address' => ['required'],
            'post_code' => ['required'],
            'city' => ['required'],
            'country_id' => ['required'],
            'mobile_phone' => ['required'],
            'login' => ['required'],
            'password' => ['required'],
            'payment' => ['required'],
            'shipping' => ['required'],
            'i_agree' => ['required']
        ];

        return $rules;
    }

    /**
     * @return array
     */
    public function messages()
    {
        $messages = [];

        return $messages;
    }
}
