<?php

class crudA {
    
public  static function ActualizarEstudiantes(){
include_once('conexion.php');
$cedula=$_GET["CED_EST"];
$nombre=$_GET["NOM_EST"];
$apellido=$_GET["APE_EST"];
$dir=$_GET["DIR_EST"];
$tel=$_GET["TEL_EST"];
$objeto=new conexion();
$conectar=$objeto->conectar();
$insertSql="UPDATE estudiantes SET NOM_EST='$nombre',APE_EST='$apellido',DIR_EST='$dir',TEL_EST='$tel' WHERE CED_EST='$cedula'";
$resultado=$conectar->prepare($insertSql);
$resultado->execute();
echo json_encode($resultado);
$conectar->commit();
    }}


?>