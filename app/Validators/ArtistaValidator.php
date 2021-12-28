<?php

namespace App\Validators;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArtistaValidator
{
    private $request;

    public function _construct(Request $request)
    {
        $this->request = $request;
    }

    public function rules()
    {
        return [
            'nome' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => "O nome é obrigatório"
        ];
    }
}
