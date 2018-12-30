<?php

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categorias', function(){
	//retorna um array de objetos com todos os dados da tabela
	$cat = DB::table('categorias')->get();
	foreach($cat as $c){
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}
	echo "<hr>";
	//retorna todos os dados de uma coluna
	$nomes = DB::table('categorias')->pluck('nome');
	foreach ($nomes as $nome) {
		echo "$nome <br>";
	}
	echo "<hr>";
	//utilizando o WHERE do SQL para retornar apenas os dados desejados, em forma de array
	$cats = DB::table('categorias')->where('id', 1)->get();
	foreach($cats as $c){
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}
	echo "<hr>";
	//utilizando o WHERE do SQL para retornar apenas um elemento, em forma de objeto
	$c = DB::table('categorias')->where('id', 1)->first();
	echo "id: " . $c->id . "; ";
	echo "nome: " . $c->nome . "<br>";

	echo "<p>Retorna um array utilizando LIKE</p>";
	$cat = DB::table('categorias')->where('nome', 'like', '%p%')->get();
	foreach($cat as $c){
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}

	echo "<p>Sentenças lógicas</p>";
	$cat = DB::table('categorias')->where('id', 1)->orWhere('id', 2)->get();
	foreach($cat as $c){
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}

	echo "<p>Intervalos</p>";
	$cat = DB::table('categorias')->whereBetween('id', [1, 2])->get();
	foreach($cat as $c){
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}

	echo "<p>Intervalos</p>";
	$cat = DB::table('categorias')->whereNotBetween('id', [1, 2])->get();
	foreach($cat as $c){
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}

	echo "<p>Conjuntos</p>";
	$cat = DB::table('categorias')->whereIn('id', [1, 3, 4])->get();
	foreach($cat as $c){
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}

	echo "<p>Conjuntos</p>";
	$cat = DB::table('categorias')->whereNotIn('id', [1, 3, 4])->get();
	foreach($cat as $c){
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}

	//Equivalente a um SELECT * FROM categorias WHERE id = 1 AND nome LIKE 'roupas'
	echo "<p>Sentenças lógicas</p>";
	$cat = DB::table('categorias')->where([
		['id', 1],
		['nome', 'roupas']
	])->get();
	foreach($cat as $c){
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}

	echo "<p>Ordenação por nome</p>";
	$cat = DB::table('categorias')->orderBy('nome')->get();
	foreach($cat as $c){
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}

	echo "<p>Ordenação por nome decrescente</p>";
	$cat = DB::table('categorias')->orderBy('nome', 'desc')->get();
	foreach($cat as $c){
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}

});

//Equivalente ao INSERT do SQL
//Route::get('/novascategorias', function(){
//	DB::table('categorias')->insert([
//		['nome' => 'Cama, mesa e banho'],
//		['nome' => 'Informatica'],
//		['nome' => 'Cozinha']
//	]);
//});

//Faz o INSERT e retorna o ID utilizado na criação do registro
//Neste caso, só é possível inserir um registro por vez
Route::get('/novascategorias', function(){
	$id = DB::table('categorias')->insertGetId(
		['nome' => 'Carros']
	);
	echo "Novo ID = $id <br>";
});

//Equivalente ao UPDATE
Route::get('/atualizandocategorias', function(){
	//busca antes do update
	$c = DB::table('categorias')->where('id', 1)->first();
	echo "<p> Antes da atualização </p>";
	echo "id: " . $c->id . "; ";
	echo "nome: " . $c->nome . "<br>";
	//faz o update
	DB::table('categorias')->where('id', 1)->update(['nome' => 'Roupas infantis']);
	//busca depois do update
	$c = DB::table('categorias')->where('id', 1)->first();
	echo "<p> Depois da atualização </p>";
	echo "id: " . $c->id . "; ";
	echo "nome: " . $c->nome . "<br>";
});

//Equivalente ao DELETE
Route::get('/removendocategorias', function(){
	echo "<p> Antes do delete </p>";
	$cat = DB::table('categorias')->get();
	foreach($cat as $c){
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}
	echo "<hr>";

	//faz o delete
	//DB::table('categorias')->where('id', 1)->delete();
	DB::table('categorias')->whereNotIn('id', [1, 2, 3, 4, 5, 6])->delete();
	//busca depois do delete
	echo "<p> Depois do delete </p>";
	$cat = DB::table('categorias')->get();
	foreach($cat as $c){
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}
	echo "<hr>";
});