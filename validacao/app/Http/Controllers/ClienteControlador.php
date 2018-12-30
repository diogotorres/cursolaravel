<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteControlador extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $cli = Cliente::all();
        return view('clientes', compact('cli'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('novocliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $regras = [
            'nome' => 'required|min:3|max:20|unique:clientes',
            'idade' => 'required',
            'endereco' => 'required|min:5',
            'email' => 'required|email'
        ];
        $mensagens = [
            'required' => 'O atributo :attribute não pode estar em branco',
            'nome.required' => 'O nome é requirido',
            'nome.min' => 'É necessário no mínimo 3 caracteres no nome'
        ];
        $request->validate($regras, $mensagens);
        /*
        $request->validate([
            'nome' => 'required|min:3|max:20|unique:clientes',
            'idade' => 'required',
            'endereco' => 'required|min:5',
            'email' => 'required|email'
        ]);
        */
        $cli = new Cliente();
        $cli->nome = $request->input('nome');
        $cli->idade = $request->input('idade');
        $cli->endereco = $request->input('endereco');
        $cli->email = $request->input('email');
        $cli->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        
    }
}
