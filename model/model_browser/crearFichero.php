


<?php 

if(!isset($_SESSION['logueado']) && !$_SESSION['logueado'] ){
    die("Acceso denegado!! necessita una cuenta activa para acceder aqui");
}


$root = $_SESSION["ruta"];

$existe=false;

// $option="";

$nombre_carpeta="";
if(isset($_POST["nuevoFichero"])){
    $nombre_carpeta = $_POST["nuevoFichero"];
}  

$nuevofile=  "views/Explorador de archivos/".$root."\\".$nombre_carpeta;




if(!file_exists($nuevofile)){
    
    fopen($nuevofile, "w");
    // fclose($nuevofile);

}else{
    if(isset($_POST["enviar2"]))
        $existe=true;
}


?>

<html>
<head>
    <title>create Dir</title>	
    <style>
        .name{
            width:250px;
        }
        p{
            color:red;
        }

        .confirm{
            color: green;
        }
        
    </style>
</head>
<body>
    <br>
    <br>
    Posicion actual:<?=$root; ?>

        
        
    <form action="index.php?action=create_file" method="POST">
        <br>
        nombre: <input class="name" type="text" placeholder="Escribe el nombre de tu nuevo archivo" name="nuevoFichero">

        

        <input type="submit" name="enviar2"> 

        <?php 
            if(isset($_POST['nuevoFichero'])&& !$existe){
                echo "<p class='confirm'>Directorio ".$_POST['nuevoFichero']." creado con exito</p>";
            }
            if($existe){
                echo "<p>El fichero que intenta crear, ya existe o no puede tener un nombre vació</p>";
            }
            
        session_abort();

        ?>
    
    </form>





    <?php echo '<a href="index.php?action=browser&nav='.str_replace($_SESSION['usuario'], "", $root).'"><button>Volver al explorador</button></a>';  ?> 


    
    
</body>
</html>


