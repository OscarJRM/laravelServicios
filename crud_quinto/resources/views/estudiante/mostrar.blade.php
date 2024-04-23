@extends('estudiante/template')
@section('title', 'MostrarTodos')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<h1>Lista de estudiantes</h1>

<table class='table table-dark'>
    <thead>
        <tr>
            <th>Cédula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($estudiantesArray as $estudiante)
        <tr>
            <td>{{ $estudiante['CED_EST'] }}</td>
            <td>{{ $estudiante['NOM_EST'] }}</td>
            <td>{{ $estudiante['APE_EST'] }}</td>
            <td>{{ $estudiante['DIR_EST'] }}</td>
            <td>{{ $estudiante['TEL_EST'] }}</td>
            <td>
                <form action="{{ url('estudiantes/'.$estudiante['CED_EST']) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-primary">Eliminar</button>
                </form>
                <a href="{{ url('estudiantes/'.$estudiante['CED_EST'].'/edit') }}" class="btn btn-primary">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ url('estudiantes/create') }}" class="btn btn-success">Crear nuevo estudiante</a>

@endsection
