<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function cliente() {
        $titulo = 'Cliente';
        return view('app.cliente',['titulo'=>$titulo]);
    }
}
