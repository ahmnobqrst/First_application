<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class offer_details extends FormRequest
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
      
      return $rules = [
          
          'name_ar'=>'required|max:100|unique:offers,name_ar',
          'name_en'=>'required|max:100|unique:offers,name_en',
          'price'=>'required|numeric',
          'details_ar'=>'required',
          'details_en'=>'required',
          'photo'=>'required|mimes:png,jpg,jpeg'
        ];

    
    }

    public function messages(){

        return [

          'name_ar.unique' => __('message_offer.name-ar-unique'),
          'name_ar.required' => __('message_offer.name-ar-required'),
          'name_ar.max' => __('message_offer.max-ar-lenght'),
          'name_en.unique' => __('message_offer.name-en-unique'),
          'name_en.required' => __('message_offer.name-en-required'),
          'name_en.max' => __('message_offer.max-en-lenght'),
          'price.numeric' =>__('message_offer.price-number'),
          'price.required' => __('message_offer.price-required'),
          'details_ar.required' => __('message_offer.details-ar'),
          'details_en.required' => __('message_offer.details-en'),
          'photo.required'=>__('message_offer.photo'),
          'photo.mimes'=>__('message_offer.mimes'),
   ];
    }
}
