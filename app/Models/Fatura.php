<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fatura extends Model
{
    use HasFactory;
    protected $fillable=[

        'usuario_id',
        'id_estado',
        'referencia',
        'banco'
    ];


    public function usuario()
    {
       return $this->belongsTo(User::class) ;
    }

    public function producto_factura()
    {
        return $this->hasMany(ProductoFactura::class , 'factura_id') ;
    }




    public function estado()
    {
        return $this->belongsTo(Estado::class  ,'id_estado');
    }

}
