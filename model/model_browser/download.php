<?php 
if(!isset($_SESSION['logueado']) && !$_SESSION['logueado'] ){
    die("Acceso denegado!! necessita una cuenta activa para acceder aqui");
}

// if(!$strSession) header("location: index.php");

//  $file_name="arxiu.txt";
 $file_name= "views/Explorador_de_archivos/".$_SESSION['usuario'].$_GET['nav'];

    //  echo $file_name;   
//  pdf: $mime = 'application/pdf'
//  zip: $mime = 'application/zip'
//  jpeg / jpg: $mime = 'image/jpg'
//  default: $mime = 'application/force-download'
 
 
    header('Pragma: public');     // required
    header('Expires: 0');        // no cache, desactiva cache
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0'); //obliga a la recarrega de la pagina obviant tota informació de la cache
    header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($file_name)).' GMT'); // indica que l'arxiu caduca ARA mateix, per evitar el seu cachejat
    header('Cache-Control: private',false); // s'indica que l'arxiu es privat i que no es faci cache en els proxy
    header('Content-Type: application/force-download'); // indica que no es tracta d'un html sino d'un arxiu descarregable
    header('Content-Disposition: attachment; filename="'.basename($file_name).'"'); // nom de l'arxiu 
    header('Content-Transfer-Encoding: binary'); // tipus de codificació del contingut
    header('Content-Length: '.filesize($file_name));    // provide file size
    header('Connection: close'); // tanca la capçalera
    readfile($file_name);        // push it out, envia tot el contingut
    exit(); // talla connexió, seria el mateix que fer un die
?>
