<?php 

if(!isset($_SESSION['logueado']) && !$_SESSION['logueado'] ){
    die("Acceso denegado!! necessita una cuenta activa para acceder aqui");
}

if(isset($_GET["nav"])){
    $root = "views/Explorador de archivos/".$_SESSION['usuario'].$_GET["nav"];
    echo $root;
}

if(isset($_GET["root"])){
    $root2 = $_GET["root"];

}

if(isset($_GET["arch"])){
    $tipo = $_GET["arch"];
}

// echo $root;
// echo $root2;

if($tipo=="fichero"){
    unlink($root);
    echo "borrado fichero";

}elseif($tipo ==="carpeta"){
    rmDir_rf($root);
    
    // rmdir($root);
    // echo "borrado carpeta";
}else{
    echo "algo pasa";
}

header("location:index.php?action=browser&nav=".$root2);



function rmDir_rf($root)
    {
    // $a = scandir($root);
        foreach(glob($root . "/*") as $archivos_carpeta){             
            if (is_dir($archivos_carpeta)){
                rmDir_rf($archivos_carpeta);
            } else {
                unlink($archivos_carpeta);
            }
        }
        rmdir($root);
    }

?>
