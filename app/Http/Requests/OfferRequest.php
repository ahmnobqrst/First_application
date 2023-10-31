<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'name_ar'=>'required|unique:offers',
            'name_en'=>'required|unique:offers',
            'details_ar'=>'required|max:200',
            'details_en'=>'required|max:200',
            'price'=>'numeric|required',
        ];
    }

    public function messages(){

        return [

    'name_ar.required'=>__('message.offer name arabic required'),
    'name_en.required'=>__('message.offer name english required'),
    'name_ar.unique'=>__('message.offer name arabic unique'),
    'name_en.unique'=>__('message.offer name english unique'),
    'details_ar.required'=>__('message.Description arabic'),
    'details_en.required'=>__('message.Description english'),
    'price.required'=>__('message.offer price required'),
    'price.numeric'=>__('message.offer price numeric'),
   ];
    }
}
