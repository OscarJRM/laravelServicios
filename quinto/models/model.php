<?php
class EnlacesPaginas{
    public static function enlacesPaginasModel($enlacesModel){
        if($enlacesModel=='html' || $enlacesModel=='jquery'){
            $module="views/interfaces/".$enlacesModel.".php";
        } else{
           $module= "views/interfaces/inicio.php";
        }
        return $module;
    }
}
?>