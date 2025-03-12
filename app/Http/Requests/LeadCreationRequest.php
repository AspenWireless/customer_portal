<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadCreationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
	return [
	    'firstName' => 'string|required',
	    'lastName' => 'string|required',
	    'companyName' => 'string|nullable',
	    'serviceAddress' => 'string|required',
	    'billingAddress' => 'string|required',
	    'email' => 'email|required',
	    'phone' => 'string|required',
	    'plan' => 'string|required',
	    'currentProvider' => 'string|nullable',
	    'referrer' => 'string|nullable',
        ];
    }
}
