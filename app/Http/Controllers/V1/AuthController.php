<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1;

use App\DTOs\ExternalUserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Services\AuthService;
use Symfony\Component\HttpFoundation\JsonResponse;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService)
    {
    }

    public function login(AuthRequest $request): JsonResponse
    {
        $result = $this->authService->authenticateAcrossAPIs(
            new ExternalUserDTO($request->login, $request->password)
        );

        if ($result) {
            return response()->json([
                'status' => 'success',
                'token' => json_encode($result),
            ]);
        }

        return response()->json([
            'status' => 'failure',
        ]);
    }
}
