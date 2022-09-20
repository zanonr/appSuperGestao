<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MotivoContato extends Model
{
    use HasFactory;

    protected $fillable = ['motivo_contato'];


}
