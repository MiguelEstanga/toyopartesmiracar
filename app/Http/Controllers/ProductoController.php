<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $producto = Producto::all();
       return view("producto.index" , ["productos"=> $producto]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imagen_storage = $request->file("imagen");
        Producto::create([
            'imagen' => $imagen_storage->store('imagenes' , 'public'),
            'stop' => $request->input('stop'),
            'nombre' => $request->input('nombre'),
            'precio' => $request->input('precio'),
            'categoria_id' => $request->input('categoria'),
            'descripcion' => $request->input('descripcion')
        ]);
        
        return redirect()->route('producto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto = Producto::find($id);
        
        return view('producto.show' , 
        [ 
            'producto' => $producto ,
            'categorias' => Categoria::all()
        ]);
    }

    
    public function update(Request $request, string $id)
    {
        $producto = Producto::find($id);

        if($request->file('imagen')){
            $imagen_nueva = $request->file("imagen");
            $producto->imagen = $imagen_nueva->store("imagenes" , 'public');
        }

        $producto->nombre =$request->nombre;
        $producto->precio = $request->precio;
        $producto->categoria_id =  $request->categoria_id;
        $producto->stop = $request->stop;

        $producto->save();

        return redirect()->route('producto.show' , $id)->with("success" , "Actulizado con exito");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
