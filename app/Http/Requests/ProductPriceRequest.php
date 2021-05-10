<?php

namespace App\Http\Requests;

use App\Models\Package;
use App\Models\Picture;
use App\Rules\BetweenRule;
use App\Rules\BlacklistDomainRule;
use App\Rules\BlacklistEmailRule;
use App\Rules\BlacklistTitleRule;
use App\Rules\BlacklistWordRule;
use App\Rules\MbAlphanumericRule;
use App\Rules\EmailRule;

class ProductPriceRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'field_option_set' => 'required|array|min:1'
        ];
    }
}
