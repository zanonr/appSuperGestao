<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(){
        $titulo = 'Produto - Index';
        return view('app.produto',['titulo'=>$titulo]);
    }
    
    public function produto() {
        $titulo = 'Produto';
        return view('app.produto',['titulo'=>$titulo]);
    }
}
