<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/nome', 'MeuControlador@getNome');

Route::get('/idade', 'MeuControlador@getIdade');

Route::get('/idade/{n1}/{n2}', 'MeuControlador@Multiplicar');

Route::get('/nomes/{id}', 'MeuControlador@getNomeById');

//monta todas as rotas do controlador passado
Route::resource('/cliente', 'ClienteControlador');

Route::post('/cliente/requisitar', 'ClienteControlador@requisitar');
