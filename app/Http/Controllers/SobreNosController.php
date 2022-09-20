<?php

namespace App\Http\Controllers;

use App\Http\Middleware\LogAcessoMiddlware;
use Illuminate\Http\Request;

class SobreNosController extends Controller
{
/* comentado para chamar o middleware direto no Kernel.php */
    public function __construct()
    {
        $this->middleware(LogAcessoMiddlware::class);
        $this->middleware('log.acesso');
    }

    public function sobreNos() {
        #echo 'Sobre Nós from Controller';
        return view('site.sobre-nos');
    }
}
