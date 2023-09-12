<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgregandoPdfModulo extends FormRequest
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
            "pdf_modulo" => "required|file|mimes:pdf|max:10240"
        ];
    }
    public function attributes()
    {
        return [
            "pdf_modulo" => "Agregar pdf"
        ];
    }
}
