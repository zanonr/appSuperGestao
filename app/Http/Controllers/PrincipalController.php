<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotivoContato;

class PrincipalController extends Controller
{
    public function principal() {
        #echo 'Ola, bem vindo! from Controller!';

        $motivo_contatos = MotivoContato::all();
        //dd($motivo_contatos);

        return view('site.principal',['titulo' => 'Home', 'motivo_contatos' => $motivo_contatos]);
    }
}
