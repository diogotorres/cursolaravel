<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoControlador extends Controller{
    
    public function listar(){
    	$produtos = [
    		"Notebook Asus 17 16  gb",
    		"Mouse e teclado Microsoft",
    		"Monitor 21 polegadas",
    		"Impressora HP",
    		"SSD 512 gb"
    	];
    	return view('produtos', compact('produtos'));
    }

    public function secaoprodutos ($palavra){
        return view('secaoprodutos', compact('palavra'));
    }

    public function mostrarOpcoes(){
        return view('opcoes');
    }

    public function opcoes($op){
        return view('opcao', compact('op'));
    }

    public function loopFor($n){
        return view('loop_for', compact('n'));
    }

    public function loopForEach(){
        $produtos = [
            ["id" => 1, "nome" => "computador"],
            ["id" => 2, "nome" => "mouse"],
            ["id" => 3, "nome" => "impressora"],
            ["id" => 4, "nome" => "monitor"],
            ["id" => 5, "nome" => "teclado"]
        ];
        return view('foreach', compact('produtos'));
    }
}
