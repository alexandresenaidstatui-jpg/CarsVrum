<?php

use Illuminate\Support\Facades\Route;



Route::get('/formulario', function(){
   
    return view('formulario');
});

require __DIR__.'/auth.php';

