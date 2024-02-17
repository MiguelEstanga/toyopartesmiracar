@extends('layout.app')
@section('contenido')
<section class="container margin">

    <x-titulo titulo="Usuarios registrados desde la aplicación" />
    <div class="contenedor">
        <table class="table" >
            <thead>
                <tr>

                  <th scope="col">Nombre</th>
                  <th scope="col">Correo</th>
                  <th scope="col">Cédula</th>
                  <th scope="col">Compras</th>

                </tr>
              </thead>
              @foreach ($usuarios as $usuario)
              <tbody>
                <tr>

                  <td>{{$usuario->name}}</td>
                  <td>{{$usuario->email}}</td>
                  <td>{{$usuario->cedula}}</td>
                  <td>{{count($usuario->facturas)  ?? 0 }}</td>
                </tr>
              </tbody>

              @endforeach
        </table>

    </div>

</section>
<style>
    .action{
        display: flex;
        gap: 5px;
        justify-content:space-between ;
        margin-top: 10px;
    }
    btn-action{
        background-color: #17202A;
        color:#FBFCFC ;
        width: 50px;
        height: 30px;
        display: block;
        border: solid 1px black;
        border-radius: 10px;
        text-decoration: none;
    }
  .conten-data{

    flex-direction: grid;
    grid-template-columns: repeat(2,1fr);
  }
  .data{
    font-size: 15px;

  }
    .margin {
        margin: 100px auto;
    }

    .container {
        max-width: 900px;
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, .6);
        background-color: #FDFEFE;
        color: :#ffff;
    }

    .contenerdor {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        box-shadow: rgba(0, 0, 0, .7);
        width: 100%;
    }

    .contenerdor {
        background-color: '#FDFEFE';
        margin: 100px auto;
        max-width: 1200px;
    }
</style>
@endsection
