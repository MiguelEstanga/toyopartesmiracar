@extends('layout.app')

@section('contenido')

    <section class="container margin">

        <x-titulo
         titulo="Productos"
        />

        <div class="container_proudctos">
            @foreach ($productos as $producto)
                <div class="card" style="width: 18rem;">
                    <img width="100%" height="200px" src="{{ asset('storage/' . $producto->imagen) }}"
                        alt="{{ $producto->nombre }}">

                    <div class="card-body">
                        <div  class="conten-data">
                            <div class="data">Nombre: {{ $producto->nombre }}</div>

                            <div class="data">Existencia : {{ $producto->stop }}</div>
                        </div>
                        <div  class="conten-data">
                          <div class="data">Vendido : {{ $producto->cantidad_vendida }}</div>
                          <div class="data">Precio {{ $producto->precio }}BS</div>
                      </div>
                      <div class="action" >

                        <a href="{{route('producto.show' , $producto->id )}}" class=" btn-action">Editar</a>
                        <!--a href="#" class=" btn-action">Eliminar</a-->
                      </div>
                    </div>
                </div>




            @endforeach
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
            max-width: 1200px;
            padding: 10px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .6);
            background-color: #FDFEFE;
            color: :#ffff;


        }

        .container_proudctos{
            display: grid;
            grid-template-columns: repeat(auto-fill, 300px);
            height: auto;
            box-shadow: rgba(0, 0, 0, .7);
            width: 100%;
            justify-content: center;
            align-items: center;
            gap: 10px;
            overflow-x: scroll;
        }

        .contenerdor {
            background-color: '#FDFEFE';
            margin: 100px auto;
            max-width: 1200px;
        }
        .card{
            box-shadow:  0 10px 10px rgba(0, 0, 0, .6) ;

        }
    </style>
@endsection
