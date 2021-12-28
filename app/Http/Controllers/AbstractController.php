<?php

namespace App\Http\Controllers;

use App\Services\AbstractService;
use App\Utils\ResponseUtil;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

abstract class AbstractController extends BaseController
{
    /**
     * @var ArtistaService
     */
    protected $service;

    public function __construct(AbstractService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try{
            $result = $this->service->all();
            $response = ResponseUtil::successResponse($result);
        }catch (\Exception $ex){
            $response = ResponseUtil::errorResponse($ex);
        }

        return response()->json($response, $response['status_code']);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try{
            $result = $this->service->findOrFail($id);
            $response = ResponseUtil::successResponse($result);
        }catch (\Exception $ex){
            $response = ResponseUtil::notFoundResponse();
        }

        return response()->json($response, $response['status_code']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){
        try{
            $result = $this->service->create($request->all());
            $response = ResponseUtil::successCreatedResponse($result);
        }catch (\Exception $ex){
            $response = ResponseUtil::errorResponse($ex);
        }
        return response()->json($response, $response['status_code']);
    }

    public function update($id, Request $request)
    {
        try{
            $result = $this->service->update($id, $request->all());
            $response = ResponseUtil::successUpdatedResponse($result);
        }catch (\Exception $ex){
            $response = ResponseUtil::errorResponse($ex);
        }
        return response()->json($response, $response['status_code']);
    }

    public function destroy($id)
    {
        try{
            $result = $this->service->delete($id);
            $response = ResponseUtil::successDeletedResponse($result);
        }catch (\Exception $ex){
            $response = ResponseUtil::notFoundResponse();
        }

        return response()->json($response, $response['status_code']);
    }
}
