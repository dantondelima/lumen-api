<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Utils\ResponseUtil;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TokenController extends Controller
{
    public function gerarToken(Request $request)
    {
        //$this->validate();
        $user = User::where('email', $request->email)->first();

        if(is_null($user) || !Hash::check($request->password, $user->password)){
            return ResponseUtil::notAuthorizedResponse();
        }

        $token = JWT::encode(
            ['email' => $request->email],
            env('JWT_key')
        );

        return [
            'access_token' => $token
        ];
    }
}
