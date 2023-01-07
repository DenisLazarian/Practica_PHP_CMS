


<?php 

if(!isset($_SESSION['logueado']) && !$_SESSION['logueado'] ){
    die("Acceso denegado!! necessita una cuenta activa para acceder aqui");
}

    $root = $_SESSION["ruta"];
    
    echo $root;
    echo '<br>';


    $existe=false;

    $option="";

    // echo "<div>".$_POST["nuevoDir"];

    $nombre_carpeta="";
    if(isset($_POST["nuevoDir"])){
        $nombre_carpeta = $_POST["nuevoDir"];
    }  
    
    $nuevoDir= "views/Explorador de archivos/".$root."\\".$nombre_carpeta;

    // echo $nuevoDir;


    if(!file_exists($nuevoDir))
        mkdir($nuevoDir);
    else{
        if(isset($_POST["enviar"]))
            $existe=true;
    }
    // echo "<br>carpeta creada";




    // echo var_dump(isset($_GET["method"]));

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
                color: green
            }
            
        </style>
    </head>
    <body>
        <br>
        <br>
        Posicion actual:<?=$root; ?>

            <?php 
        // if($option==="carpeta"){
            
            
            ?>
            
        <form action="index.php?action=create_directory" method="POST">
            <br>
            nombre: <input class="name" type="text" placeholder="Escribe el nombre de tu nuevo directorio" name="nuevoDir">

            

            <input type="submit" name="enviar"> 
            <br>
            <br>
            <!-- <input type="button" name="volver" value="Volver">  -->

            <?php 
                if(isset($_POST['enviar'])&& !$existe){
                    echo "<p class='confirm'>Directorio ".$_POST['nuevoDir']." creado con exito</p>";
                }
                if($existe){
                    echo "<p >El directorio que intenta crear, ya existe o no puede tener un nombre vació.</p>";
                } 
                $i=0;
                while($i!==0){
                    header("location: index.php?action=create_directory");
                    $i++;
                }
            ?>
        
        </form>


        <?php echo '<a href="index.php?action=browser&nav='.str_replace($_SESSION['usuario'], "", $root).'"><button>Volver al explorador</button></a>';  ?> 
        

       

        
        
        <!-- <?php echo str_replace("Almacen", " ", $root); ?> --> 
        
    </body>
</html>


