<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cardapio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'preco',
        'tipo',
    ];
}
