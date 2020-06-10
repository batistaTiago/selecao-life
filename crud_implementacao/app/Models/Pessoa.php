<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    public $fillable = [
        'nome', 
        'cpf', 
        'email', 
        'data_nasc',
        'nacionalidade',
    ];

    
}
