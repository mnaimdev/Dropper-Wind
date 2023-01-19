<?php

use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\ImageUploadController;
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

// Modal
Route::get('/modal', [ImageUploadController::class, 'modal'])->name('modal');
// fetch all data
Route::get('/all', [ImageUploadController::class, 'showAll'])->name('all.info');
// upload image
Route::post('/image/upload/store', [ImageUploadController::class, 'file_store'])->name('image.upload.store');
