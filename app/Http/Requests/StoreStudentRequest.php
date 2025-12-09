<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
            'document' => 'required|string|max:14', // CPF (com máscara) até 14 caracteres
            'contact' => 'required|string|max:15',  // Telefone (com máscara) até 15 caracteres
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'document' => preg_replace('/\D/', '', $this->document), // Remove qualquer caractere que não seja dígito
            'contact' => preg_replace('/\D/', '', $this->contact),   // Remove qualquer caractere que não seja dígito
        ]);
    }
}
