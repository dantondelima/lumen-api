<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use App\Utils\ResponseUtil;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TokenController extends AbstractController
{
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function gerarToken(Request $request)
    {
        try{
            $result = $this->service->gerarToken($request->all());
            $response = ResponseUtil::successResponse($result);
        }catch (\Exception $ex){
            dd($ex);
            $response = ResponseUtil::errorResponse($ex);
        }
        return response()->json($response, $response['status_code']);
    }
}
