<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VinculandoProfesor extends FormRequest
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
        // Quite "|sometimes|exists:cursos,id_cursos", de "id_cursos", por que lo voy a hacer en el controlador para enviar el mensaje en un alert
        return [
            "identificacion" => "required|numeric",
            "id_cursos" => "required|numeric" 
        ];
    }
    public function attributes()
    {
        return [
            "identificacion" => "Cedula",
            "id_cursos" => "Id del curso" 
        ];
    }
    public function messages()
    {
        return [
            "identificacion.exists" => "No existe la cedula del profesor",
            "id_cursos.exists" => "No existe el Id del curso" 
        ];
    }
}
