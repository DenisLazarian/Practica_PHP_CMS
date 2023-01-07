

<?php 


if(!isset($_SESSION["logueado"]) || $_SESSION["logueado"]==false){
    die("Permiso denegado!!! Debe iniciar session para acceder aqui. Inicia sessión <a href='index.php?action=login'>Aqui</a>.");
}

?>


<nav class="navbar navbar-expand-lg navbar-light border border-bottom-width-5  ">
    <div class="container-fluid text-dark m-xs-0 m-lg-5 mt-lg-2 mb-lg-2">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-left">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php?action=priv-space">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Products
                    </a>
                    <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" tabindex="-1">Contact</a>
                </li>
            </ul>

            
            <?php 
            if($_SESSION["logueado"] && $_SESSION['level-role']>=5){
            ?>

            
            
            <div class="dropdown nav-item "> <?php // settings en funcion de la session i el rol ?>
            
                <a href="#" class="nav-link  dropdown-toggle text-dark " id="nav-settings" data-bs-toggle="dropdown" aria-expanded="false" > <img src="views/img/user.png" alt="icono de admnistración de usuarios" style="height:23px"/> </a>
                <ul  class="dropdown-menu dropdown-menu dropdown-menu-left" aria-labelledby="nav-settings">
                    <?php 
                    if($_SESSION['level-role'] ==10){
                    ?>
                    
                    <li><a href="index.php?action=user-list" class="nav-link text-dark">Manage users</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <?php 
                    } 
                    ?>
                        
    
                    <li><a href="index.php?action=news-list" class="nav-link text-dark">Manage news</a></li>
                </ul>
            </div>

            <?php 
            } 
            ?>

            
            

            <!-- <div class="collapse navbar-collapse text-center"> -->
            <div class ="dropdown nav-item">
                
                <a href="#" class="nav-link  dropdown-toggle pl-5 text-dark"  id="navBarAccount" role="button" data-bs-toggle="dropdown" aria-expanded="false">Perfil</a>
                
                <ul class="dropdown-menu dropdown-menu dropdown-menu-left" aria-labelledby="navBarAccount">
                    <div class="navLink">
                        <a href="#" class="nav-link" id="navBarAccount" role="button">
                            <img class="img-fluid bg rounded-circle border border-dark"  src="views/img/user-solid.svg" alt="foto de perfil" style="height:38px">
                            <span class="text-dark ml-3"> <?php  //Aqui se especifica el nombre del usuario de la sessión ?>
                            
                                <?php 
                                if($_SESSION["logueado"]){
                                    echo $_SESSION["usuario"];
                                }else{
                                    echo "Not logged";
                                }
                                ?>
                                

                            </span>
                        </a >
                        <strong class="m-3"> <?php
                        if($_SESSION["level-role"]==10){
                            echo "admin";
                        }elseif( $_SESSION["level-role"]>=5){
                            echo "reporter";
                        }
                        else{
                            echo "user";
                        }
                        ?>
                            

                        </strong>
                        
                    </div>
                    <li><hr class="dropdown-divider"></li>
                    
                    <li>
                        <!-- <?php 
                        if($_SESSION['logueado']){
                            echo '<a href="index.php?action=close" class="dropdown-item">Log out</a>';
                        }else{
                            echo '<a href="index.php?action=login" class="dropdown-item">Log in</a>';
                        }
                        ?> -->
                        
                            
                        <a href="index.php?action=change-pass" class="dropdown-item">Change password</a>
                    </li>
                    
                    <li>
                        <a href="index.php?action=close" class="dropdown-item">Log out</a>
                    <!-- <?php 
                        if($_SESSION['logueado']){
                            echo '<a href="index.php?action=change-pass" class="dropdown-item">Change password</a>';
                        }else{
                            echo '<a href="index.php?action=register" class="dropdown-item">Register</a>';
                        }
                    ?> -->
                    </li>
                </ul>
                
            </div>

            <!-- </div> -->
            
            
        </div>
    </div>
</nav>