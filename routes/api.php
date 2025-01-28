<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DetailsVarController;
use App\Http\Controllers\VaritiesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['prefix' => 'Tastebite'], function () {
    
Route::get('categories', [CategoriesController::class,'index']);
Route::post('categories/store', [CategoriesController::class,'store']);
Route::post('categories/update/{id}', [CategoriesController::class,'update']);
Route::get('categories/delete/{id}', [CategoriesController::class,'delete']);



Route::group(['prefix' => 'varities'], function () {
    Route::get('{id}/varities', [VaritiesController::class,'index']);
    Route::post('store/{id}', [VaritiesController::class,'store']);
    Route::post('update/{id}', [VaritiesController::class,'update']);
    Route::get('delete/{id}', [VaritiesController::class,'delete']);



    Route::group(['prefix' => 'details_varities'], function () {
        Route::get('{id}/view', [DetailsVarController::class,'index']);
        Route::post('update/{id}', [DetailsVarController::class,'update']);
        Route::get('delete/{id}', [DetailsVarController::class,'delete']);
    });
});
});
