<?php

namespace App\Http\Controllers\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:25',
            'birthdate' => 'required|date|date_format:Y-m-d|before_or_equal:today'
        ];
    }

    public function messages()
    {
        return [
            'birthdate.before_or_equal' => 'Data futura inválida',
            'birthdate.date' => 'Data inválida',
            'birthdate.date_format' => 'Data inválida',
            'birthdate.required' => 'Data obrigatória',
            'name.max' => ' Número de caracteres excedido',
            'name.required' => ' Nome obrigatório'

        ];
    }
}