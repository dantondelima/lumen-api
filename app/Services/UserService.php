<?php

namespace App\Services;

use App\Utils\ResponseUtil;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Hash;

class UserService extends AbstractService
{

    public function gerarToken(array $data)
    {
        $user = $this->repository->findByEmail($data['email']);

        if(is_null($user) || !Hash::check($data['password'], $user->password)){
            return ResponseUtil::notAuthorizedResponse();
        }

        $token = JWT::encode(
            ['email' => $data['email']],
            env('JWT_key')
        );

        return [
            'access_token' => $token
        ];
    }
}
