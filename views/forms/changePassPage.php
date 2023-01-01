
<?php 
// defined("MVC_CMS") or die('Permission denied');

session_start();
if(!$_SESSION['logueado']) // Per si entra amb URL
    die("Acceso denegado!! Necessitas loguearte primero antes de acceder aqui.");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body class="bg-info">
    
    <div class=" d-flex justify-content-center align-items-center   p-md-5   bg-info ">
        <form class="bg bg-white p-5  " style="width: 29rem;" action="model/changePass.php" method="post" >
        
            
            <div>
                <!-- <div class="input-group-text bg-info">
                    <img class="" style="height: 20px;" src="views/img/user-solid.svg" alt="icono logueo de usuario">
                </div>
                <input class="form-control" type="text" name="username" id="user" value="hello" disabled> -->
                Canvi de contrasenya per al usuari &#32;<b style="maring-left:5px"> <?=$_SESSION['usuario']; ?></b>.
            </div>

            <div class="d-flex input-group mt-3">
                <div class="input-group-text bg-info">
                    <img class="" style="height: 20px;" src="views/img/lock-solid.svg" alt="icono de contraseña ">
                </div>
                <input class="form-control" type="password" name="oldPass" id="pass" placeholder="Old password">


            </div>

            <?php 
            if($_SESSION['not-correct-pass'] || $_SESSION['not-equal-error'] && $_SESSION['not-correct-pass']){
            ?>
            
            <div style="color: #db4437">La constraseña no es correcto.</div>
            <?php } ?>
            
            <div class="d-flex input-group mt-3">
                <div class="input-group-text bg-info">
                    <img class="" style="height: 20px;" src="views/img/lock-solid.svg" alt="icono de contraseña ">
                </div>
                <input class="form-control" type="password" name="newPass" id="pass" placeholder="New password">

            </div>
            <div class="d-flex input-group mt-3">
                <div class="input-group-text bg-info">
                    <img class="" style="height: 20px;" src="views/img/lock-solid.svg" alt="icono de contraseña ">
                </div>
                <input class="form-control" type="password" name="confirmNewPass" id="pass" placeholder="Confirm your new password">
            </div>
            <?php 
            if($_SESSION['not-equal-error'] || $_SESSION['not-equal-error'] && $_SESSION['not-correct-pass']){
            ?>
            <div style="color: #db4437">Els passwords no coinciden entre si.</div>
            <?php }
            
            ?>
            

            <input class="fw-semibold btn btn-info w-100 text-light mt-4" name="enviar" type="submit" value="Change password">
            
            
            
        </form>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>


</body>
</html>