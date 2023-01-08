<?php 

if(!isset($_SESSION['logueado']) && !$_SESSION['logueado'] ){
    die("Acceso denegado!! necessita una cuenta activa para acceder aqui");
}

    // El archivo que se quiera guardar
    if(isset($_GET["nav"]))
        $source ="views/Explorador_de_archivos/".$_SESSION['usuario'].$_GET['nav'];


    if(isset($_GET["arch"]))
        $tipo = $_GET["arch"];


    if(isset($_GET["root"]))
        $ruta_anterior = $_GET["root"];


    if(isset($_GET["fichero"]))
        $file = $_GET["fichero"];
    
        

    
    $destination = "views/Explorador_de_archivos/".$_SESSION['usuario']."/directory_copias";  // se trata de un destino fijo
    
    //El destino donde se guardara la copia
    if(!file_exists($destination)){
        mkdir($destination, 0777);
    }

    

// echo $source;

if(is_dir($destination)){
    copiarDeDirectoris($source, $destination);
}

// header("locarion: index.php?action=browser&nav=". $ruta_anterior );




    //  Funció que crea directoris amb els seus archius, en cas que en tingui, de forma recursiva.
    function copiarDeDirectoris( $source, $destination ) {
        global $tipo;
        global $file;
        // echo "funciona";

        if($tipo ==="Carpeta"){

            foreach(glob($source . "/*") as $archivos_carpeta){             
                if (is_dir($archivos_carpeta)){
                    $destino_dir=str_replace($source, $destination, $archivos_carpeta);

                    copiarDeDirectoris($archivos_carpeta, $destino_dir);
                } else {
                    $archivo_copiar=str_replace($source, $destination, $archivos_carpeta);
                    copy($archivos_carpeta, $archivo_copiar );
                }
            }
            
        }elseif($tipo ==="fichero"){
            // $nombre=str_replace($source, $destination, $source);
            // echo $nombre;

            copy($source, $destination."\\".$file);
        }
        
    //     // echo "aaa: ".$source;
    //     // echo '<br>';
    //     // echo  $destination."\\".$file;
    //     // echo '<br>';
    //     // echo $file;

        header("location: index.php?action=browser&nav=\directory_copias");


    }

    // copies files and non-empty directories




