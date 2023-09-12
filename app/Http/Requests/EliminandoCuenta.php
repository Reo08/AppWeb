<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EliminandoCuenta extends FormRequest
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
        //En "correo" falta la regla: sometimes|exists:usuarios,correo, pero la quite por que es mejor enviar una alerta
        return [
            "correo" => "required"
        ];
    }
    public function attributes()
    {
        return [
            "correo" => "Correo"
        ];
    }
    public function messages()
    {
        return [
            "correo.exists" => "No existe la cuenta con este correo"
        ];
    }
}
