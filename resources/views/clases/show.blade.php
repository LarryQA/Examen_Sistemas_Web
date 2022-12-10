@extends('app')
@section('contenido')
    <div class="container-fluid  p-4">
            {{-- @if (session('success'))
        <h6 class="alert alert-success">{{session('success')}}</h6>
        @endif

        @error('title')
        <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror --}}
            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                </button>
                <div class="dropdown-menu">
                    @if ($roleId == 1 || $roleId == 2)
                        <a class="dropdown-item" href=""> Editar clase </a>
                        <a class="dropdown-item" href="{{ route('asignaciones-create', ['id' => $claseId]) }}"> Crear asignación </a>
                    @endif
                    <a class="dropdown-item" href=""> Ver personas </a>
                    @if ($roleId == 1)
                        <a class="dropdown-item text-danger" href=""> Eliminar clase </a>
                    @endif
                </div>
            </div>


            <div class=" row border border-2 rounded-top  rounded-3 justify-content-center mx-5 py-5">


                <div class="col-sm-6 col-lg-8">
                    <div class="mb-3">
                        <label type="text" name="titulo" class="display-3">{{ $clase->nombre_clase }}</label>

                    </div>

                    <div class=" row px-3">
                        @if ($clase->grado_clase != null)
                            <p class="mr-3"><strong>Grado: </strong>
                                {{ $clase->grado_clase }}</p>
                        @endif
                        @if ($clase->seccion_clase != null)
                            <p><strong>Sección: </strong> {{ $clase->seccion_clase }}</p>
                        @endif

                    </div>

                    <div class="mb-3">

                        <div class="blockquote">
                            @if ($clase->descripcion_clase != null)
                                <p class="mb-0">{{ $clase->descripcion_clase }}</p>
                            @endif
                            <footer class="blockquote-footer">Código: <strong>
                                    {{ $clase->codigo_clase }}</strong>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>

        @include('asignaciones.index')

    </div>
@endsection
