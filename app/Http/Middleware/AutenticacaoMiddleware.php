<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil)
    {
        echo($metodo_autenticacao).' - '.$perfil;
        echo '<br>';
        if($metodo_autenticacao == 'padrao'){
            echo 'Verificar no BD'; echo '<br>';
        }

        if(true){
            return $next($request);
        } else {
            return Response('Acesso negado! Rota exige autenticação.');
        }
    }
}
