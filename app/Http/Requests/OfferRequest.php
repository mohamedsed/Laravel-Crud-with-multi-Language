<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image'=>'required',
            'name_en'=>'required|max:100',
            'name_ar'=>'required|max:100',
            'description_en'=>'required|min:10',
            'description_ar'=>'required|min:10',
            'price'=>'required|numeric',
        ];
    }
    public function  messages(){
          return [
            'image.required'=>__('message.image.required'),
            'name_en.required'=> __('message.Name is required'),
            "name_en.max"=>__('message.The Name must not be greater than 100 characters'),
            "description_en.required"=>__('message.Description is required'),
            "description_en.min"=>__('message.The Description must be at least 10 characters'),
             'name_ar.required'=> __('message.Name is required'),
            "name_ar.max"=>__('message.The Name must not be greater than 100 characters'),
            "description_ar.required"=>__('message.Description is required'),
            "description_ar.min"=>__('message.The Description must be at least 10 characters'),
            "price.required"=>__('message.Price is required'),
            "price.numeric"=>__('message.Price must be Nummber'),


        ];
    }
}
