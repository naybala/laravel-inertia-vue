<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('/categories', CategoryController::class);
Route::post('/upload', function (Request $request) {
    dd($request->all());
});