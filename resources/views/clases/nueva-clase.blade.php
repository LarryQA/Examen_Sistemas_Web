@extends('app')

@section('contenido')
    <form action="{{ route('clases') }}" method="POST">
        @csrf
        <div class="form-row px-3">
            <div class="col-md-12 mb-3">
                <label for="nombre_clase">Nombre de la clase</label>
                <input type="text" class="form-control" name="nombre_clase" required>
                @error('nombre_clase')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
            </div>
            <div class="col-md-4 mb-3 mr-3">
                <label for="grado_clase">Grado</label>
                <input type="text" class="form-control" name="grado_clase">
                @error('grado_clase')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
            </div>
            <div class="col-md-4 mb-3 ml-3">
                <label for="seccion_clase">Sección</label>
                <input type="text" class="form-control" name="seccion_clase">
                @error('seccion_clase')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
            </div>
            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <label for="descripcion_clase">Descripción de la clase</label>
                    <textarea class="form-control" name="descripcion_clase" rows="3"></textarea>
                    @error('descripcion_clase')
                        <h6 class="alert alert-danger">{{ $message }}</h6>
                    @enderror
                </div>
            </div>

            
            <button type="submit" class="btn btn-primary">Aceptar</button> 

        </div>
    </form>
@endsection
