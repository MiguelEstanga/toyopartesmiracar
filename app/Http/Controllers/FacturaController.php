<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fatura;
use App\Models\User;
use App\Models\ProductoFactura;
use App\Models\Estado;
class FacturaController extends Controller
{
   public function index(){
         $factura = Fatura::all();

        return view("facturas.index", [ 'facturas' => $factura]);
   }

   public function productos($id)
   {
    $factura = Fatura::find($id);
    //return response()->json($factura->producto_factura);
    $total = 0;
    $productos;
    foreach($factura->producto_factura as $producto)
    {
        //$total = $total + $producto->precio;
        $total = $producto->total + $total;
        $productos[] =
            [
                'nombre' => $producto->producto->nombre,
                'imagen' => $producto->producto->imagen,
                "precio" => $producto->producto->precio,
                "cantidad" => $producto->cantidad,
                "total" => $producto->total,

            ]
              ;
        }

        return view('facturas.show' ,
            [
                'productos' => $productos,
                "fecha" => $factura->created_at,
                "referencia" => $factura->referencia ,
                "banco" => $factura->banco,
                "estado" => $factura->estado->estados,
                "estado_id" =>  $factura->estado->id,
                "total" => $total,
                "usuario" => 1,
                "factura_id" => $factura->id,
                "estados" => Estado::all() ?? []
            ]);
   }

   public function actulizar_estado($id , Request $request)
   {

       $estado = Estado::where("id" , $request->estado)->first();
       $factura = Fatura::find($id);

       $factura->id_estado = $estado->id;
       $factura->save();

      return back();
   }


   public function misCompras($id)
   {
     $user = User::find($id);
     $facturas = [];
     foreach($user->facturas as  $factura)
     {
        $fecha = explode('t', $factura->created_at);
        $facturas [] = [
            "id" => $factura->id,
            "estado" => $factura->estado->estados,
            "fecha" =>   $fecha[0]
        ];
     }
     return  response()->json($facturas);
   }

   public function productoAPi($id)
   {
        $factura = Fatura::find($id);
        //return response()->json($factura->producto_factura);
        $total = 0;
        $productos;
        foreach($factura->producto_factura as $producto)
        {
            //$total = $total + $producto->precio;
            $total = $producto->total + $total;
            $productos[] =
                [
                    'nombre' => $producto->producto->nombre,
                    'imagen' => $producto->producto->imagen,
                    "precio" => $producto->producto->precio,
                    "cantidad" => $producto->cantidad,
                    "total" => $producto->total
                ]
            ;
        }

        return response()->json(
            [
                'productos' => $productos,
                "facha" => $factura->created_at,
                "referencia" => $factura->referencia ,
                "banco" => $factura->banco,
                "estado" => $factura->estado->estados,
                "total" => $total
            ]
        );
    }
}
