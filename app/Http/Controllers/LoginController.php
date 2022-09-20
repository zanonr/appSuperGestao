<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = '';

        if( $request->get('erro') == 1 ){
            $erro = 'Usuário e ou Senha inválido.';
        }
        if( $request->get('erro') == 2 ){
            $erro = 'Necessário realizar login para ter acesso à página.';
        }

        return view('site.login',['titulo'=>'Login', 'erro'=>$erro]);
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
    
        // recuperamos os parametros do Front
        $email = $request->get('usuario');
        $pass = $request->get('senha');

        $user = new User();

        $usuario = $user->where('email', $email)
                        ->where('password', $pass)
                        ->get()    // retorna collection
                        ->first(); // apenas o primeiro registro

        if(isset($usuario->name)){
            //dd($usuario);
            session_start();
            $_SESSION['nome'] = $usuario->nome;
            $_SESSION['email'] = $usuario->email;

            //dd($_SESSION);
            return redirect()->route('app.home');

        } else {
            return redirect()->route('site.login',['erro' => 1]);
        }

        echo "Usuario: $email  | Senha: $pass" ;
        echo '<br>';
    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
