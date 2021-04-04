<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')
            ->only('logout');
    }

    public function register(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|max:60',
                'email' => 'required|email|unique:users',
                'phone' => 'required|max:16|unique:users',
                'password' => 'required|between:6,40',
                'repeatPassword' => 'required|between:6,40'
            ]);
        } catch (ValidationException $e) {
            Log::debug($e);
            return response()->json([
                'status' => 'error',
                'msg' => 'error',
                'errors' => $e->errors()
            ], 422);
        }

        $user = new User($request->all());
        $user->save();

        return response()->json([
            'success' => true
        ]);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|between:6,40'
        ]);

        $user = User::whereEmail($request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $user->api_token = str_random(60);
            $user->save();

            return response()->json([
                'success' => true,
                'user' => $user->info()
            ]);
        }

        return response()->json([
            'errors' => [
                'email' => 'These credentials do not match our records.'
            ]
        ], 422);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->api_token = null;
        $user->save();

        return response()->json([
            'success' => true
        ]);
    }
}
