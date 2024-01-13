@extends("layout.app")
@section('contenido')
    <div class="contenedor" >
        <h2>
            Editar Producto
        </h2>
        <div>
            <form enctype="multipart/form-data"  action="{{route('producto.edit' , $producto->id)}}"  method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                    <input  name="nombre" type="text" class="form-control" id="exampleFormControlInput1" value="{{$producto->nombre}}">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Precio</label>
                    <input name="precio" type="number" class="form-control" value="{{$producto->precio}}">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Existencia</label>
                    <input name="stop" type="number" class="form-control" value="{{$producto->stop}}"  >
                  </div>
                  <div class="mb-3">

                    <select class="form-select" aria-label="Default select example" name="categoria" >
                       @foreach ($categorias as  $categoria )
                           <option
                             {{ $producto->categoria_id == $categoria->id ? 'select' : '' }}
                             value="{{$categoria->id}}" >
                                {{$categoria->nombre}}
                            </option>
                       @endforeach
                      </select>
                  </div>

                  <div class="mb-3" >
                    <img
                        src="{{ asset('storage/' . $producto->imagen) }}"
                        width="100px"
                        height="100px"
                        style="border-radius: 10px "
                    />
                    <label for="formFileLg" class="form-label">Imagen</label>
                    <input name="imagen" accept="jpg,png" class="form-control form-control-lg" id="formFileLg" type="file" value="{{$producto->imagen}}">
                  </div>


                    <button type="submit" class="btn btn-success btn-lg">Editar</button>

            </form>
        </div>
    </div>

    <style>
        .contenedor{
            max-width:900px ;
            padding: 10px;
            border-radius: 10px;
            box-shadow:  0 0 10px rgba(0, 0, 0, .6) ;
            background-color: #FDFEFE;
            margin: 100px auto ;
            color: :#ffff;

        }
        .boton{
            margin-top: 20;
        }
    </style>
@endsection
