<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected const STATUS_CODE_200 = 200;
    protected const STATUS_CODE_404 = 404;
    protected const STATUS_CODE_422 = 422;
    protected const STATUS_CODE_500 = 500;

    public function response(
        array      $data = [],
        int|string $httpCode = self::STATUS_CODE_200,
    ): JsonResponse
    {
        $status = [
            'code' => $httpCode,
            'success' => $httpCode === self::STATUS_CODE_200,
            'msg' => $msg ?? ''
        ];

        return response()->json([
            'data' => $data,
            'status' => $status,
            'errors' => []
        ], $httpCode);
    }
}
