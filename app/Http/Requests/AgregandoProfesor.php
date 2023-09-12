<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgregandoProfesor extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "nombre" => "required|max:34",
            "correo" => "required|email|unique:usuarios,correo",
            "contrasena" => "required|min:8|max:16|custom_password",
            "identificacion" => "required|numeric|unique:usuarios,identificacion"
        ];
    }
    public function attributes()
    {
        return [
            "nombre" => "Nombre",
            "correo" => "Correo",
            "contrasena" => "Contraseña",
            "identificacion" => "Cedula"
        ];
    }
    public function messages()
    {
        return [
            "contrasena.custom_password" => "Debe contener almenos un caracter en mayuscula, un numero y una longitud entre 8 y 16 caracteres"
        ];
    }
}
