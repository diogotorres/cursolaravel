<?php

use App\Categorias;

Route::get('/', function () {
    $categorias = Categorias::all();
    foreach($categorias as $c){
    	echo "id: " . $c->id . ', ';
    	echo "nome: " . $c->nome . "<br>";
    }
});

Route::get('/inserir/{nome}', function($nome){
	$cat = new Categorias();
	$cat->nome = $nome;
	$cat->save();
	return redirect('/');
});

Route::get('/categoria/{id}', function($id){
	$cat = Categorias::find($id);
	if(isset($cat)){
		echo "id: " . $cat->id . ', ';
		echo "nome: " . $cat->nome . "<br>";
	} else {
		echo "<h1>Categoria não encotrada.</h1>";
	}
});

Route::get('/atualizar/{id}/{nome}', function($id, $nome){
	$cat = Categorias::find($id);
	if(isset($cat)){
		$cat->nome = $nome;
		$cat->save();
		return redirect('/');
	} else {
		echo "<h1>Categoria não encotrada.</h1>";
	}
});

Route::get('/remover/{id}', function($id){
	$cat = Categorias::find($id);
	if(isset($cat)){
		$cat->delete();
		return redirect('/');
	} else {
		echo "<h1>Categoria não encotrada.</h1>";
	}
});

Route::get('/categoriapornome/{nome}', function($nome){
	$categorias = Categorias::where('nome', $nome)->get();
	foreach($categorias as $c){
    	echo "id: " . $c->id . ', ';
    	echo "nome: " . $c->nome . "<br>";
    }
});

Route::get('/categoriaidmaiorque/{id}', function($id){
	$categorias = Categorias::where('id', '>', $id)->get();
	foreach($categorias as $c){
    	echo "id: " . $c->id . ', ';
    	echo "nome: " . $c->nome . "<br>";
    }
    $count = Categorias::where('id', '>', $id)->count();
    echo "<h1>Count: $count  </h1>";
    $max = Categorias::where('id', '>', $id)->max('id');
    echo "<h1>Max: $max  </h1>";
});

Route::get('/ids123', function(){
	$categorias = Categorias::find([1, 2, 3]);
	foreach($categorias as $c){
    	echo "id: " . $c->id . ', ';
    	echo "nome: " . $c->nome . "<br>";
    }
});

//retorna também os apagados via soft delete
Route::get('/todas', function () {
    $categorias = Categorias::withTrashed()->get();
    foreach($categorias as $c){
    	echo "id: " . $c->id . ', ';
    	echo "nome: " . $c->nome;
    	if($c->trashed()){
    		echo ' (apagado) <br>';
    	} else {
    		echo '<br>';
    	}
    }
});

Route::get('/ver/{id}', function($id){
	$cat = Categorias::withTrashed()->find($id);
	//ou
	//$cat = Categorias::withTrashed()->where('id', $id)->get()->first();
	if(isset($cat)){
		echo "id: " . $cat->id . ', ';
		echo "nome: " . $cat->nome . "<br>";
	} else {
		echo "<h1>Categoria não encotrada.</h1>";
	}
});

Route::get('/somenteapagadas', function () {
    $categorias = Categorias::onlyTrashed()->get();
    foreach($categorias as $c){
    	echo "id: " . $c->id . ', ';
    	echo "nome: " . $c->nome;
    	if($c->trashed()){
    		echo ' (apagado) <br>';
    	} else {
    		echo '<br>';
    	}
    }
});

Route::get('/restaurar/{id}', function($id){
	$cat = Categorias::withTrashed()->find($id);
	if(isset($cat)){
		$cat->restore();
		echo "Cat restaurada: " . $cat->id . '<br> ';
		echo "<a href=\"/\">Listar todas</a>";
	} else {
		echo "<h1>Categoria não encotrada.</h1>";
	}
});

Route::get('/apagarperma/{id}', function($id){
	$cat = Categorias::withTrashed()->find($id);
	if(isset($cat)){
		$cat->forceDelete();
		return redirect('/todas');
	} else {
		echo "<h1>Categoria não encotrada.</h1>";
	}
});