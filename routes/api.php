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


Route::get('productos/{id}' ,  function($id)
{
    return json_encode( Producto::find($id) );
}  );

Route::get('productos/{id}' ,  function($id){
    return json_encode( Producto::findOrFail($id) );
}  );


Route::post('/registro', function(Request $request){
    return $request->all();

    $verificar_usuario = User::where('email', $request->correo)->first();

    if($verificar_usuario){
        return response()->json([
            'status' => 400,
            'mensage' => 'el usuario ya se ha registrado'
        ]);
    }

   $usuario =  User::create([
        "name" => $request->nombre,
        'email' => $request->correo,
        "cedula" => $request->cedula,
        "telefono" => $request->apellidos,
        "ciudad" => $request->ciudad,
        "password" =>  Hash::make( $request->password )
    ])->assignRole("Usuario");


    //return 0;

    return response()
        ->json([
            'data' => $usuario,
            'status' => 200,
            'mensage' => 'Registro exitoso'
        ]);

});

Route::post('/login' , [AuthController::class , 'login'] );


Route::post('/compra',[ProductoController::class , 'compra']);
Route::get('/mis_compras',[ProductoController::class , 'factura_producto']);
Route::get('/factura_producto/{id}',[ProductoController::class , 'usuario_productos']);

//facturas
Route::get('/mis_compras/{id}',[FacturaController::class , 'misCompras']);
Route::get('/factura_producto/{id}',[FacturaController::class , 'productoAPI']);
