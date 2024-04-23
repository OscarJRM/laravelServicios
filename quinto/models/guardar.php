<?php

class crudG {
    
    public  static function GuardarEstudiantes(){
include_once('conexion.php');
$cedula=$_POST["CED_EST"];
$nombre=$_POST["NOM_EST"];
$apellido=$_POST["APE_EST"];
$dir=$_POST["DIR_EST"];
$tel=$_POST["TEL_EST"];
$objeto=new conexion();
$conectar=$objeto->conectar();
$insertSql="INSERT INTO estudiantes (CED_EST,NOM_EST,APE_EST,DIR_EST,TEL_EST) VALUES('$cedula','$nombre','$apellido','$dir','$tel')";
$resultado=$conectar->prepare($insertSql);
$resultado->execute();
echo json_encode($resultado);
$conectar->commit();
    }}


?>