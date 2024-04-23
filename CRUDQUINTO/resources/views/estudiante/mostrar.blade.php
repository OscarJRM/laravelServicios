@extends('estudiante/template')
@section('title',"MostrarTodos")
@section('content')

<h1>Lista estudiantes</h1>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  

<table class = "table">
<thead>
    <tr>
        <th>Cedula</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Direccion</th>
        <th>Telefono</th>
    </tr>
</thead>
<tbody>

@foreach($estudiantesArray AS $estudiante)
<tr>
    <td>{{$estudiante['CED_EST']}}</td>
    <td>{{$estudiante['NOM_EST']}}</td>
    <td>{{$estudiante['APE_EST']}}</td>
    <td>{{$estudiante['DIR_EST']}}</td>
    <td>{{$estudiante['TEL_EST']}}</td>
    <td>
    <button class="btnEditar" id="btnEditar" 
                data-cedula="{{$estudiante['CED_EST']}}" 
                data-nombre="{{$estudiante['NOM_EST']}}" 
                data-apellido="{{$estudiante['APE_EST']}}" 
                data-direccion="{{$estudiante['DIR_EST']}}" 
                data-telefono="{{$estudiante['TEL_EST']}}">
            Editar
        </button>
    <form action="{{url('estudiantes/'.$estudiante['CED_EST'])}}" method="post">

    @method("DELETE")
    @csrf
    <button type = "submit" class="btn btn-success">Eliminar</button>
    </form>

</td>
</tr>
@endforeach
</tbody>

</table>


<a href="{{ url('estudiantes/create') }}" class="btn btn-success">Crear nuevo estudiante</a>
<!-- Tu contenido anterior aquí -->
<!-- Formulario de edición -->
<form id="formEditarEstudiante" action="{{url('estudiantes/'.$estudiante['CED_EST'])}}" method="POST">
    @method('PUT')
    @csrf
    <label for="edit_nombre">Nombre:</label>
    <input type="text" name="NOM_EST" id="edit_nombre" value="{{$estudiante['NOM_EST']}}" />
    <label for="edit_apellido">Apellido:</label>
    <input type="text" name="APE_EST" id="edit_apellido" value="{{$estudiante['APE_EST']}}" />
    <label for="edit_direccion">Dirección:</label>
    <input type="text" name="DIR_EST" id="edit_direccion" value="{{$estudiante['DIR_EST']}}" />
    <label for="edit_telefono">Teléfono:</label>
    <input type="text" name="TEL_EST" id="edit_telefono" value="{{$estudiante['TEL_EST']}}" />
    <button type="submit" class="btnGuardarCambios">Guardar cambios</button>
</form>


<!-- Tu contenido posterior aquí -->

<script>
    // Manejar el evento de clic en el botón "Editar"
    $(".btnEditar").click(function(){
        var cedula = $(this).data("cedula");
        var nombre = $(this).data("nombre");
        var apellido = $(this).data("apellido");
        var direccion = $(this).data("direccion");
        var telefono = $(this).data("telefono");

        // Llenar el formulario dentro del modal con los datos del estudiante
        $("#edit_cedula").val(cedula);
        $("#edit_nombre").val(nombre);
        $("#edit_apellido").val(apellido);
        $("#edit_direccion").val(direccion);
        $("#edit_telefono").val(telefono);

        // Mostrar el modal
        $("#modalEditarEstudiante").show();
    });

    // Manejar el evento de clic en el botón "Cerrar" del modal
    $(".close").click(function(){
        $("#modalEditarEstudiante").hide();
    });
</script>
@endsection