<?php

namespace App\Http\Controllers\Estadistica;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;

class EstadadiscaController extends Controller
{
    public function index()
    {
     $data_bruta  = Producto::all();
        $data_nomrbe = [];
        $data_ventas = [];  
        
        for($i = 0 ; $i < count($data_bruta) ; $i++ ){
               $data_nombre[$i] = $data_bruta[$i]->nombre;  
               $data_ventas[$i] = $data_bruta[$i]->cantidad_vendida;  
        }

      //  return $data_nombre;
       // return json_encode($data_nombre);
        //return json_encode($data_final) ;
        return view('Estadisticas.index',
            [
                'data_nombre' => $data_nombre,
                'data_ventas' => $data_ventas
            ]
        );
    }
}
