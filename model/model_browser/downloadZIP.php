<?php 

if(!isset($_SESSION['logueado']) && !$_SESSION['logueado'] ){
    die("Acceso denegado!! necessita una cuenta activa para acceder aqui");
}

if(!isset($_GET['nav']) || $_GET['nav']=="") die("No hay archivos seleccionados para enviar a zip.");

// echo $_GET['nav'];
// echo '<br>';

$file_name= "views\Explorador de archivos\\".$_SESSION['usuario'];

// echo $file_name;
// $zip = new ZipArchive();

// $res = $zip -> open($file_name.".zip", ZipArchive:: CREATE);

// if($res === true){
//     $zip -> addFile($file_name.$_GET['nav'].".zip", $_GET['fichero'].".zip");
//     $zip -> close();
//     echo "ok";

// }else{
//     echo "fail";
// }

$zip = new \ZipArchive();

//abrimos el archivo y lo preparamos para agregarle archivos
$ok = $zip->open($file_name."/".$_GET['fichero'].".zip", \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

echo $ok;

//indicamos cual es la carpeta que se quiere comprimir
$origen = $file_name.$_GET['nav'];
echo $file_name.$_GET['nav'];
echo '<br>';
echo "origen: ". $origen;
echo '<br>';
//Ahora usando funciones de recursividad vamos a explorar todo el directorio y a enlistar todos los archivos contenidos en la carpeta
$files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($origen),
            \RecursiveIteratorIterator::LEAVES_ONLY
);

//Ahora recorremos el arreglo con los nombres los archivos y carpetas y se adjuntan en el zip
foreach ($files as $name => $file)
{
    if (!$file->isDir())
    {
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($origen) + 1);
        echo '<br>';
        echo $relativePath;
        $zip->addFile($filePath, $relativePath);
    }
}

//Se cierra el Zip
$zip->close();







// header('Pragma: public');     // required
// header('Expires: 0');        // no cache, desactiva cache
// header('Cache-Control: must-revalidate, post-check=0, pre-check=0'); //obliga a la recarrega de la pagina obviant tota informació de la cache
// header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($file_name)).' GMT'); // indica que l'arxiu caduca ARA mateix, per evitar el seu cachejat
// header('Cache-Control: private',false); // s'indica que l'arxiu es privat i que no es faci cache en els proxy
// header('Content-Type: application/zip'); // indica que no es tracta d'un html sino d'un arxiu descarregable
// header('Content-Disposition: attachment; filename="'.basename($file_name).'"'); // nom de l'arxiu 
// header('Content-Transfer-Encoding: binary'); // tipus de codificació del contingut
// header('Content-Length: '.filesize($file_name));    // provide file size
// header('Connection: close'); // tanca la capçalera
// readfile($file_name);        // push it out, envia tot el contingut
// exit(); // talla connexió, seria el mateix que fer un die



?>
