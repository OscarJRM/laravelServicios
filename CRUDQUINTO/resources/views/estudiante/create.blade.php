@extends('estudiante/template')
@section('title',"Nuevo Estudiante")
@section('content')


<form action="{{url('/estudiantes')}}" method="post">
    @csrf
    <div>
        <label for="CED_EST">Cedula</label>
        <input type="text" name ="CED_EST" id="CED_EST">
    </div>
    <div>
        <label for="NOM_EST">Nombre</label>
        <input type="text" name ="NOM_EST" id="NOM_EST">
    </div>
    <div>
        <label for="APE_EST">Apellido</label>
        <input type="text" name ="APE_EST" id="APE_EST">
    </div>
    <div>
        <label for="DIR_EST">Direccion</label>
        <input type="text" name ="DIR_EST" id="DIR_EST">
    </div>
    <div>
        <label for="TEL_EST">Telefono</label>
        <input type="text" name ="TEL_EST" id="TEL_EST">
    </div>
    <button type="submit">Guardar</button>
    
</form>



@endsection

