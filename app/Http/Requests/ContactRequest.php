<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
         # uso de $this->route('contact') na regra unique para o laravel nao acusar duplicidade com o proprio registro que estiver sendo alterado
        return [
        'name' => 'required|string|min:6',
        'contact' => 'required|digits:9|unique:contacts,contact,' . $this->route('contact'),
        'email' => 'required|email|unique:contacts,email,' . $this->route('contact'),
    ];
    }

    public function messages(): array
    {
        return [
            'name.min' => 'O nome deve ter pelo menos 6 caracteres.',
            'contact.digits' => 'O contato deve ter exatamente 9 dígitos.',
            'contact.unique' => 'Este número de contato já está cadastrado.',
            'email.email' => 'Insira um endereço de e-mail válido.',
            'email.unique' => 'Este e-mail já está em uso.',
        ];
    }
}
