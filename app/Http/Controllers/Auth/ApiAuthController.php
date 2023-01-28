<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ApiAuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $request['password'] = Hash::make($request['password']);
        $request['remember_token'] = Str::random(10);
        $user = User::create($request->toArray());
        $token = $user->createToken('Api Token')->accessToken;
        $response = ['token' => $token];
        return $this->response($response);
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->toArray())) {
            return $this->response(['error_message' => 'Incorrect Details. Please try again'], self::STATUS_CODE_404);
        }
        $token = Auth::user()->createToken('Api Token')->accessToken;
        return $this->response(['user' => Auth::user(), 'token' => $token]);
    }

    public function logout()
    {
        try {
            if (Auth::check()) {
                Auth::user()->tokens->each(function ($token, $key) {
                    $token->delete();
                });
                return $this->response(['message' => 'Successfully logged out']);
            }
        } catch (\Exception $exception) {
            return $this->response(['message' => $exception->getMessage()], self::STATUS_CODE_500);
        }
    }
}
