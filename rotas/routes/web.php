<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return "<h1> LARAVEL </h1>";
});

Route::get('/ola', function () {
    return "Seja bem vindo!!!!!";
});

Route::get('/ola/sejabemvindo', function () {
	return view('welcome');
});

Route::get('/nome/{nome}/{sobrenome}', function($nome, $sobrenome){
	return "<h1> Olá, $nome $sobrenome </h1>";
});

//parametros
Route::get('/repetir/{nome}/{n}', function($nome, $n){
	if(is_integer($n)){
		for($i=0; $i<$n; $i++){
			echo "<h1>Olá, $nome</h1>";
		}
	} else {
		echo "Você não digitou um inteiro.";
	}
	
});

//parametro obrigatorio e com regra
Route::get('/seunomecomregra/{nome}/{n}', function($nome, $n){
	for($i=0; $i<$n; $i++){
		echo "<h1>Olá, $nome! ($i)</h1>";
	}
})->where('n', '[0-9]+')->where('nome', '[A-Za-z]+');

//parametro nao obrigatorio
Route::get('/seunomesemregra/{nome?}', function($nome = null){
	if(isset($nome)){
		echo "<h1>Olá, $nome!</h1>";
	} else {
		echo "Voce nao passou nenhum nome";
	}
});

//agrupamento de rotas (fica mais organizado com hierarquias)
Route::prefix('app')->group(function(){
	Route::get("/", function(){
		return "Pagina principal do APP";
	});
	Route::get("/profile", function(){
		return "Pagina profile";
	});
	Route::get("/about", function(){
		return "Meu about";
	});
});

Route::redirect('/aqui', '/ola', 301);

//mesma coisa que o de baixo
//Route::get('/hello', function(){
//	return view('hello');
//});

Route::view('/hello', 'hello');

//passando parametros para a view
Route::view('/viewnome', 'hellonome', ['nome' => 'Joao', 'sobrenome' => 'Silva']);

Route::get('/hellonome/{nome}/{sobrenome}', function($nome, $sn){
	return view('hellonome', ['nome' => $nome, 'sobrenome' => $sn]);
});

//diferentes tipos de métodos HTTP
Route::get('/rest/hello', function(){
	return "Hello (GET)";
});

Route::post('/rest/hello', function(){
	return "Hello (POST)";
});

Route::delete('/rest/hello', function(){
	return "Hello (DELETE)";
});

Route::put('/rest/hello', function(){
	return "Hello (PUT)";
});

Route::patch('/rest/hello', function(){
	return "Hello (PATCH)";
});

Route::options('/rest/hello', function(){
	return "Hello (OPTIONS)";
});

//recebendo um formulario via POS
Route::post('/rest/imprimir', function(Request $req){
	$nome = $req->input('nome');
	$idade = $req->input('idade');
	return "Hello $nome ($idade)!! (POST)";
});

//atendendo mais de um método com a mesma rota
Route::match(['get', 'post'], '/rest/hello2', function(){
	return "Hello word 2";
});

//atendendo qualquer método
Route::any('/rest/hello3', function(){
	return "Hello word 3";
});

//nomear rotas
Route::get('/produtos', function(){
	echo "<h1>Produtos</h1>";
	echo "<ol>";
	echo "<li>Notebook</li>";
	echo "<li>Impressora</li>";
	echo "<li>Mouse</li>";
	echo "</ol>";
})->name('meusprodutos');

//utilizando a rota nomeada
//utilizar barra invertida quando for usar aspas dupas dentro de aspas duplas
Route::get('/linkprodutos', function(){
	$url = route('meusprodutos');
	echo "<a href=\"" . $url . "\">Meus produtos</a>";
});

//utilizando a rota nomeada
Route::get('/redirecionarprodutos', function(){
	return redirect()->route('meusprodutos');
});