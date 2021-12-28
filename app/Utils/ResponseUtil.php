<?php

namespace App\Utils;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

class ResponseUtil
{
    /**
     * @param array $data
     * @param int $statusCode
     * @return array
     */
    public static function successResponse(array $data, int $statusCode = Response::HTTP_OK): array
    {
        return [
            'status_code' => $statusCode,
            'data' => $data
        ];
    }

    /**
     * @param array $data
     * @param int $statusCode
     * @return array
     */
    public static function successCreatedResponse(array $data, int $statusCode = Response::HTTP_CREATED): array
    {
        return [
            'status_code' => $statusCode,
            'data' => $data
        ];
    }

    public static function successUpdatedResponse(bool $data, int $statusCode = Response::HTTP_OK): array
    {
        return [
            'status_code' => $statusCode,
            'data' => "Updated successfully"
        ];
    }

    public static function successDeletedResponse(bool $data, int $statusCode = Response::HTTP_OK): array
    {
        return [
            'status_code' => $statusCode,
            'data' => "Deleted successfully"
        ];
    }

    /**
     * @param Exception $e
     * @param int $statusCode
     * @return array
     */
    public static function errorResponse(Exception $e, int $statusCode = Response::HTTP_BAD_REQUEST): array
    {
        return [
            'status_code' => $statusCode,
            'error' => true,
            'error_description' => $e->getMessage()
        ];
    }


    /**
     * @param Exception $e
     * @param int $statusCode
     * @return array
     */
    public static function notFoundResponse(int $statusCode = Response::HTTP_NOT_FOUND): array
    {
        return [
            'status_code' => $statusCode,
            'error' => true,
            'error_description' => 'Data not found'
        ];
    }

    /**
     * @param int $statusCode
     * @return array
     */
    public static function notAuthorizedResponse(int $statusCode = Response::HTTP_UNAUTHORIZED): array
    {
        return [
            'status_code' => $statusCode,
            'error' => true,
            'error_description' => 'Unauthorized'
        ];
    }
}
