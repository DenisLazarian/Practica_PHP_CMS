<?php 
session_start();

if(!isset($_SESSION['logueado'])&& $_SESSION['level-role']<10){
    die("Acceso denegado, no dispone de permisos para acceder aqui");
}

include "config/db.php";
$id = $_GET['id'];
$connexion  = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$connexion->set_charset("utf8");
$select = "SELECT * from users where nick = '".$id."'";

if ($connexion->connect_error) {
    die("Connection failed: " . $connexion->connect_error);
}

$result = $connexion -> query($select);

if ($result->num_rows > 0) {
    // output data of each row
    $user = $result->fetch_assoc();
        
    
} else {
header("location: index.php?action=user-list");
}
$connexion->close();

// echo $user['contraseña'];

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
        <form class="bg bg-white p-5  " style="width: 29rem;" action="views/plantillas_crud/users/update.php" method="post" >
        
            
            <div>
                <!-- <div class="input-group-text bg-info">
                    <img class="" style="height: 20px;" src="views/img/user-solid.svg" alt="icono logueo de usuario">
                </div>
                <input class="form-control" type="text" name="username" id="user" value="hello" disabled> -->
                Modificació de dades de l'usuari  &#32;<b style="maring-left:5px"> <?=$user['nick']; ?></b>.
            </div>

            <!-- <div class="d-flex input-group mt-3">
                <div class="input-group-text bg-info">
                    <img class="" style="height: 20px;" src="views/img/user-solid.svg" alt="icono de usuario">
                </div>
                <input disabled="disabled" class="form-control" type="text" name="new-user-nick" id="nick-user" value="<?=$user['nick']; ?>">


            </div> -->
            <div class="d-flex input-group mt-3">
                <div class="input-group-text bg-info">
                    <img class="" style="height: 20px;" src="views/img/user-solid.svg" alt="icono de usuario">
                </div>
                <input  class="form-control" type="text" name="new-full-name" id="name-user" value="<?=$user['nomcognom']; ?>">


            </div>

            
            

            
            
            <div class="d-flex input-group mt-3">
                <div class="input-group-text bg-info">
                    <img class="" style="height: 20px;" src="views/img/check-to-slot-solid.svg" alt="icono de edad ">
                </div>
                <input class="form-control" type="text" name="new-age" id="age" value="<?=$user['edat']; ?>">

            </div>
            <div class="d-flex input-group mt-3">
                <div class="input-group-text bg-info">
                    <img class="" style="height: 20px;" src="views/img/envelope-solid.svg" alt="icono de correo ">
                </div>
                <input class="form-control" type="text" name="new-mail" id="mail" value="<?=$user['mail']; ?>">

            </div>
            <div class="d-flex input-group mt-3">
                <div class="input-group-text bg-info">
                    <img class="" style="height: 20px;" src="views/img/lock-solid.svg" alt="icono de contraseña ">
                </div>
                <input class="form-control" type="password" name="password" id="pass" placeholder="Password">
            </div>

            <div class="d-flex input-group mt-3">
                <div class="input-group-text bg-info">
                    <img class="" style="height: 20px;" src="views/img/triangle-exclamation-solid.svg" alt="icono de restriccion o permisos">
                </div>
                <input class="form-control" type="number" name="level-role" id="level" value="<?=$user['nivell']; ?>">
            </div>
            
        
            
        

            <input class="fw-semibold btn btn-info w-100 text-light mt-4" name="modificar" type="submit" value="Modify">
            <a href="index.php?action=user-list" class="text-decoration-none">Return to the administration area.</a>
            
            
        </form>

    </div>

    
    




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>