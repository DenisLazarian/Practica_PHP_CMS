<?php 

session_start();

if(!$_SESSION["logueado"]){
    header("location: loginPage.php");
}

echo "hola ". $_SESSION["nombre"];


?>
