<?php 

session_start();

if(!($_SESSION["level-role"] == 10 && $_SESSION["logueado"]==true) ){
    die("Permiso denegado!! no dispone de permiso para esta accion.");
}


include "../../../model/crudFunctions.php";

update_reportage();

?>
