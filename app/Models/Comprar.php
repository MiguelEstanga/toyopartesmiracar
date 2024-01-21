<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprar extends Model
{
    use HasFactory;
    protected $fillable = [
        'producto',
        'cantidad',
        'precio',
        'total',
        "fecha"
    ];
}
