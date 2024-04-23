<?php
class crudS {
    
public  static function SeleccinarEstudiantes(){
include_once ("conexion.php");
$objeto=new conexion();
$conexion=$objeto->conectar();
$sqlSelect="SELECT * FROM ESTUDIANTES";
$resultado=$conexion->prepare($sqlSelect);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);
}
}
?>