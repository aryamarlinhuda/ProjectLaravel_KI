<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\Api\ApiResponseController;
Route::controller(ApiResponseController::class)->group(function () {
    Route::get('/list', 'list');
    Route::get('/success', 'success');
    Route::get('/bad-request', 'requestBad');
    Route::get('/401', 'requestUnathorized');
});

use App\Http\Controllers\Api\CrudTodoController;
Route::group(['prefix' => 'todo', 'controller' => CrudTodoController::class], function () {
    Route::get('/list', 'list');
    Route::get('/detail/{id}', 'detail');
    Route::post('/create', 'create');
    Route::post('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'delete');
});

use App\Http\Controllers\Api\CrudUserController;
Route::group(['prefix' => 'user', 'controller' => CrudUserController::class], function () {
    Route::get('/list', 'list');
    Route::get('/detail/{id}', 'detail');
    Route::post('/create', 'create');
    Route::post('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'delete');
});

use App\Http\Controllers\Api\AuthController;
Route::group(['prefix' => 'user-auth', 'controller' => AuthController::class], function () {
    Route::post('login', 'login');
    Route::post('user', 'user_logged_in');
    Route::post('logout', 'logout');
});