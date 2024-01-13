
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form  action="{{route('categorias.update')}}"  method="POST" >
            @method("PUT")
            @csrf
        <div class="modal-body">
           
                <input type="text" name="id" id="formulario_update_id"  hidden > 
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Editar categoria</label>
                    <input type="text" name="nombre" class="form-control" id="nombre_categoria_update">
                  </div>
           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
    </form>
      </div>
    </div>
  </div>

 