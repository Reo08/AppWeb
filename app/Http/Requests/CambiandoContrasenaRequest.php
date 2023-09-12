<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CambiandoContrasenaRequest extends FormRequest
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
            "contrasena" => "required",
            "contrasena_nueva" => "required|min:8|max:16|custom_password",
            "contrasena_nueva2" => "required"
        ];
    }
    public function attributes()
    {
        return [
            "contrasena" => "Contraseña actual",
            "contrasena_nueva" => "Contraseña nueva",
            "contrasena_nueva2" => "Confirmar contraseña"
        ];
    }
    public function messages()
    {
        return [
            "contrasena_nueva.custom_password" => "Debe contener almenos un caracter en mayuscula, un numero y una longitud entre 8 y 16 caracteres"
        ];
    }
}
