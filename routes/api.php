<?php

    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\ChatController;
    use App\Http\Controllers\UsersController;
    use App\Http\Controllers\ChatRoomController;
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

    Route::group([
        'middleware' => ['api', 'cors'],
        'prefix' => 'chat'
    ], function() {
        Route::post('/message', [ChatController::class, 'index']);
    });

    Route::group([
        'middleware' => ['api', 'cors'],
        'prefix' => 'user'
    ], function() {
        Route::post('/findById', [UsersController::class, 'findById']);
        Route::post('/findByUsername', [UsersController::class, 'findByUsername']);
    });

    Route::group([
        'middleware' => ['api', 'cors'],
        'prefix' => 'room'
    ], function() {
        Route::post('/findChatRoom', [ChatRoomController::class, 'findChatRoom']);
        Route::get('/getRoomMessages/{chatId}', [ChatRoomController::class, 'getRoomMessages']);
    });
