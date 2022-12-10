@extends('app')
@section('contenido')

<div class="container-fluid  p-4">
    <form action="{{route('clases', ['clase'=>$clase->id])}}" method='POST'>
        @method('PATCH')
        @csrf
        {{-- @if (session('success'))
        <h6 class="alert alert-success">{{session('success')}}</h6>
        @endif

        @error('title')
        <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror --}}
        
        <div class=" row border border-2 rounded justify-content-center mx-5 py-5">
            <div class="col-sm-6 col-lg-8">
                <div class="mb-3 ">
                    <label for="name" class="form-label">El código de la clase es: <strong> {{$clase->codigo_clase}}</strong></label>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Clase</label>
                    <input type="text" name="titulo" class="form-control" value="{{$clase->nombre_clase}}">
                </div>
                <div class="mb-3">
                    <label for="color" class="form-label">Descripción</label>
                    <input type="text" name="descripcion" class="form-control" value="{{$clase->descripcion_clase}}">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar categoría</button>
            </div>

        </div>
        
        
    </form>

    {{-- <div>
        @if ($category->todos->count()>0)
        @foreach ($category->todos as  $todo)

        <div class="row py-1">
            <div class="col-md-9 d-flex align-items-center">
                <a class="d-flex align-items-center gap-2" 
                href="{{ route('todos-update',['id'=>$todo->id])}}">
            {{$todo->title}}
                </a>
            </div>
            <div class="col-md-3 d-flex justify-content-end">
                <form action="{{route('todos-destroy', [$todo->id])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </div>
        </div>
            
        @endforeach

        @else
        No hay tareas para mostrar en esta categoría.

        @endif
       
    </div> --}}
</div>

@endsection
