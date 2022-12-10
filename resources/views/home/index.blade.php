@extends('app')

@section('contenido')
<h1>Inicio</h1>

@auth
    @error('titulo_clase')
    <h6 class="alert alert-danger">{{$message}}</h6>
    @enderror
    @error('descripcion_clase')
    <h6 class="alert alert-danger">{{$message}}</h6>
    @enderror
    <p>Bienvenido {{ auth()->user()->primer_nombre}}</p>
    <p><a href="/logout">Cerrar sesión</a></p>
@endauth

@guest
    <p>Para ver el contenido <a href="/login">inicia sesión</a></p>
@endguest
@endsection
