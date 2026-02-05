<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Testcontroller;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/teste',[Testcontroller::class,'envia_teste']);


Route::get('/soma',[Testcontroller::class,'soma']);


Route::post('/salva_carro',[Testcontroller::class,'salva_carro']);


Route::get('/exibe_carro/{id}',[Testcontroller::class,'exibe_carro']);


Route::get('/todos_carros',[Testcontroller::class,'todos_carros']);