<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\BusinessIdValidationRule;
use Illuminate\Validation\Rule;

class FarmerUpdateRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'corporate_name' => 'required|max:100',
            'trading_name' => 'required|max:100',
            'business_id' => ['bail','required', Rule::unique('farmers', 'business_id')->ignore($this->route('farmer')), new BusinessIdValidationRule()],
            'city' => 'required|max:100|min:3',
            'state' => 'required|alpha:utf8|size:2'

        ];
    }
}
