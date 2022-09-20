<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(){
        $titulo = 'Cliente - Indext';
        return view('app.cliente',['titulo'=>$titulo]);
    }

    public function cliente() {
        $titulo = 'Cliente';
        return view('app.cliente',['titulo'=>$titulo]);
    }
}
