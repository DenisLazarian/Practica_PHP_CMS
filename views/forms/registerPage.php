<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>

        @media  (max-width: 576px){
            .lastName-class, .img-user-custom {
                margin-top: 15px;
            }
        }

    </style>
</head>
<body class="bg-info">
    <div class=" d-flex justify-content-center align-items-center   p-md-5  p-sm-0   container ">
        <form class="bg bg-white p-5 " style="width: 40rem;" action="#" method="post" >
        
            <h2 class="mb-5">Create account</h2>
            

            <div class="row  ">

                <div class="col-sm-6 ">
                    <div class="input-group">
                        <div class="input-group-text bg-info">
                            <img class="" style="height: 20px;" src="views/img/user-solid.svg" alt="icono de usuario">
                        </div>
                        <input class="form-control" type="text" name="firstName" id="name" placeholder="First name">

                    </div>
                    
                </div>
                
                <div class="col-sm-6 ">
                    <div class="input-group ">
                        <div  class="input-group-text bg-info img-user-custom">
                            <img class="" style="height: 20px;" src="views/img/user-solid.svg" alt="icono de usuario">
                        </div>
                        <input class="form-control lastName-class" type="text" name="lastName" id="lastName" placeholder="Last name">
                    </div>
                
                </div>

            </div>


            <div class="d-flex input-group mt-3">
                <div class="input-group-text bg-info">
                    <img class="" style="height: 20px;" src="views/img/envelope-solid.svg" alt="icono de contraseña ">
                </div>
                <input class="form-control" type="email" name="email" id="mail" placeholder="Email address or username">

            </div>

            <div class="d-flex input-group mt-3 mb-3">
                <div class="input-group-text bg-info">
                    <img class="" style="height: 20px;" src="views/img/phone-solid.svg" alt="icono de contraseña ">
                </div>
                <select class=" border-left-0 border font-weight-bold text-muted"  name="countryNumbers" id="selectNumb">
                    <option value="es">+34</option>
                    <option value="deu">+49</option>
                    <option value="and">+376</option>
                    <option value="ro">+40</option>
                </select>
                <input class="form-control" type="number" name="email" id="mail" placeholder="Phone number">

            </div>

        

            <div class="row  ">

                <div class="col-sm-6 ">
                    <div class="input-group">
                        <div class="input-group-text bg-info">
                            <img class="" style="height: 20px;" src="views/img/lock-solid.svg" alt="icono de contraseña">
                        </div>
                        <input class="form-control" type="text" name="firstName" id="name" placeholder="Password">
                    </div>
                    
                </div>
                
                <div class="col-sm-6  ">
                    <div class="input-group">
                        <div class="input-group-text bg-info img-user-custom">
                            <img class="" style="height: 20px;" src="views/img/lock-solid.svg" alt="icono de contraseña">
                        </div>
                        <input class="form-control lastName-class" type="text" name="firstName" id="name" placeholder="Confirm your password">
                    </div>
                </div>

            </div>
            

            <input class="fw-semibold btn btn-info w-100 text-light mt-4" type="submit" value="Create your account">
            

            <div class="p-3">
                <div class=" border-bottom  text-center" style="height: 0.9rem;">
                    <span class="bg-white px-3 text-secondary">or</span>

                </div>
            </div>
            <a href="#" class="btn btn-white d-flex gap-2 justify-content-center border-secondary mt-3    ">
                <img src="views/img/2991148.png" alt="google icon" style="height: 1.6rem;">
                <span>Continue whith Google</span>
            </a>
            <div class="text-center mt-1">
                <span class="text-secondary">Already registered?</span>
                <a href="index.php?action=login" class="text-decoration-none fw-semibold">Login</a>
            </div>
            
        </form>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>