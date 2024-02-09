<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tipo_persona'=> 'required|max:50',
            'nombre'=>'required|max:100',
            'tipo_documento'=>'max:50',
            'numero_documento'=>'max:50',
            'direccion'=>'max:250',
            'telefono'=>'max:12',
            'email'=>'max:50', 
        ];
    }
}
