<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Producto;
use App\Models\User;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ProductoController;
use App\Http\Controllers\FacturaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('productos' ,  function(){
    return json_encode( Producto::all() );
}  );
Route::get("mas_vendidos" , [ProductoController::class , "MasVendidos"]);

Route::get('productos/{id}' ,  function($id)
{
    return json_encode( Producto::find($id) );
}  );

Route::get('productos/{id}' ,  function($id){
    return json_encode( Producto::findOrFail($id) );
}  );


Route::post('/registro', function(Request $request){
   // return response()->json($request->correo);
    $verificar_usuario = User::where('email', $request->correo)->exists();

    if($verificar_usuario){
        return response()->json([
            'status' => 400,
            'mensage' => 'el usuario ya se ha registrado'
        ]);
    }

   $usuario =  User::create([
        "name" => $request->nombres." ".$request->apellidos,
        'email' => $request->correo,
        "cedula" => $request->cedula,
        "telefono" => $request->telefono,
        "ciudad" => $request->direccion,
        "password" =>  Hash::make( $request->password )
    ])->assignRole("Usuario");

    return response()
        ->json([
            'data' => $usuario,
            'status' => 200,
            'mensage' => 'Registro exitoso'
        ]);

});

Route::post('/login' , [AuthController::class , 'login'] );


Route::post('/compra',[ProductoController::class , 'compra']);
//Route::get('/mis_compras/{id}',[ProductoController::class , 'factura_producto']);
Route::get('/factura_producto/{id}',[ProductoController::class , 'usuario_productos']);

//facturas
Route::get('/mis_compras/{id}',[FacturaController::class , 'misCompras']);
Route::get('/factura_producto/{id}',[FacturaController::class , 'productoAPI']);
