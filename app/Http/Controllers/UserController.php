<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function image(Request $request)
    {
        $user = auth()->user();

        $avatar = $request['image'];
        $fileName = $avatar->getClientOriginalName();
        $path = 'uploads/'. $user['id'].'/avatar';

        $avatar->storeAs($path, $fileName, 'public');

        $user->path_to_image = Storage::url($path.'/'.$fileName);
        $user->save();

        return response()->json([
            'user' => $user
        ]);
    }

    public function username(Request $request) {
        $user = auth()->user();

        try {
            $this->validate($request, [
                'username' => 'required|string|between:5,25|unique:users',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'msg' => 'error',
                'errors' => $e->errors()
            ], 422);
        }

        $user->username = $request['username'];
        $user->save();

        return response()->json([
            'user' => $user
        ]);
    }
}
