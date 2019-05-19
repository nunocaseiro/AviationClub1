<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|alpha_spaces', //teste
            'nome_informal' => 'required|max:40',
            'nif' => 'max:9',
            'telefone'=> 'max:20',
            'num_socio' => 'required|max:11',
            'file_foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'data_nascimento' => 'required',
            'email' => [
                'email', 'required',
                Rule::unique('users')->ignore($this->user()->id),
            ],
            'num_licenca'=>'max:30',
            'tipo_licenca'=>'exists:users,tipo_licenca',
            'num_certificado'=> 'max:30',
            'classe_certificado'=>'exists:users,classe_certificado',
            'validade_licenca' => 'nullable|date_format:Y-m-d',
            'validade_certificado' => 'date',



        ];
    }
}
