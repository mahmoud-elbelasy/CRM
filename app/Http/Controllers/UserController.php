<?php

namespace App\Http\Controllers;

use Crm\User\Services\UserService;
use Crm\User\Requests\UserCreationRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;
    const TOKEN_NAME = 'personal';
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function create(UserCreationRequest $request)
    {
        $user = $this->userService->create($request);

        return response()->json([
            'user' => $user,
            'token' => $user->createToken(self::TOKEN_NAME)->plainTextToken
        ]);
    }
}
