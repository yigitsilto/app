<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;

class PassportAuthController extends Controller
{
    /**
     * Registration Req
     */
    public function register(RegisterRequest $request)
    {
        // generate username from name
        $username = uniqid(str_replace(' ', '-', $request->name));
        $registerData = array_merge($request->validated(), ['username' => $username]);

        $user = User::create($registerData);

        $token = $user->createToken($request->email)->accessToken;

        return response()->json(['token' => $token], 200);
    }

    /**
     * Login Req
     */
    public function login(LoginRequest $request)
    {
        if (auth()->attempt($request->validated())) {
            $token = auth()->user()->createToken($request->email)->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Email or password is incorrect'], 401);
        }
    }

    public function userInfo()
    {

        $user = auth()->user();

        return response()->json(['user' => $user], 200);

    }
}
