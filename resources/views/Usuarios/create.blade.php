@extends('layout.app')

@section('contenido')
    <x-titulo  titulo="Registro de usuario" />

    <div class="formulario" >
        <form enctype="multipart/form-data"  action="{{route('producto.store')}}"  method="post">
            @csrf

             <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nombre completo</label>
                <input  name="nombre" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nombre completo">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Cédula</label>
                <input name="cedula" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Cédula">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Teléfono</label>
                <input name="telefono" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Teléfono">
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Ciudad</label>
                <input  name="ciudad" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ciudad">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
                <input name="password" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Contraseña">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Confirmar contraseña</label>
                <input name="password_confirm" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Confirmar contraseña">
              </div>






                <button type="submit" class="btn btn-primary btn-lg">Registrar</button>

        </form>
    </div>
@endsection
<style>
    .formulario{
        background: #ffffff;
        width: 50%;
        margin:30px auto;
        padding: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, .7);
        border-radius: 10px;

    }
</style>
