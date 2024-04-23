<?php

include_once('../models/borrar.php');
include_once('../models/guardar.php');
include_once('../models/consulta.php');
include_once('../models/actualizar.php');

$opcion=$_SERVER["REQUEST_METHOD"];
switch($opcion){
    case "GET":
        crudS::SeleccinarEstudiantes();
        break;
    case "POST":
        crudG::GuardarEstudiantes();
        break;
    case "DELETE":
        crudB::BorrarEstudiante();
        break;
    case "PUT":
        crudA::ActualizarEstudiantes();
        break;
}
?>