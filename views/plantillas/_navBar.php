<nav class="navbar navbar-expand-lg navbar-dark bg-dark  ">
    <div class="container-fluid text-light m-xs-0 m-lg-5 mt-lg-2 mb-lg-2">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-left">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Products
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
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

            <!-- <div class="collapse navbar-collapse text-center"> -->
                <div class ="dropdown nav-item">
                    <a href="#" class="nav-link text-light dropdown-toggle pl-5"  id="navBarAccount" role="button" data-bs-toggle="dropdown" aria-expanded="false">Perfil</a>
                    
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-left" aria-labelledby="navBarAccount">
                        <div class="navLink">
                            <a href="#" class="nav-link" id="navBarAccount" role="button">
                            <img class="img-fluid bg-light rounded-circle"  src="views/img/user-solid.svg" alt="foto de perfil" style="height:38px">
                            <span class="text-light ml-3">user</span>
                            </a>
                            <strong class="m-3">admin</strong>
                            
                        </div>
                        <li><hr class="dropdown-divider"></li>
                        <li><a href="index.php?action=login" class="dropdown-item">Log in</a>    </li>
                        <li><a href="index.php?action=register" class="dropdown-item">Register</a>  </li>
                    </ul>
                    
                </div>

            <!-- </div> -->
            
            
        </div>
    </div>
</nav>