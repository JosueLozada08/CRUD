@extends('layouts.app')
@section('content')
<h1>Personas Creadas</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Edad</th>
      <th scope="col">Ocupación</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($personas as $persona)
    <tr>
      <td>{{ $persona->nombre }}</td>
      <td>{{ $persona->edad }}</td>
      <td>{{ $persona->ocupacion }}</td>
      <td>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{ $persona->id }}">
  <i class="bi bi-pencil"></i> Editar
</button>

        <!-- Inclusión del modal -->
        @include('persona.actualizar', ['persona' => $persona])
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<!-- Mensaje de éxito -->
@if (session('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ session('success') }}
    </div>
@endif
@endsection
