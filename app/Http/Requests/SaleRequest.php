<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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
            'description'=>'required',
            'products'=>'required',
            'date'=>'required',
            'total'=>'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'description.required'=>'Descrição é Obrigatória',
            'products.required'=>'Insira os dados da venda',
            'date.required'=>'Insira a data',
            'total.required'=>'Total é obrigatório',
            'total.numeric'=>'Total deve ser um número',
        ];
    }
}
