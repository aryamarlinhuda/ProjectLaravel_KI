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

use App\Controllers\MahasiswaController;
Route::controller(MahasiswaController::class)->group(function(){
    Route::get('/add-mahasiswa',[MahasiswaController::class,'add']);
    Route::get('/edit-mahasiswa',[MahasiswaController::class,'edit']);
    Route::get('/delete-mahasiswa',[MahasiswaController::class,'delete']);
});

use App\Controllers\MahasiswaBuilderController;
Route::controller(MahasiswaController::class)->group(function(){
    Route::get('/query/add-mahasiswa',[MahasiswaBuilderController::class,'add']);
    Route::get('/query/edit-mahasiswa',[MahasiswaBuilderController::class,'edit']);
    Route::get('/query/delete-mahasiswa',[MahasiswaBuilderController::class,'delete']);
});

Route::get('/halo', function(){
    return '<h1>'.halo().'</h1>';
});

use App\Controllers\loginController;
Route::group(['middleware' => ['access']], function(){
    Route::controller(loginController::class)->group(function(){
        Route::get('/login',[loginController::class,'index']);
        Route::post('/submit',[loginController::class.'submit']);
    });
});

use App\Controllers\MasukController;
Route::get('/index',[MasukController::class,'index']);
Route::get('/masuk',[MasukController::class,'masuk']);

use App\Controllers\MasukMiddleware;
Route::group(['middleware' => ['ceksession']], function(){
    Route::get('/informasi',[MasukController::class,'lanjut']);
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
