<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CreateTokenRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SanctumController extends Controller
{
    public function create(CreateTokenRequest $request): JsonResponse
    {
        $result = [
            'token' => $request->user->createToken(
                $request->userAgent()
            )->plainTextToken
        ];

        return response()->json($result, Response::HTTP_CREATED);
    }

    public function revokeAll(): JsonResponse
    {
        Auth::user()->tokens()->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
