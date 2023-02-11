<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\MahasiswaController;
Route::controller(MahasiswaController::class)->group(function(){
    Route::get('/add-mahasiswa',[MahasiswaController::class,'add']);
    Route::get('/edit-mahasiswa',[MahasiswaController::class,'edit']);
    Route::get('/delete-mahasiswa',[MahasiswaController::class,'delete']);
});

use App\Http\Controllers\MahasiswaBuilderController;
Route::controller(MahasiswaController::class)->group(function(){
    Route::get('/query/add-mahasiswa',[MahasiswaBuilderController::class,'add']);
    Route::get('/query/edit-mahasiswa',[MahasiswaBuilderController::class,'edit']);
    Route::get('/query/delete-mahasiswa',[MahasiswaBuilderController::class,'delete']);
});

Route::get('/halo', function(){
    return '<h1>'.halo().'</h1>';
});

use App\Http\Controllers\loginController;
Route::group(['middleware' => ['access']], function(){
    Route::controller(loginController::class)->group(function(){
        Route::get('/login',[loginController::class,'index']);
        Route::post('/submit',[loginController::class,'submit']);
    });
});

use App\Http\Controllers\MasukController;
Route::get('/masuk',[MasukController::class,'index']);
Route::post('/masuk/login',[MasukController::class,'masuk']);

use App\Http\Middleware\MasukMiddleware;
Route::group(['middleware' => ['ceksession']], function(){
    Route::get('/informasi',[MasukMiddleware::class,'lanjut']);
});

Route::get('/halo/{nama}', function ($nama) {
    echo '<h1>Halo</h1>';
    echo '<h2>Nama saya '.$nama.'</h2>';
});

use App\Http\Controllers\UploadController;
Route::controller(UploadController::class)->group(function(){
    Route::get('/upload',[UploadController::class,'upload']);
    Route::post('/upload/result',[UploadController::class,'hasil_upload']);
});

Use App\Repositories\BukuRepository;
Route::get('/buku/{id}', function($id){
    return BukuRepository::deleteBuku($id);
});
