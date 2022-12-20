<?php 

defined("MVC_CMS") or die("Permision denied");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>

        body{
            background-color:  #c3cbd1;
        }
        .formulario {
            width: 70%;
            background-color: #acb3b9;
        }
        
        #inputPassword{
            width: 100%;
        }

    </style>

</head>
<body>


<div class="m-5 w-30 p-5 formulario center">

    <h3 class=" pb-3">Registro</h3>
    <!-- <br> -->
    <form class="m-20" action="setUser.php" method="POST">
        
        <div class="mb-3 row">
            <label for="user" class="col-sm-3 col-form-label">Usuario</label>
            <div class="col-sm-9">
                <input type="text" name="username" class="form-control" id="user" placeholder="Nombre de usuario">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-3 col-form-label">Nombre Completo</label>
            <div class="col-sm-9">
                <input type="text" name="name" class="form-control" id="name" placeholder="Nombre completo">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-3 col-form-label">Contraseña</label>
            <div class="col-sm-9">
                <input type="password" name="pass" class="form-control w-20 " id="inputPassword" placeholder="Password">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="text" name="email" class="form-control" id="email" placeholder="Email">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="edad" class="col-sm-3 col-form-label">Edad</label>
            <div class="col-sm-9">
                <input type="number" name="age" class="form-control" id="edad" placeholder="Anote su edad">
            </div>
        </div>

        <div class="mt-5 "><a href="loginPage.php">Inicia session aqui.</a></div>
        
        <input class="mt-3 btn btn-secondary" name="registro" type="submit" value="Registrarse">
    </form>

</div>

</body>
</html>