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
	    'firstName' => 'required|string',
	    'lastName' => 'required|string',
	    'companyName' => 'nullable|string',
            'email' => 'required|email',
            'phone' => 'required|integer|digits:10',
            'ext' => 'nullable|integer',
            'plan' => ['required', 'string', 'regex:/\d+[:]\d+/'],
            'currentProvider' => 'nullable|string',
            'referrer' => 'nullable|string',
	    'serviceLine1' => 'required|string',
	    'serviceLine2' => 'nullable|string',
	    'serviceCity' => 'required|string',
	    'serviceState' => 'required|string|size:2',
	    'serviceZip' => 'required|integer|digits:5',
	    'serviceLat' => 'required|numeric|between:-90,90',
	    'serviceLong' => 'required|numeric|between:-90,90',
	    'billingLine1' => 'required|string',
            'billingLine2' => 'nullable|string',
            'billingCity' => 'required|string',
            'billingState' => 'required|string|size:2',
            'billingZip' => 'required|integer|digits:5',
	];
    }
}
