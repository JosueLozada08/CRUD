@extends('layouts.app2')
@sectiosn('content')

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Iniciar Sesión
                        </div>
                        <div class="card-body">
                            <form method=" POST" action="{{route('login')}}">
                            @csrf
                            <div class="form-group">
                                <label for="user_name">Nombre de Usuario</label>
                                <input type="text" id="user_name" name="user_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="user_name">Contraseña</label>
                                <input type="text" id="user_name" name="user_name" class="form-control" required>
                            </div>
                            <button type="submit" class="btn brn-primary">Login</button>
                            </form>
                            <!-- muestra de errores -->
                            @if ($errors->any())
                            <div class="alert alert-danger mt-3" >
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                                
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>