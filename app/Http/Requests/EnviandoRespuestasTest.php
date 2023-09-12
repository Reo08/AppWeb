<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnviandoRespuestasTest extends FormRequest
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
            "P1opcion" => "required",
            "P2opcion" => "required",
            "P3opcion" => "required",
            "P4opcion" => "required",
            "P5opcion" => "required"
        ];
    }
}
