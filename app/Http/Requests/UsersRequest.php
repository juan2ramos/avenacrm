<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
        $dataMethod = ($this->method() == 'POST') ?
            [
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6'
            ] :
            [
                'email' => 'required|email|unique:users,email,' . session('userId'),
                'password' => 'nullable|min:6'
            ];

        return [
            'name' => 'bail|required|min:2|max:100',
            'last_name' => 'required|max:100',
            'email' => $dataMethod['email'],
            'password' => $dataMethod['password'],
            'role' => 'required|min:1'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nombre es requerido',
            'name.min' => 'Debe contener mínimo 2 letras',
            'name.max' => 'No debe superar los 100 caracteres',
            'last_name.required' => 'El apellido es requerido',
            'last_name.max' => 'No debe superar los 100 caracteres',
            'email.required' => 'El mail es requerido',
            'email.email' => 'El mail debe ser valido',
            'email.unique' => 'El ya se encuentra registrado',
            'password.required' => 'EL password es requerido',
            'password.min' => 'Debe contener mínimo 6 caracteres',
            'role' => 'required|min:1'
        ];
    }
}
