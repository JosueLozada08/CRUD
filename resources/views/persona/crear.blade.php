@extends('layouts.app') <!-- generalizar el contenido con bootstrap -->
@section('content')
<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Añade una persona</h5>
    <form action="">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control">
        </div>
        <div class="form-group">
            <label for="edad">edad</label>
            <input type="number" id="edad" name="edad" class="form-control">
        </div>
        <div class="form-group">
            <label for="ocupacion">Ocupacion</label>
            <input type="text" id="ocupacion" name="ocupacion" class="form-control">
        </div>
        <button type="submin" class="form-control">Guardar</button>
    </form>
  </div>
</div>

@endsection