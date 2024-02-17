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

    public function producto()
    {
        return $this->belongsTo(Producto::class , 'producto_id') ;
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class , "id") ;
    }

    public function factura()
    {
      return $this->belongsto(Fatura::class ,'factura_id' ) ;
    }
}
