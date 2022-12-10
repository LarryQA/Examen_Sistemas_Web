@extends('app')

@section('contenido')
<div class="container-fluid  p-4">
    <h2>Crear asignación</h2>
    <form action="{{ route('asignaciones-store',  ['id' => $claseId]) }}" method="POST">
        @csrf
        <div class="form-row px-3">
            <div class="col-md-12 mb-3">
                <label for="nombre_clase">Título</label>
                <input type="text" class="form-control" name="titulo_asignacion" required>
                @error('titulo_asignacion')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
            </div>
        
            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <label for="descripcion_clase">Descripción</label>
                    <textarea class="form-control" name="descripcion_asignacion" rows="3"></textarea>
                    @error('descripcion_asignacion')
                        <h6 class="alert alert-danger">{{ $message }}</h6>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Aceptar</button>       
    </form>
</div>
@endsection