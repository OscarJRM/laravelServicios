@extends('estudiante/template')
@section('title', 'Editar Estudiante')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <h1>Editar Estudiante</h1>
    <form action="{{url('estudiantes/'.$estudiante['CED_EST'])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="cedula">Cedula</label>
            <input type="text" class="form-control" id="CED_EST" name="CED_EST" value="{{$estudiante['CED_EST']}}">
        </div>
        <div class="form-group">
            <label for="NOM_EST">Nombre</label>
            <input type="text" class="form-control" id="NOM_EST" name="NOM_EST" value="{{$estudiante['NOM_EST']}}">
        </div>
        <div class="form-group">
            <label for="APE_EST">apellido</label>
            <input type="text" class="form-control" id="APE_EST" name="APE_EST" value="{{$estudiante['APE_EST']}}">
        </div>
        <div class="form-group">
            <label for="DIR_EST">direccion</label>
            <input type="text" class="form-control" id="DIR_EST" name="DIR_EST" value="{{$estudiante['DIR_EST']}}">
        </div>
        <div class="form-group">
            <label for="TEL_EST">telefono</label>
            <input type="text" class="form-control" id="TEL_EST" name="TEL_EST" value="{{$estudiante['TEL_EST']}}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
@endsection