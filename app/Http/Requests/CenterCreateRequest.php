<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CenterCreateRequest extends FormRequest
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
            // 'name' => $request->name,
            // 'region'=>$request->region_id,
            // 'zone_id'=>$request->zone_id,
            // 'district'=>$request->district_id,
            // 'ward' =>$request->ward_id

            'name'=>'required',
            'region_id'=>'required',
            'zone_id'=>'required',
            'district_id'=>'required',
            'ward_id'=>'required'



        ];
    }
}
