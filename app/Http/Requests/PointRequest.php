<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PointRequest extends FormRequest
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
            'address' => 'max:100',
            'area' => 'required',
            'product.*.sale_value' => 'required_with:product.*.id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre del punto es requerido',
            'name.max' => 'El nombre no debe ser mayor a 100',
            'address.max' => 'La dirección no debe ser mayor a 100',
            'area.required' => 'La zona es requerida',
            'product.*.sale_value.required' => 'El producto seleccionado debe contener un valor ',
        ];
    }
}
