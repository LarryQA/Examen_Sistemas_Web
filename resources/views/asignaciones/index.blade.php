<div class=" row border border-top-0 rounded-bottom justify-content-center mx-5 py-2">
    <div class="col-sm-6 col-lg-8">
        <div class="mb-3">
           

            @if ($assignments->count() > 0)
            <h2 class="mb-5">Asignaciones</h2>

                @foreach ($assignments as $assignment)
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title">{{$assignment->user->primer_nombre}} {{$assignment->user->primer_apellido}} ha publicado "<strong>{{$assignment->titulo_asignacion}}</strong>"</h5>
                    </div>
                    <div class="card-body">
                      <p class="card-text">{{ Str::limit($assignment->descripcion_asignacion, 100, ' ...') }}</p>
            
                      <a href=" {{ route('asignaciones-show', ['asignacion' => $assignment->id, 'id' => $claseId]) }}" class="btn btn-primary">Ver más</a>
                    </div>
                  </div>

                @endforeach


            @else

            <div class="inner cover">
                <h1 class="cover-heading">¡No hay asignaciones!</h1>
                <p class="lead">
                    Parece que no has creado una asignación todavía, ¿deseas crear una?
                </p>
                <p class="lead">
                    <a href="{{ route('asignaciones-create', ['id' => $claseId]) }}" class="btn btn-lg btn-secondary">Crear asignación</a>
                </p>
            </div>

            @endif



        </div>
    </div>
</div>
