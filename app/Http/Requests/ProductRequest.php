<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|max:100',
            'description' => 'max:400'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El nombre es necesario para crear el producto',
            'name.max' => 'La nombre no debe superar los 100 carateres',
            'description.max' => 'La descripción no debe superar los 400 carateres'
        ];
    }
}
