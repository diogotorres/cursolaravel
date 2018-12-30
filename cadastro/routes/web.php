<?php

Route::get('/', function () {
    return view('index');
});

Route::get('/produtos', 'ControladorProduto@index');
Route::get('/categorias', 'ControladorCategoria@index');
Route::get('/categorias/novo', 'ControladorCategoria@create');

Route::post('/categorias', 'ControladorCategoria@store');
Route::post('/categorias/{id}', 'ControladorCategoria@update');

Route::get('/categorias/apagar/{id}', 'ControladorCategoria@destroy');
Route::get('/categorias/editar/{id}', 'ControladorCategoria@edit');
