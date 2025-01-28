<?php

use App\Http\Controllers\anyController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostControlle;
use App\Http\Controllers\PostModelController;
use App\Http\Controllers\ProvisionServer;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Helper\FormatterHelper;



Route::get('/', function () {
//    Storage::disk('local')->put('test.txt', 'Hello World');


});

Route::get('get',[anyController::class,'index']);

// Route::post('upload/image',[anyController::class,'store'])->name('upload');

Route::get('view',[anyController::class,'index'])->name('view');










