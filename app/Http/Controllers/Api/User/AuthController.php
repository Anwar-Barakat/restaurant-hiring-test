<?php

namespace App\Http\Controllers\Api\User;

use App\Exceptions\GeneralJsonException;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login', 'register']]);
    }

    public function register(RegisterUserRequest $request)
    {
        $validation = $request->only(['name', 'email', 'password',]);
        $user       = User::create(array_merge($validation, ['password' => Hash::make($request->password)]));
        $token      = Auth::login($user);

        return new JsonResponse([
            'status'        => 'success',
            'message'       => 'User created successfully',
            'user'          => new UserResource($user),
            'authorization' => [
                'token'         => $token,
                'type'          => 'bearer',
            ]
        ]);
    }

    public function login(LoginUserRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $token       = Auth::attempt($credentials);

        throw_if(!$token, GeneralJsonException::class, 'Unauthorized', 401);

        $user = Auth::user();
        return response()->json([
            'status'        => 'success',
            'user'          => new UserResource($user),
            'authorization' => [
                'token'         => $token,
                'type'          => 'bearer',
            ]
        ]);
    }

    public function profile()
    {
        if (!Auth::check())
            return new JsonResponse([
                'message' => 'Unauthorized',
            ]);

        return new UserResource(Auth::user());
    }

    public function logout()
    {
        Auth::logout();
        return new JsonResponse([
            'status'    => 'success',
            'message'   => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return new JsonResponse([
            'status'        => 'success',
            'user'          => Auth::user(),
            'authorization' => [
                'token'         => Auth::refresh(),
                'type'          => 'bearer',
            ]
        ]);
    }
}
