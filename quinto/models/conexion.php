<?php
class conexion{
    public function conectar(){
define("server","htpp://localhost");
define("db","quinto");
define("user","root");
define("psw","");
$opc=array(PDO::MYSQL_ATTR_INIT_COMMAND> 'SET NAMES utf8');
try{
$con=new PDO("mysql: host=".server.";dbname=".db,user,psw,$opc);
return $con;
}
catch(Exception $e){
    die("error en la conexion".$e->getMessage());
}
}
}
?>