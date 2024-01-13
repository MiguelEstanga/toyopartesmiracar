<?php

namespace App\Http\Controllers\Categoria;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(){
        return view("Categoria.Index" , ['categorias' => Categoria::all() ]);
    }

    public function store(Request $request){
        $request->validate([
            'categoria' => 'required',
        ]);
       
        Categoria::create([
            "nombre" => $request->categoria
        ]);

        return redirect()->route('categorias.index')->with('success','Categorias registrada exitosamente');
    }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success','se ha eliminado una categoria');
    }

    public function update(Request $request)
    {
       // return $request;

         $update = Categoria::find($request->id);
         $update->nombre = $request->nombre;
         $update->save();
         return redirect()->route('categorias.index')->with('success','Categorias actualizada exitosamente');

    }
}
