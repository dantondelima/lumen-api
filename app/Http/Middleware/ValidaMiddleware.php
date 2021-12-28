<?php

namespace App\Http\Middleware;

use App\Validators\AbstractValidator;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, \Closure $next)
    {
        $validate = $this->validate($request);
        $response = [
            'status_code' => 400,
            'error' => true,
            'error_message' => 'Dados Inválidos',
            'error_description' => $validate->messages()
        ];

        if($validate->passes()){
            $response = $next($request);
        }
        return $response;
    }

    private function defineValidator(string $namespace)
    {
        $validator = "\App\Validators\\".$namespace."Validator";

        if(class_exists($validator)){
            $validator = new $validator;
        }

        return $validator;
    }

    private function validate(Request $request)
    {
        $alias = $request->route()[1]['as'];
        $validator = $this->defineValidator($alias);

        if(empty($validator)){
            throw new \InvalidArgumentException('O validator '. $alias . ' não existe');
        }

        return Validator::make($request->all(), $validator->rules(), $validator->messages());
    }
}
