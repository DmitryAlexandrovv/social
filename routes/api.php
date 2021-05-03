<?php

    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\UserController;
    use Illuminate\Support\Facades\Route;

    Route::group([
        'middleware' => ['api', 'cors'],
        'prefix' => 'auth'
    ], function ($router) {
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/user', [AuthController::class, 'userProfile']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
    });

    Route::group([
        'middleware' => ['api', 'cors'],
        'prefix' => 'updateUser'
    ], function() {
        Route::post('/image', [UserController::class, 'image']);
        Route::post('/username', [UserController::class, 'username']);
    });
