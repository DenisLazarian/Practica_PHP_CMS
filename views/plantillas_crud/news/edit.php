<?php 
// error_reporting(E_ERROR);

defined("MVC_CMS") or die('Permission denied');
session_start();

if(!($_SESSION["level-role"] == 10 && $_SESSION["logueado"]==true) ){
    die("Permiso denegado!! no dispone de permiso para esta accion.");
}




include "model/crudFunctions.php";

$reportage = selected_reportage();
// echo $reportage['titulo'];



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body class=" bg-info">


<div class=" d-flex justify-content-center align-items-center   p-md-5   ">
        <form class="bg bg-white p-5  " style="width: 29rem;" action="views/plantillas_crud/news/update.php?id=<?=$_GET['id']; ?>" method="post" >
        
            
            <!-- <div>
               
                Modificació de dades de la noticia amb titol  &#32;<b style="maring-left:5px"> <?=$reportage['titulo']; ?></b>.
            </div> -->

            
            <div class="d-flex input-group mt-3">
                <div class="input-group-text bg-info">
                    <img class="" style="height: 20px;" src="views/img/user-solid.svg" alt="icono de usuario">
                </div>
                <input  class="form-control" type="text" name="new-title" id="name-reportage" value="<?=$reportage['titulo']; ?>">


            </div>

            
            

            
            
            <div class="d-flex input-group mt-3">
                <div class="input-group-text bg-info">
                    <img class="" style="height: 20px;" src="views/img/check-to-slot-solid.svg" alt="icono de edad ">
                </div>
                <input class="form-control" type="date" name="new-date" id="date" value="<?=$reportage['fecha']; ?>">

            </div>
            <div class="d-flex input-group mt-3">
                <div class="input-group-text bg-info">
                    <img class="" style="height: 20px;" src="views/img/envelope-solid.svg" alt="icono de correo ">
                </div>
                <input class="form-control" type="text" name="new-description" id="description" value="<?=$reportage['descripcio']; ?>">

            </div>
           
        
            
        

            <input class="fw-semibold btn btn-info w-100 text-light mt-4" name="modificar" type="submit" value="Modify">
            <a href="index.php?action=reportage-list" class="text-decoration-none">Return to the administration area.</a>
            
            
        </form>

    </div>

    
    




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>