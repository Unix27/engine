<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ForgotPasswordRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'login' => ['required'],
        ];
    
        // reCAPTCHA
		$rules = $this->recaptchaRules($rules);
        
        return $rules;
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        /**
         * @var array $response Is our response data.
         */
        $response = [
            "success" => false, // Here I added a new field on JSON response.
            "message" => __('The given data was invalid.'), // Here I used a custom message.
            "errors" => $validator->errors(), // And do not forget to add the common errors.
        ];

        // Finally throw the HttpResponseException.
        throw new HttpResponseException(response()->json($response, 422));
    }
}
