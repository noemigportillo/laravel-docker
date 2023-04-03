<?php

namespace App\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class GetUserController extends BaseController
{
    public function __invoke(): JsonResponse
    {
        return response()->json([
            'error' => 'usuario no encontrado',
        ], Response::HTTP_OK);
    }
}
