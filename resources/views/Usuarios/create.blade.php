@extends('layout.app')

@section('contenido')
    <x-titulo  titulo="Registro de usuario" />
        
    <div class="formulario" >
        <form enctype="multipart/form-data"  action="{{route('producto.store')}}"  method="post">
            @csrf

             <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nombre completo</label>
                <input  name="nombre" type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre del producto">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Cedula</label>
                <input name="precio" type="number" class="form-control" id="exampleFormControlInput1" placeholder="precio">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Telefono</label>
                <input name="stop" type="number" class="form-control" id="exampleFormControlInput1" placeholder="stop">
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Ciudad</label>
                <input  name="nombre" type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre del producto">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input name="precio" type="number" class="form-control" id="exampleFormControlInput1" placeholder="precio">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Contracena</label>
                <input name="stop" type="number" class="form-control" id="exampleFormControlInput1" placeholder="stop">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Confirmar contracena</label>
                <input name="stop" type="number" class="form-control" id="exampleFormControlInput1" placeholder="stop">
              </div>
              
          
              
             

            
                <button type="submit" class="btn btn-primary btn-lg">Large button</button>
              
        </form>
    </div>
@endsection
<style>
    .formulario{
    
        width: 40%;
        margin:30px auto;
        padding: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, .7);
        border-radius: 10px;

    }
</style>