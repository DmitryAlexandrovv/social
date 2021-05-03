<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Validator;


class AuthController extends Controller
{
    public function __construct()
    {
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required|string|min:3',
        ]);

        try {
            $this->validate($request, [
                'name' => 'required|string|between:2,60',
                'password' => 'min:6'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'msg' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        }

        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json([
                'status' => 'error',
                'msg' => 'User is not exists'
            ], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            //'expires_in' => auth()->factory()->getTTL() * 60
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ])->header('Authorization', 'Bearer '.$token);
    }

    public function register(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|string|between:2,60|unique:users',
                'email' => 'required|string|email|max:225|unique:users',
                'phone' => 'required|phone:RU|unique:users',
                'password' => 'min:6|required_with:passwordConfirmation|same:passwordConfirmation',
                'passwordConfirmation' => 'min:6'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'msg' => 'error',
                'errors' => $e->errors()
            ], 422);
        }

        $user = User::create(array_merge(
            $request->all(),
            [
                'password' => bcrypt($request->password),
                'path_to_image' => Storage::url('defaults/avatar/avatar.png')
            ]
        ));

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user,
            'success' => true,
        ], 201);
    }


    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }

    public function userProfile()
    {
        return response()->json(auth()->user());
    }

    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

}
