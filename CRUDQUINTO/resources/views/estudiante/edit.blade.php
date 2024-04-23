@extends('estudiante/template')
@section('title',"Editar Estudiante")
@section('content')

<form action="{{ url('/estudiantes/'.$estudiante['CED_EST']) }}" method="GET">
    @method('PUT')
    @csrf
    <div>
        <label for="NOM_EST">Nombre</label>
        <input type="text" name="NOM_EST" id="NOM_EST" value="{{ $estudiante['NOM_EST'] }}">
    </div>
    <div>
        <label for="APE_EST">Apellido</label>
        <input type="text" name="APE_EST" id="APE_EST" value="{{ $estudiante['APE_EST'] }}">
    </div>
    <div>
        <label for="DIR_EST">Direccion</label>
        <input type="text" name="DIR_EST" id="DIR_EST" value="{{ $estudiante['DIR_EST'] }}">
    </div>
    <div>
        <label for="TEL_EST">Telefono</label>
        <input type="text" name="TEL_EST" id="TEL_EST" value="{{ $estudiante['TEL_EST'] }}">
    </div>
    <button type="submit">Guardar</button>
</form>

@endsection
