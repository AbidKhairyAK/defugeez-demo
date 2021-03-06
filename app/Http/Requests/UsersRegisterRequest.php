<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRegisterRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|max:20',
            'phone' => 'max:15',
        ];

        if ($this->type) {
            $rules = [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|confirmed|max:20',
                'nik' => 'max:17|unique:users,nik',
                'address' => 'required',
                'province_id' => 'required',
                'regency_id' => 'required',
                'district_id' => 'required',
                'village_id' => 'required',
                'phone' => 'max:15',
            ];
        }

        return $rules;
    }
}
