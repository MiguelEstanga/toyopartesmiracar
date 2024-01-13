<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoFactura extends Model
{
    use HasFactory;
    protected $fillable=[
        'producto_id',
        'estado_id',
        'factura_id',
        'precio',
        'total',
        'cantidad'
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class , 'id') ;
    }

    public function producto()
    {
        return $this->belongsto(Producto::class ) ;
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class) ;
    }

    public function factura()
    {
      return $this->belongsto(Fatura::class ,'id' ) ;
    }
}
