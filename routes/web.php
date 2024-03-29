<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usuarios\UsuarioController;
use App\Http\Controllers\Estadistica\EstadadiscaController;
use App\Http\Controllers\ProductoFacturaController;

use  \App\Http\Controllers\PanelController;
use  \App\Http\Controllers\FacturaController;
use  \App\Http\Controllers\AuthController;

use \App\Http\Controllers\Categoria\CategoriaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get("/" , [AuthController::class , 'login'])->name('login');
route::post('/auth' , [AuthController::class, 'auth'  ])->name('auth');
Route::get('/out' , [AuthController::class, 'Logout'  ])->name('out');

Route::middleware(['can:superadmin'])->group(function () {
    route::get('/crearproducto' , [PanelController::class, 'index'  ])->name('panelAdmin.index');
    route::get('/productos' , [ProductoController::class,'index'])->name('producto.index');
route::post('/productos' , [ProductoController::class,'store'])->name('producto.store');
route::get('/productos/{id}' , [ProductoController::class,'show'])->name('producto.show');
route::put('/productos/{id}' , [ProductoController::class,'update'])->name('producto.edit');


//categorias

Route::get('/crear_categoras', [CategoriaController::class,'index'] )->name('categorias.index');
Route::post('/create_categorias', [CategoriaController::class,'store'])->name("categorias.create");
Route::delete("/borrar_categorias/{id}", [CategoriaController::class,"destroy"])->name('categorias.delete');
Route::put('/actulizar', [CategoriaController::class , 'update'])->name('categorias.update');

Route::get('/usuarios' , [ UsuarioController::class , 'index'] )->name('usuario.index');
Route::get('/crear_usuario' , [ UsuarioController::class , 'create'] )->name('usuario.create');

//estadistica
Route::get('/reporte' , [EstadadiscaController::class , 'index'] )->name('estadistica.index');

//facturas

Route::get('/facturas' , [FacturaController::class , 'index'])->name('facturas.index');
Route::get('/facturas_productos/{id}' , [FacturaController::class , 'productos'])->name('facturas.productos');
Route::put('/facturas_productos/{id}/actulizar' , [FacturaController::class , 'actulizar_estado'])->name('facturas.actulizar');

//compra de productos
Route::get('/compras' , [ ProductoFacturaController::class , 'index'])->name('compras.index');
Route::post('/compras/create' , [ ProductoFacturaController::class , 'store'])->name('compras.store');
Route::get('/compras/mis_compras' , [ ProductoFacturaController::class , 'facturas'])->name('compras.facturas');


});


