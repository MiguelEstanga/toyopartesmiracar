<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Fatura;

class AuthController extends Controller
{
    public function Login(Request $request)
    {
         /**$credenciales = $request->validate([
            'email' => 'required',
            'password' => 'required'
         ]);**/


        if(Auth::attempt(['email' => $request->email , 'password' => $request->password ]))
        {
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;
            $mis_facturas = $user->facturas;

            return response()->json(
                [
                    'response' => 200,
                    'data'=> $user,
                    'token' => $token,
                    'rol' =>  $user->getRoleNames()[0],
                    'facturas' => $mis_facturas
                ]
            );
        }else{
            return response()->json([
                'response' => 402,
                'mensage'=> 'credenciales incorrectas'
            ]);
        }

        return json_encode($request->all());
    }
}
