<?php

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', function (Request $request) {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        $error = false;
        return response(compact('error'), 204);
    });
});


Route::post('/login', function (LoginRequest $request) {
    $data = $request->validated();
    $error = false;

    if (!Auth::attempt($data)) {
        $error = true;
        return response([
            'error' => $error,
            'message' => 'No user match for given credentials'
        ]);
    }

    $user = Auth::user();
    $token = $user->createToken('main')->plainTextToken;
    return response(compact('user', 'token', 'error'));
});

Route::post('/signup', function (SignupRequest $request) {
    $data = $request->validated();
    $error = false;
    User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => \Hash::make($data['password'])
    ]);

    Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);

    $user = Auth::user();
    $token = $user->createToken('main')->plainTextToken;
    return response(compact('user', 'token', 'error'));
});
