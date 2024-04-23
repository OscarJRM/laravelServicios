<?php
class crudB {
    
    public  static function BorrarEstudiante(){
include_once('conexion.php');
$objeto=new conexion();
$conectar=$objeto->conectar();
$cedula=$_GET["CED_EST"];
$borrarSQL="DELETE FROM ESTUDIANTES WHERE CED_EST='$cedula'";
$resultado=$conectar->prepare($borrarSQL);

$resultado->execute();
echo json_encode($resultado);
$conectar->commit();

    }}
?>