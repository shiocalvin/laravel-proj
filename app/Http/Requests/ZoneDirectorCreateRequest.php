<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZoneDirectorCreateRequest extends FormRequest
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
            

            'nida'=>'required|unique:nbts_employees,employees_nida',
            'first_name'=>'required',
            'last_name'=>'required',
            'gender'=>'required',
            'date_of_birth'=>'required',
            'position'=>'required',
            
        ];         
    }
}
