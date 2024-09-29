<!-- Modal -->
<div class="modal fade" id="modal{{$persona->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Persona</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('persona.update',  $persona) }}">
          @csrf
          @method('PUT')

          <!-- Campo Nombre -->
          <div class="form-group mb-3">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{$persona->nombre}}" class="form-control" placeholder="Ingresa el nombre">
          </div>

          <!-- Campo Edad -->
          <div class="form-group mb-3">
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" value="{{$persona->edad}}" class="form-control" placeholder="Ingresa la edad">
          </div>

          <!-- Campo Ocupación -->
          <div class="form-group mb-3">
            <label for="ocupacion">Ocupación:</label>
            <input type="text" id="ocupacion" name="ocupacion" value="{{$persona->ocupacion}}" class="form-control" placeholder="Ingresa la ocupación">
          </div>

          <!-- Botón de enviar -->
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>
