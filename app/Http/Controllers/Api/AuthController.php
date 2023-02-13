<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required | email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);
        if(!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Email atau Password tidak sesuai'
            ], 401);
        }

        $user = Auth::user();
        return response()->json([
            'status' => 'success',
            'auth' => [
                'access_token' => $token,
                'type' => 'bearer'
            ]
        ]);
    }

    public function user_logged_in() {
        return response()->json(auth()->user());
    }

    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
