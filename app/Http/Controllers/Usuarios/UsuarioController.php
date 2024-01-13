<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        //$usuarios[0]->facturas;
        return view('Usuarios.index', [
            'usuarios' => $usuarios
        ] );
    }

    public function create()
    {
        return view('Usuarios.create');
    }
}
