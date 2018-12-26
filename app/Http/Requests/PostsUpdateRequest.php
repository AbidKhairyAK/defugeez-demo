<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsUpdateRequest extends FormRequest
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
            'name' => 'required', 
            'address' => 'required', 
            'province_id' => 'required', 
            'regency_id' => 'required', 
            'district_id' => 'required', 
            'village_id' => 'required', 
            'capacity' => 'required', 
            'barracks' => 'required', 
            // 'description' => 'required', 
            'status' => 'required',
        ];
    }
}
