<?php 
session_start();

// include "model/crudFunctions.php";
// error_reporting(E_ERROR);
if(!($_SESSION["level-role"] == 10 && $_SESSION["logueado"]==true) ){
    die("Permiso denegado!! no dispone de permiso para esta accion.");
}


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
        <form class="bg bg-white p-5  " style="width: 29rem;" action="index.php?action=new-create" method="post" >
        
            
            <div>
                Bienvenido &#32;<b> <?=$_SESSION['usuario']; ?></b>. Aqui puede crear un reportage de forma manual:
            </div>
            
            <div class="d-flex input-group mt-3">
                <div class="input-group-text bg-info">
                    <img class="" style="height: 20px;" src="views/img/user-solid.svg" alt="icono de titulo">
                </div>
                <input  class="form-control" type="text" name="new-title" id="title" placeholder="Title">

            </div>
            <div class="d-flex input-group mt-3">
                <div class="input-group-text bg-info">
                    <img class="" style="height: 20px;" src="views/img/user-solid.svg" alt="icono de fecha">
                </div>
                <input  class="form-control" type="date" name="new-date" id="date" placeholder="Date">

            </div>

            
            <div class="d-flex input-group mt-3">
                <div class="input-group-text bg-info">
                    <img class="" style="height: 20px;" src="views/img/check-to-slot-solid.svg" alt="icono de descripción ">
                </div>
                <input class="form-control" type="text" name="new-description" id="description" placeholder="Description">
            </div>
            
        
            <input class="fw-semibold btn btn-info w-100 text-light mt-4" name="crear-new" type="submit" value="Create reportage">
            <a href="index.php?action=news-list" class="text-decoration-none">Return to the administration area.</a>
            
            
        </form>

    </div>

    <?php 
    include "model/crudFunctions.php";

    insertNewByAdminOrReporterAction();

    ?>
    
    




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>