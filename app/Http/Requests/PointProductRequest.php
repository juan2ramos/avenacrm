<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PointProductRequest extends FormRequest
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
            'products.*.available' => 'required|numeric',
            'products.*.sold' => 'required|numeric'
        ];
    }
    public function messages()
    {
        return [
            'products.*.available.required' => 'El elemento es requerido',
            'products.*.available.numeric' => 'Debe ser un número',
            'products.*.sold.required' => 'El elemento es requerido',
            'products.*.sold.numeric' => 'Debe ser un número',
        ];
    }
}
