<?php

    use Illuminate\Http\Request;
    use App\Http\Controllers\AuthController;

    Route::post('/signUp', [AuthController::class, 'register']);
    Route::post('/login', 'AuthController@login');
    Route::post('/logout', 'AuthController@logout');
