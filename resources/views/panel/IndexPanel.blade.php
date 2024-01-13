@extends("layout.app")
@section('contenido')
    <div class="contenedor" >
        <x-titulo  titulo="Crear productos" />

        <div>
            <form enctype="multipart/form-data"  action="{{route('producto.store')}}"  method="post">
                @csrf
                <div class="mb-3">
                 <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                    <input  name="nombre" type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre del producto">
                  </div>
                  <label for="exampleFormControlInput1" class="form-label">Descripción</label>
                    <input  name="descripcion" type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre del producto">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Precio</label>
                    <input name="precio" type="number" class="form-control" id="exampleFormControlInput1" placeholder="precio">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Existencia</label>
                    <input name="stop" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Existencia">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">
                        Seleccione una  Categoría
                        <span>
                            <a href="{{route('categorias.index')}}" >
                                Crear una Categoría
                            </a>
                        </span>

                    </label>
                    <select class="form-select" aria-label="Default select example" name="categoria" >
                       @foreach ($categorias as  $categoria )
                           <option value="{{$categoria->id}}" >{{$categoria->nombre}}</option>
                       @endforeach
                      </select>
                  </div>

                  <div class="mb-3" >
                    <label for="formFileLg" class="form-label">Imagen</label>
                    <input name="imagen" accept="jpg,png" class="form-control form-control-lg" id="formFileLg" type="file">
                  </div>


                    <button type="submit" class="btn btn-primary btn-lg">Registrar</button>

            </form>
        </div>
    </div>

    <style>
        .contenedor{
            max-width:400px ;
            padding: 20px;
            border-radius: 10px;
            box-shadow:  0 10px 10px rgba(0, 0, 0, .6) ;
            background-color: #FDFEFE;
            margin: 30px auto ;
            color: :#ffff;

        }

    </style>
@endsection
