<?php

Route::get('/', function () {
    return view('pagina');
});

Route::get('/primeiraview', function(){
	return view('minhaview');
});

Route::get('/ola', function(){
	return view('minhaview')->with('nome', 'Joao')->with('sobrenome', 'Silva');
});

Route::get('/ola/{nome}/{sobrenome}', function($nome, $sobrenome){
	//forma 1
	//return view('minhaview')->with
	
	//forma 2
	//$parametros = ['nome' => $nome, 'sobrenome'=> $sobrenome];
	//return view('minhaview', $parametros);

	//forma 3
	//função compact monta o array automaticamente
	return view('minhaview', compact('nome', 'sobrenome'));
});

Route::get('/email/{email}', function($email){
	if(View::exists('email')){
		return view('email', compact('email'));
	} else {
		return view('erro');
	}
});

Route::get('/produtos', 'ProdutoControlador@listar');

Route::get('/secaoprodutos/{palavra}', 'ProdutoControlador@secaoprodutos');
Route::get('/mostraropcoes', 'ProdutoControlador@mostrarOpcoes');

Route::get('/opcoes/{op}', 'ProdutoControlador@opcoes');

Route::get('/loop/for/{n}', 'ProdutoControlador@loopFor');

Route::get('/loop/foreach', 'ProdutoControlador@loopForEach');