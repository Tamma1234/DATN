<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Models\User;
use Auth;

class AuthenticateController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (Auth::guard('sanctum')->check()) {
            $user = Auth::guard('sanctum')->user();
            $token = explode(' ', request()->header('Authorization'))[1];
            return $this->responseApi(compact('user', 'token'))->header('Authorization', $token);
        }
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken(request('device_id', 'unknow'))->plainTextToken;
            return $this->responseApi(compact('user', 'token'))->header('Authorization', $token);
        }
        $messages = trans('auth.failed');
        return $this->responseApi(compact('messages'), 422);
    }

    public function logout()
    {
        $user = Auth::user();
        if ($token_id = request('token_id')) {
            $user->tokens()->whereId($token_id)->delete();
        } elseif (request('all_device')) {
            $user->tokens()->delete();
        } else {
            $user->currentAccessToken()->delete();
        }
        $messages = trans('auth.logout');
        return $this->responseApi(compact('messages'));
    }

    public function register(RegisterRequest $request)
    {
        $user = new User($request->all());
        $user->save();
        return $this->responseApi(compact('user'));
    }

    public function profile()
    {
        $user = Auth::user();
        return $this->responseApi(compact('user'));
    }
}
