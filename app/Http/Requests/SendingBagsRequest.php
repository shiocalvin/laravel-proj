<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendingBagsRequest extends FormRequest
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
            'blood_bag_id'=>'required|unique:centre_blood_hospitals,blood_bag_id',
            
        ];
    }
}
