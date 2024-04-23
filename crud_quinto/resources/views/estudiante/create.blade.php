@extends('estudiante/template')
@section('title', 'Nuevo estudiante')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<form action="{{ url('/estudiantes') }}" method="post" class="row g-3">
    @csrf
    <div class="col-md-6">
        <label for="CED_EST" class="form-label">Cédula</label>
        <input type="text" name="CED_EST" id="CED_EST" class="form-control">
    </div>
    <div class="col-md-6">
        <label for="NOM_EST" class="form-label">Nombre</label>
        <input type="text" name="NOM_EST" id="NOM_EST" class="form-control">
    </div>
    <div class="col-md-6">
        <label for="APE_EST" class="form-label">Apellido</label>
        <input type="text" name="APE_EST" id="APE_EST" class="form-control">
    </div>
    <div class="col-md-6">
        <label for="DIR_EST" class="form-label">Dirección</label>
        <input type="text" name="DIR_EST" id="DIR_EST" class="form-control">
    </div>
    <div class="col-md-6">
        <label for="TEL_EST" class="form-label">Teléfono</label>
        <input type="text" name="TEL_EST" id="TEL_EST" class="form-control">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>
@endsection
