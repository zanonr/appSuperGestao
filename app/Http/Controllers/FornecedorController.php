<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    
    public function index() {
        $titulo = 'Fornecedor';
        $fornecedores = ['Fornecedor 1']; // cria variável e atribui array para ela
        $fornecedoresMulti = [
            0 => ['nome' => 'Fornecedor0', 'status' => 'N', 'cnpj'=>'00.000.000/0000-00', 'ddd' => '11', 'telefone' => '0000-0000'],
            1 => ['nome' => 'Fornecedor1', 'status' => 'N', 'ddd' => '11', 'telefone' => '0000-0000'],
            2 => ['nome' => 'Fornecedor2', 'status' => 'N', 'cnpj'=>'', 'ddd' => '11', 'telefone' => '0000-0000']
        ];

        // testes : echo ( isset($fornecedoresMulti[1]['cnpj']) ? 'Cnpj Informado' : 'CNPJ Não informado' ) ; 

        return view('app.fornecedor.index',compact('fornecedores', 'fornecedoresMulti'), ['titulo'=>$titulo]);
    }
    
    public function fornecedor() {
        $titulo = 'Fornecedor';
        return view('app.fornecedor',['titulo'=>$titulo]);
    }
    
}
