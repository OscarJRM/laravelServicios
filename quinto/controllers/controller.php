<?php
class MvcController{

    public function plantilla(){
        include "views/template.php";
    }

    public function enlacesPaginaController(){
        if(isset($_GET['action'])){
            $enlacesController=$_GET['action'];

        }else{
            $enlacesController='inicio';
        }
        $respuesta=EnlacesPaginas::enlacesPaginasModel($enlacesController);
        include $respuesta;
    }
}
?>