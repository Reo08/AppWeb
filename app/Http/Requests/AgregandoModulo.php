<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgregandoModulo extends FormRequest
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
            "nombre_modulo" => "required|max:250",
            "desc_modulo" => "required|max:250"
        ];
    }
    public function attributes()
    {
        return [
            "nombre_modulo" => "Nombre del modulo",
            "desc_modulo" => "Descripcion del modulo"
        ];
    }
    public function messages()
    {
        return [
            "url_youtube.url" => "El campo debe ser una URL valida"
        ];
    }
}
