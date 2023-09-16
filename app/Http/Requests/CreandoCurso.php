<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreandoCurso extends FormRequest
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
            "nombre_curso" => "required|max:100",
            "descripcion" => "required|max:255"
        ];
    }
    public function attributes()
    {
        return [
            "nombre_curso" => "Nombre del curso",
            "descripcion" => "Descripcion del curso"
        ];
    }
}
