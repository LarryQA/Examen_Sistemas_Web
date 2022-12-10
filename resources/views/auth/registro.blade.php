@extends('app')

@section('contenido')
<form action="/register" method="POST">
    @csrf

    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="primer_nombre">Primer nombre</label>
        <input type="text" class="form-control" name="primer_nombre" required>
        @error('primer_nombre')
        <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="segundo_nombre">Segundo nombre</label>
        <input type="text" class="form-control" name="segundo_nombre">
        @error('segundo_nombre')
        <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror
      </div>
    </div>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="primer_apellido">Primer apellido</label>
            <input type="text" class="form-control" name="primer_apellido" required>
            @error('primer_apellido')
             <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror 
        </div>
        <div class="col-md-4 mb-3">
            <label for="segundo_apellido">Segundo apellido</label>
            <input type="text" class="form-control" name="segundo_apellido">
            @error('segundo_apellido')
            <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror 
        </div>
    </div>
    <div class="form-row">
      <div class="col-md-5 mb-3">
        <label for="email">Correo Electrónico</label>
        <input type="email" class="form-control" name="email" required>
        @error('email')
        <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror 
      </div>
      <div class="col-md-3 mb-3">
        <label for="telefono">Número de telefono</label>
        <input type="text" class="form-control" name="telefono" required>
        @error('telefono')
        <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror 
      </div>
    </div>

    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" name="password">
            @error('password')
            <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror 
        </div>
        <div class="col-md-4 mb-3">
            <label for="password_confirmation">Confirmar contraseña</label>
            <input type="password" class="form-control" name="password_confirmation">
            @error('password_confirmation')
            <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror 
        </div> 
    </div>
  
    <button class="btn btn-primary" type="submit">Submit form</button>
  </form>
@endsection