@extends('layouts.app')
@section('content')
<h1>Personas Creadas </h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Edad</th>
      <th scope="col">ocupacion </th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     @foreach($persona as $persona)
     <td>{{$persona->nombre}}</td>
     <td>{{$persona->edad}}</td>
     <td>{{$persona->ocupacion}}</td>
     <td>
     <button type="button" class="btn btn-primary" data-bs-targe="#modal{{$persona->id}}" >Actualizar</button>


     <!-- inclucion de modal  -->
      @include ('persona.actualizar')
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