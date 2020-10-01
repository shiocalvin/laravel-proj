<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonorUpdateRequest extends FormRequest
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
            //
            'nida'=>'required',
            'first_name'=>'required',
            'middle_name'=>'required',
            'last_name'=>'required',
            'region_id'=>'required',
            'district_id'=>'required',
            'ward_id'=>'required',
            'gender'=>'required',
            'date_of_birth'=>'required',
        ];
    }
}
