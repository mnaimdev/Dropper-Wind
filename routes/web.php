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

// Image Upload
Route::get('/upload', [DropzoneController::class, 'upload'])->name('upload');
Route::post('/drag/upload', [DropzoneController::class, 'drag_upload'])->name('drag.upload');

Route::get('/all/info', [DropzoneController::class, 'all_info'])->name('all.info');

// Route::post('/image/delete', [DropzoneController::class, 'delete'])->name('delete');








// Dropzone Image Upload

// Route::get('image/upload', [ImageUploadController::class, 'file_create']);

Route::post('/image/upload/store', [ImageUploadController::class, 'file_store'])->name('image.upload.store');

// Route::post('image/delete', 'ImageUploadController@fileDestroy');
