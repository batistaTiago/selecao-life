<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use App\Rules\CPFValidationRule;

class UpdatePessoaRequest extends FormRequest
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
            'nome' => ['string', 'min:2', 'max:255'],
            'email' => [Rule::unique('pessoas')->ignore($this->id), 'email'],
            'data_nasc' => ['date_format:Y-m-d'],
            'nacionalidade' => ['string', 'min:2', 'max:2']
        ];
    }
}
