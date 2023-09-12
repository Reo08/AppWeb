<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreandoTest extends FormRequest
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
            "preguntaUno" => "required|max:250",
            "preguntaDos" => "required|max:250",
            "preguntaTres" => "required|max:250",
            "preguntaCuatro" => "required|max:250",
            "preguntaCinco" => "required|max:250",
            "P1RespuestaUno" => "required|max:200",
            "P1RespuestaDos" => "required|max:200",
            "P1RespuestaTres" => "required|max:200",
            "P2RespuestaUno" => "required|max:200",
            "P2RespuestaDos" => "required|max:200",
            "P2RespuestaTres" => "required|max:200",
            "P3RespuestaUno" => "required|max:200",
            "P3RespuestaDos" => "required|max:200",
            "P3RespuestaTres" => "required|max:200",
            "P4RespuestaUno" => "required|max:200",
            "P4RespuestaDos" => "required|max:200",
            "P4RespuestaTres" => "required|max:200",
            "P5RespuestaUno" => "required|max:200",
            "P5RespuestaDos" => "required|max:200",
            "P5RespuestaTres" => "required|max:200"
        ];
    }
    public function attributes()
    {
        return [
            "nombre_test"=> "Nombre del test",
            "preguntaUno" => "Pregunta 1",
            "preguntaDos" => "Pregunta 2",
            "preguntaTres" => "Pregunta 3",
            "preguntaCuatro" => "Pregunta 4",
            "preguntaCinco" => "Pregunta 5",
            "P1RespuestaUno" => "Respuesta 1",
            "P1RespuestaDos" => "Respuesta 2",
            "P1RespuestaTres" => "Respuesta 3",
            "P2RespuestaUno" => "Respuesta 1",
            "P2RespuestaDos" => "Respuesta 2",
            "P2RespuestaTres" => "Respuesta 3",
            "P3RespuestaUno" => "Respuesta 1",
            "P3RespuestaDos" => "Respuesta 2",
            "P3RespuestaTres" => "Respuesta 3",
            "P4RespuestaUno" => "Respuesta 1",
            "P4RespuestaDos" => "Respuesta 2",
            "P4RespuestaTres" => "Respuesta 3",
            "P5RespuestaUno" => "Respuesta 1",
            "P5RespuestaDos" => "Respuesta 2",
            "P5RespuestaTres" => "Respuesta 3"
        ];
    }
}
