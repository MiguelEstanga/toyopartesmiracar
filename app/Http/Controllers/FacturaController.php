<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fatura;
use App\Models\User;
use App\Models\ProductoFactura;
class FacturaController extends Controller
{
   public function index(){
         $factura = Fatura::all();

        return view("facturas.index", [ 'facturas' => $factura]);
   }

   public function productos($id)
   {
        $productos = ProductoFactura::where('factura_id' , $id)->get();
        $total = 0;

        if($productos){
            $usuario = $productos[0]->factura->usuario->name . ' ' . $productos[0]->factura->usuario->apellidos;
            $fecha =  $productos[0]->factura->created_at ;
            $numero_de_tranferencia =  $productos[0]->factura->referencia;
            $banco                  =  $productos[0]->factura->banco;
            $factura_id                  =  $productos[0]->factura->id;
            $factura = Fatura::find($factura_id);
             $estado = $factura->estado->estados;

            for($i = 0 ; $i < count($productos) ; $i++ )
                {
                    $total = $total + $productos[$i]->total ;
                }
        }



        //return $productos;

        return view('facturas.show' ,
            [
                'productos' => $productos ,
                'total'     => $total,
                'estado'    => $estado,
                'usuario'   => $usuario,
                'fecha'     => $fecha,
                'numero'    => $numero_de_tranferencia,
                'banco'     => $banco,
                'factura_id'=> $factura_id
            ]);
   }

   public function actulizar_estado($id)
   {
       $factura = Fatura::find($id);
       if($factura->id_estado == 2)
       {
        $factura->id_estado = 1;
       }else{
        $factura->id_estado = 2;
       }

       $factura->save();

      return back();
   }


   public function misCompras($id)
   {
     $user = User::find($id);
     return  $user->facturas;
   }

   public function productoAPi($id)
   {
        $productos = ProductoFactura::where('factura_id' , $id)->get();

        $factura;
        foreach($productos as $producto)
        {
            $factura[] =
                [
                    'fecha' => $producto->created_at,
                    'nombre' => $producto->producto->nombre,
                    'precio' =>  $producto->producto->precio,
                    'imagen' =>  $producto->producto->imagen,
                    'toal'   =>  $producto->total,
                    'cantidad' => $producto->cantidad
                ]
            ;
        }


        return response()->json(
            [
                'estado' => $productos[0]->factura->estado->estados,
                'productos' => $factura,
                'fecha' => $producto->created_at
            ]
        );
    }
}
