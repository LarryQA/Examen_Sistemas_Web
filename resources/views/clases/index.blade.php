@extends('app')

@section('contenido')
    <section class="news pt-0">
        <div class="container mt-md-5">
            @if ($clases->count() > 0)
                @if ($master == true)
                    <h2 class="mx-4 my-0 text-center">Clases Impartidas</h2>
                @else
                    <h2 class="mx-4 my-0 text-center">Clases Recibidas</h2>
                @endif
            @endif


            <ul class="row d-lg-flex list-unstyled image-block justify-content-center px-lg-0 mx-lg-0">

                @if ($clases->count() > 0)

                    @if ($master == true)
                        @foreach ($clases as $clase)
                            <li class="col-lg-3 col-md-5 mx-3 my-3 image-block full-width border px-0">
                                <div class="image-block-inner">
                                    <a class="mh-100" href="#">
                                        <img src="https://img.freepik.com/free-photo/pastel-background-sky-feminine-style_53876-104862.jpg"
                                            class="img-responsive w-100"></a>
                                    <div class="mx-3 my-3">
                                        <h4 class="mt-3"><a href="{{ route('clase-show', ['id' => $clase->id]) }}">
                                            {{ $clase->nombre_clase }} </a></h4>
                                            <!--  <p></p> -->
                                        <p><B>{{ $clase->grado_clase }}</B></p>
                                        <p><B>{{ $clase->seccion_clase }}</B></p>
                                    </div>

                                    
                                </div><!-- .image-block-inner -->
                            </li>
                        @endforeach
                    @else
                        @foreach ($clases as $clase)
                        <li class="col-lg-3 col-md-5 mx-3 my-3 image-block full-width border px-0">
                            <div class="image-block-inner">
                                <a class="mh-100" href="#">
                                    <img src="https://img.freepik.com/free-photo/pastel-background-sky-feminine-style_53876-104862.jpg"
                                        class="img-responsive w-100"></a>
                                <div class="mx-3 my-3">
                                    <h4 class="mt-3"><a href="{{ route('clase-show', ['id' => $clase->id]) }}">
                                        {{ $clase->nombre_clase }} </a></h4>
                                        <!--  <p></p> -->
                                    <p><B>{{ $clase->grado_clase }}</B></p>
                                    <p><B>{{ $clase->seccion_clase }}</B></p>
                                </div>                                
                            </div><!-- .image-block-inner -->
                        </li>
                        @endforeach
                    @endif
                @else
                    @if ($master == true)
                        <div class="inner cover">
                            <h1 class="cover-heading">¡No hay clases!</h1>
                            <p class="lead">
                                Parece que no hay ninguna clase que impartas, crea una nueva clase o pídele
                                al propietario que te asigne un rol.
                            </p>
                            <p class="lead">
                                <a href="/nueva-clase" class="btn btn-lg btn-secondary">Crear clase</a>
                            </p>
                        </div>
                    @else
                    <div class="inner cover">
                        <h1 class="cover-heading">¡No hay clases!</h1>
                        <p class="lead">
                            Parece que no hay ninguna clase que recibas, prueba ingresando el código correspondiente
                            para unirte a una clase.
                        </p>
                        <p class="lead">
                            <a href="/unirse" class="btn btn-lg btn-secondary">Unirse</a>
                        </p>
                    </div>

                    @endif

                @endif



            </ul>
        </div>
    </section>
@endsection
