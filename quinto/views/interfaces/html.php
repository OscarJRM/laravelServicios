<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="controllers/ajax.js"></script>
<button id="btnAgregarEstudiante" style="margin: 10px">Agregar Estudiante</button>

<div id="formularioEstudiante" style="display: none;">
    <h2>Agregar Estudiante</h2>
    <form id="formEstudiante" method="POST">
        <label for="CED_EST">Cedula:</label>
        <input type="text" id="CED_EST" name="CED_EST"><br>

        <label for="NOM_EST">Nombre:</label>
        <input type="text" id="NOM_EST" name="NOM_EST"><br>

        <label for="APE_EST">Apellido:</label>
        <input type="text" id="APE_EST" name="APE_EST"><br>

        <label for="DIR_EST">Direccion:</label>
        <input type="text" id="DIR_EST" name="DIR_EST"><br>

        <label for="TEL_EST">Telefono:</label>
        <input type="text" id="TEL_EST" name="TEL_EST"><br>

        <input type="submit" value="Agregar" id="btnAgregarE">
    </form>
</div>

<div id="formularioEditar" style="display: none;">
    <h2>Editar Estudiante</h2>
    <form id="formEditarEstudiante" method="GET">
    <label for="CED_EST" style="display: none;">Cedula:</label>
        <input type="hidden" id="CED_EST" name="CED_EST"><br>

        <label for="NOM_EST">Nombre:</label>
        <input type="text" id="NOM_EST" name="NOM_EST"><br>

        <label for="APE_EST">Apellido:</label>
        <input type="text" id="APE_EST" name="APE_EST"><br>

        <label for="DIR_EST">Direccion:</label>
        <input type="text" id="DIR_EST" name="DIR_EST"><br>

        <label for="TEL_EST">Telefono:</label>
        <input type="text" id="TEL_EST" name="TEL_EST"><br>

        <input type="submit" value="Editar">
    </form>
</div>



<table class="tabla" id="tablaDatos">
        <thead>
            <tr>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Funciones</th>
                <!-- Agrega aquí más columnas si es necesario -->
            </tr>
        </thead>
        <tbody>
            <!-- Aquí se agregarán las filas de datos -->
        </tbody>
    </table>

</body>
</html>