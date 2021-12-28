<?php

namespace App\Validators;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MusicaValidator
{
    private $request;

    public function _construct(Request $request)
    {
        $this->request = $request;
    }

    public function rules()
    {
        return [
            'nome' => 'required',
            'numero' => 'required',
            'escutada' => 'required',
            'artista_id' => 'required'
        ];
    }

    public function messages()
    {
        return [];
    }
}
