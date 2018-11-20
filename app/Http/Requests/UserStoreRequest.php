<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'organization_id'   => 'required',
            'nik'               => 'required|max:17|unique:users,nik',
            'name'              => 'required|max:255',
            'email'             => 'required|max:255|unique:users,email',
            'password'          => 'required|confirmed|max:30',
            'address'           => 'required|max:255',
            'province_id'       => 'required',
            'regency_id'        => 'required',
            'district_id'       => 'required',
            'village_id'        => 'required',
            'phone'             => 'required|max:15',
            'status'            => 'required',
            'role'              => 'required',
        ];
    }
}
