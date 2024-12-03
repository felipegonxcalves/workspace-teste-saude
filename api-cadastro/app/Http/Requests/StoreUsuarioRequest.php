<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
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
            "nome"                   => "required",
            "email"                  => "required",
            "cpf"                    => "required",
            "id_perfil"              => "required",
            "enderecos"              => "required",
            "enderecos.*.logradouro" => "required",
            "enderecos.*.cep"        => "required",
            "enderecos.*.cidade"     => "required",
            "enderecos.*.estado"     => "required"
        ];
    }
}
