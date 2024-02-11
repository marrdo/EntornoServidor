<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMonumentoRequest extends FormRequest
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
            'nombre' => 'required|string|min:1|max:100',
            'aforo' => 'required|numeric',
            'provincia' => 'required|numeric',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.max' => 'El nombre supera el limite de caracteres',
            'aforo.required' => 'El campo aforo es obligatorio, revíselo.',
            'aforo.numeric' => 'El campo aforo debe ser un valor numérico.',
            'provincia.required' => 'El campo provincia es obligatorio.',
            'provincia.numeric' => 'El campo provincia debe ser un valor numérico.',
        ];
    }
}

