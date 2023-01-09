<?php 

if(!isset($_SESSION['logueado']) && !$_SESSION['logueado'] ){
    die("Acceso denegado!! necessita una cuenta activa para acceder aqui");
}

if(!isset($_GET['nav']) || $_GET['nav']=="") die("No hay archivos seleccionados para enviar a zip.");

// echo $_GET['nav'];
// echo '<br>';

$file_name= "views\\Explorador_de_archivos\\".$_SESSION['usuario'];



if(!file_exists($file_name."/uploads")){
    mkdir($file_name."/uploads", 0777);
}

$zip = new ZipArchive();

//abrimos el archivo y lo preparamos para agregarle archivos
$ok = $zip->open($file_name."\uploads\\".$_GET['fichero'].".zip", ZipArchive::CREATE | ZipArchive::OVERWRITE);



//indicamos cual es la carpeta que se quiere comprimir
$origen = realpath($file_name.$_GET['nav']);

//Ahora usando funciones de recursividad vamos a explorar todo el directorio y a enlistar todos los archivos contenidos en la carpeta
if(is_dir($origen)){

$files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($origen),
            RecursiveIteratorIterator::LEAVES_ONLY
);

//Ahora recorremos el arreglo con los nombres los archivos y carpetas y se adjuntan en el zip
foreach ($files as $name => $file)
{
    
    if (!$file->isDir())
    {
        
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($origen) + 1);
        $zip->addFile($filePath, $relativePath);
    }
    elseif ($file->isDir()){
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($origen) + 1);
        // Añade la carpeta al archivo zip
        $zip->addEmptyDir($relativePath);
    }
}


}elseif(is_file($origen)){
    $zip->addFile($origen, basename($origen));
}
//Se cierra el Zip
$zip -> close();

header("location: index.php?action=browser&nav=\\uploads");  // despres de decarregar el zip, arribar al lloc de forma automatica per descarregar el zip.



?>
