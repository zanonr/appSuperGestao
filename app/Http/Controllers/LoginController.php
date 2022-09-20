<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('site.login');
    }

    public function autenticar(Request $request){
        // regras de validacao
        $regras = [
            'usuario'=>'email',
            'senha'=>'required'
        ];
        $feedback = [
            'usuario.email' => 'Usuário (email) é obrigatorio',
            'senha.required' => 'senha é obrigatório'
        ];

        // se for negado, o request devolve para a rota antiga
        $request->validate($regras, $feedback); 

        print_r($request->all());
    }
}
