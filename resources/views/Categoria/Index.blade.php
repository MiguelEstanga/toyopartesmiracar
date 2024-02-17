@extends('layout.app')

@section('contenido')
    <section class="container margin">
        <div class="container">
            <form action="{{ route('categorias.create') }}" method="post">
                @csrf
                <div class="mb-3">
                    <input class="form-control" type="text" name="categoria" id="formFile">
                </div>
                <div class="categoria-container">
                    <button class="btn btn-primary" style="width:300px">
                        Crear Categoría
                    </button>
                </div>
            </form>
        </div>
        <div class="container mt-4 ">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <th scope="row">{{ $categoria->id }}</th>
                            <td>
                                {{ $categoria->nombre }}
                            </td>
                            @include('Categoria.form.modal')

                            <td style="flex-direction: row"  >
                                <a
                                    class="btn-accion bg-success btn_id "
                                    id='{{$categoria->id}}/{{$categoria->nombre}}'
                                    data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"
                                >
                                    <svg
                                    id='{{$categoria->id}}/{{$categoria->nombre}}'

                                     xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FDFEFE"
                                        class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path
                                        id='{{$categoria->id}}/{{$categoria->nombre}}'
                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                    </svg>
                                </a>
                                <!--form action="{{route('categorias.delete' , $categoria->id)}}"  method="post" style="display: inline-block" >
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-accion bg-danger ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FDFEFE"
                                            class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                        </svg>
                                    </button>
                                </form-->

                            </td>

                        </tr>
                    @endforeach


                </tbody>
            </table>

        </div>
    </section>
    <script>

        function seleccion_update()
        {
            let  btn = document.querySelectorAll('.btn_id')
            const formulario_update = document.getElementById("formulario_update_id")
            const nombre_categoria_update = document.getElementById("nombre_categoria_update")
            btn.forEach(element => {
                element.addEventListener('click' , function(event) {
                    event.stopPropagation()
                    const data = event.target.id.split('/')
                    console.log(event.target)
                    formulario_update.value = data[0]
                    nombre_categoria_update.value = data[1]
                } )
            });
        }

        seleccion_update()




  </script>
    <style>
        .btn_id{
            z-index: 10;
        }
        .btn-accion {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 30px;
            height: 30px;
            border-radius: 10px;
            transition: all 0.5s;
            font-size: 10px;
            border: none;
            background-color: #17202A;
        }

        .btn-accion:hover {
            cursor: pointer;
            transform: scale(1.1)
        }

        .categoria-container {

            display: flex;
            justify-content: center;
            align-items: center;
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
    </style>
@endsection
