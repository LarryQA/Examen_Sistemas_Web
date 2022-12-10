@extends('app')

@section('contenido')
<form action="/login" method="POST">
    @csrf

    @if (session('success'))
    <h6 class="alert alert-success">{{session('success')}}</h6>
    @endif

    @if (session('error'))
    <h6 class="alert alert-error">{{session('error')}}</h6>
    @endif

    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label">Correo electrónico</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email">
      </div>
    </div>
    <div class="form-group row">
      <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" name="password" placeholder="Password">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Ingresar</button>
      </div>
    </div>
</form>

@endsection