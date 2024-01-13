<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductoFactura;
use App\Models\Fatura;
use App\Models\Producto;
use App\Models\User;
class ProductoController extends Controller
{
    public function factura($id_usuario , $referencia , $banco)
    {
        $factura = Fatura::create([
            'usuario_id' => $id_usuario,
            'id_estado' => 1,
            'referencia' => $referencia,
            'banco'=>$banco

        ]);
        return $factura;
    }



    public function Producto_factura(
        $id_factura,
        $id_producto,
        $precio,
        $cantidad
    )
    {
        $fatura_producto = ProductoFactura::create([
            "factura_id" => $id_factura,
            'producto_id' => $id_producto,
            'cantidad' => $cantidad  ,
            'estado_id' => 1,
            'precio' => $precio,
            'total' => $cantidad * $precio
        ]);

        return $fatura_producto;
    }


    public function compra( Request $request)
    {
        $productos  = $request->productos;
        $productoBd;
        $id_factura =  $this->factura(
            $request->usuario,
            $request->referencia,
            $request->banco
        );

        foreach($productos as $producto){
           $productoBd = Producto::find($producto['id']);
           if($productoBd->stop > 0 )
           {
                $productoBd->cantidad_vendida = $productoBd->cantidad_vendida + $producto['cantidad'];
                $productoBd->stop = $productoBd->stop - $producto['cantidad'];
                $productoBd->save();
                $this->Producto_factura(
                    $id_factura->id,
                    $productoBd->id,
                    $producto['precio'] ,
                    $producto['cantidad']
                );
           }else{
            return response()
                ->json([
                    'mensage' => 'El siguiente producto esta agotado "'.$productoBd->nombre.'" por favor saquelo del carrito para continuar',
                    'success' => '426'
                ]);
           }



        }
        //$factura  = $this->factura();
        return response()->json(
            [
                'mensage' => 'Su factura fue procesada con exito, un administrador verificara el pago esto tardara 24h antes de darle una respuesta',
                'data'  => $request->all(),
                'success' => 200
            ]
        );

    }

    public function factura_producto()
    {
        $usuario = User::find(1);
        return $usuario->facturas;
    }

    public function usuario_productos($id)
    {
        $factura = Fatura::find($id);
        $productos = $factura->producto_factura;
        $p;

        foreach($productos as $producto )
        {
            $p[] = $producto->producto;
        }
        return $p;

    }
}
