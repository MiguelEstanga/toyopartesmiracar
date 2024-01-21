<?php

namespace App\Http\Controllers;

use App\Models\ProductoFactura;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Comprar;
class ProductoFacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $producto = Producto::all();
        return view("compras.index" , ['productos' => $producto]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $producto = Producto::find($request->id);
        if($request->cantidad == 0 || $request->cantidad < 0 )
        {
            return back()->with("mensage" , "cantidad tiene que ser un numero por arriba de 0");
        }
        $producto->precio = $request->precio;
        $producto->stop = $request->cantidad;
        $producto->save();
        Comprar::create([
               "cantidad" => $request->cantidad,
               "precio" => $request->precio,
               "producto" => $request->producto,
               "total" => $request->precio * $request->cantidad,
               "fecha" =>  Date("Y-m-d")
        ]);

        return back()->with("mensage","Se ha actulizado el inventario");
    }

    public function facturas(Request $request)
    {
        if($request->all()){

            $producto = Comprar::where("fecha" , $request->fecha)->get();
           $producto;
        }else{
            $producto = Comprar::all();
        }
        return view("compras.facturas", ["facturas" => $producto ]);
    }


    public function show(ProductoFactura $productoFactura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductoFactura $productoFactura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductoFactura $productoFactura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductoFactura $productoFactura)
    {
        //
    }
}
