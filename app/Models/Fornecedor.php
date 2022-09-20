<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    // php artisan tinker => Fornecedor::create(['nome'=>'Fornecedor ABC','site'=>'fornecedorabc.com.br','uf'=>'SP', 'email'=>'fornecedor@fornabc.com.br']);
    use HasFactory;
    // esse cara é quase um extends
    use SoftDeletes;
    
    protected $table = 'fornecedores';
    protected $fillable = ['nome','site','uf','email']; // pra usar o Fornecedor::create
    

}
