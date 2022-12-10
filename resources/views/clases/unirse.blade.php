@extends('app')

@section('contenido')
<form action="{{route('clases-unirse')}}" method="POST">
  @csrf
  @if (session('error'))
      <h6 class="alert alert-warning">{{session('error')}}</h6>
  @endif
  <div class="form-row px-3">
    <div class="col-md-12 mb-3">
      <label for="codigo_clase">Ingresa código de acceso:</label>
      <input type="text" class="form-control" name="codigo_clase" required>
      @error('codigo_clase')
      <h6 class="alert alert-danger">{{$message}}</h6>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Aceptar</button>

  </div>
  

</form>
@endsection
  
  