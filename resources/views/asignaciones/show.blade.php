@extends('app')
@section('contenido')
    <div class="container-fluid  p-4">

        @if (session('success'))
            <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif

        <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
            </button>
            <div class="dropdown-menu">
                @if ($roleId == 1 || $roleId == 2)
                    <a class="dropdown-item"
                        href="{{ route('asignaciones-edit', ['asignacion' => $assignment->id, 'id' => $claseId]) }}"> Editar
                        asiganación </a>
                    {{-- <a class="dropdown-item" href="{{ route('asignaciones-create', ['id' => $claseId]) }}"> Crear asignación </a> --}}
                @endif
                @if ($roleId == 1)
                    <form action="{{ route('asignaciones.destroy', [$assignment->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="dropdown-item text-danger" data-bs-toggle="modal" 
                        data-bs-target="#modal-eliminar"> Eliminar asignación </button>
                    </form>
                @endif

            </div>
        </div>

        <div class=" row border border-2 rounded-top  rounded-3 justify-content-center mx-5 py-5">


            <div class="col-sm-6 col-lg-8">
                <div class="mb-3">
                    <label type="text" name="titulo" class="display-4">{{ $assignment->titulo_asignacion }}</label>

                </div>

                <div class="mb-3">

                    <div class="blockquote">
                        @if ($assignment->descripcion_asignacion != null)
                            <p class="mb-0">{{ $assignment->descripcion_asignacion }}</p>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar categoría</button>

            </div>
        </div>

    </div>
@endsection
