<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $p1,int $p2){
        #echo $p1+$p2;
        #return view('teste', ['x'=>$p1, 'y'=>$p2]); // array associativo
        #return view('teste', compact('p1','p2'));  // compact -- não usa o Dolar na pratica, ele cria um associativo
        return view('teste') ->with('p1', $p1)->with('p2', $p2); // with

        ### geralmeente vou usar o Compact
    }
}
