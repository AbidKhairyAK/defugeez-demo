<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationsUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'chairman' => 'required|max:255',
            'address' => 'required|max:255',
            'village_id' => 'required',
            'district_id' => 'required',
            'regency_id' => 'required',
            'province_id' => 'required',
            'email' => 'required|email|unique:organizations,email,'.$this->route('organization'),
            'phone' => 'required|numeric',
            'account_number' => 'nullable|numeric',
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
