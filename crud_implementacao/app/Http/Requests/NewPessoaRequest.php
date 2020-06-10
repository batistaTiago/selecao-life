<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CPFValidationRule;

class NewPessoaRequest extends FormRequest
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
            'nome' => ['required', 'string', 'min:2', 'max:255'],
            'cpf' => ['required', 'unique:pessoas', new CPFValidationRule],
            'email' => ['required', 'unique:pessoas', 'email'],
            'data_nasc' => ['required', 'date_format:Y-m-d'],
            'nacionalidade' => ['required', 'string', 'min:2', 'max:2']
        ];
    }
}
