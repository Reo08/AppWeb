<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EliminandoInscripcion extends FormRequest
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
        // Quite "|sometimes|exists:usuarios,identificacion", de "identificacion", por que lo voy a hacer en el controlador para enviar el mensaje en un alert
        // Quite "|sometimes|exists:cursos,id_cursos", de "id_curso", por que lo voy a hacer en el controlador para enviar el mensaje en un alert
        return [
            "identificacion" => "required|numeric",
            "id_curso" => "required|numeric"
        ];
    }
    public function attributes()
    {
        return [
            "identificacion" => "Identificacion",
            "id_curso" => "Id del curso"
        ];
    }
    public function messages()
    {
        return [
            "identificacion.exists" => "No existe esta identificacion",
            "id_curso.exists" => "No existe el curso con ese Id"
        ];
    }
}
