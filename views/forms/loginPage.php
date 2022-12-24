<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incio de sessión</title>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        body{
            background-color:  #c3cbd1;
        }
        .formulario {
            width: 70%;
            background-color: #acb3b9;
            
            /* text-align: center; */
        }
        #username{
            width: 100%
        }
        #inputPassword{
            width: 100%
        }

    </style>

</head>
<body>

    <!-- <h1 class="bg bg-warning" >
        Prueba
    </h1> -->
<!-- <div class="m-5 w-30 p-5 formulario center">


<h3 class=" pb-3">Inicio de sessión</h3>
<form class="m-20" action="validate.php" method="POST">
    <div class="mb-3   row">
    <label for="username" class="col-sm-3 col-xl col-form-label">Usuario</label>
    <div class="col-sm-9">
        <input type="text" name="username" class="form-control" id="username" placeholder="Nombre usuario">
    </div>
    </div>
    <div class="mb-2  row">
        <label for="inputPassword" class="col-sm-3 col-form-label">Contraseña</label>
    <div class="col-sm-9">
        <input type="password" name="password" class="form-control w-20 " id="inputPassword" placeholder="Password">
    </div>
    </div>

    <div class="mt-5 "><a href="registerPage.php">Registrate aqui.</a></div>
    
    <input class="mt-3 btn btn-secondary" name="enviar" type="submit" value="Inciar session">
</form>

</div> -->

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body class="bg-info"> -->
    <div class=" d-flex justify-content-center align-items-center   p-md-5   bg-info ">
        <form class="bg bg-white p-5 " style="width: 29rem;" action="validate.php" method="post" >
        
            <div class="text-center">
                <img class=" border border-dark rounded-circle p-1 border-5" style="height: 7rem;" src="views/img/user-solid.svg" alt="icono inicio sesion de usuario">
    
            </div>
            <h1 class="text-center mt-2 mb-4">LOGIN</h1>


            
            
            <div class="d-flex input-group ">
                <div class="input-group-text bg-info">
                    <img class="" style="height: 20px;" src="views/img/user-solid.svg" alt="icono logueo de usuario">
                </div>
                <input class="form-control" type="text" name="username" id="user" placeholder="Username">

            </div>

            <div class="d-flex input-group mt-3">
                <div class="input-group-text bg-info">
                    <img class="" style="height: 20px;" src="views/img/lock-solid.svg" alt="icono de contraseña ">
                </div>
                <input class="form-control" type="password" name="password" id="pass" placeholder="Password">

            </div>



            <div class="form-check mt-3 d-flex">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <small class="form-check-label text-secondary" style="margin-left: 4px; margin-right: 14px;" for="exampleCheck1">Remember me</small>
                <small class="ml-1 fw-semibold fst-italic"><a class=" text-decoration-none" href="#">forgot your password?</a></small>
            </div>

            <input class="fw-semibold btn btn-info w-100 text-light mt-4" name="enviar" type="submit" value="Login">
            <div class="text-center mt-1">
                <span class="text-secondary">Don't have an account?</span>
                <a href="index.php?action=register" class="text-decoration-none fw-semibold">Register</a>
            </div>

            <div class="p-3">
                <div class=" border-bottom  text-center" style="height: 0.9rem;">
                    <span class="bg-white px-3 text-secondary">or</span>

                </div>
            </div>
            <a href="#" class="btn btn-white d-flex gap-2 justify-content-center border-secondary mt-3    ">
                <img src="views/img/2991148.png" alt="google icon" style="height: 1.6rem;">
                <span>Continue whith Google</span>
            </a>
            
        </form>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

<!-- </body>
</html> -->




</body>
</html>