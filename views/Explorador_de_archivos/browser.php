<?php 

// ../../../../../windows

    if(!isset($_SESSION['logueado']) && !$_SESSION['logueado'] ){
        die("Acceso denegado!! necessita una cuenta activa para acceder aqui");
    }


    // "views/Explorador_de_archivos/Almacen/    <- Referencia" 


    $root = realpath("views/Explorador_de_archivos/".$_SESSION['usuario']."/");

    if(!file_exists("views/Explorador_de_archivos/".$_SESSION['usuario']."/")){
        mkdir("views/Explorador_de_archivos/".$_SESSION['usuario']."/");
    }
    // $zona_restringida = realpath("../../../htdocs");
    $dir_actual = $root;




    if(isset($_GET["nav"])){
        // echo "algo pasa 1";
        $dir_actual = realpath($dir_actual. "/". $_GET["nav"]."/");
    
        

        if( stripos($dir_actual, $root ) === FALSE)
            $dir_actual = $root;
          
    }   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        /* body{
            background-color:#1d2a35;
            color: #fff;
            
        }
         */
         /* img{
            height:25px;
         } */

         /* td, th{
            width: 540px;
            height: 50px
         } */
    </style>
</head>
<body>
    
        <?php 

include("views/plantillas/_privNavBar.php");

    $root_user = str_replace($root, "", $dir_actual);
    // echo "---". $root_user;
?>
<div class="m-5 p-3 pt-0">
        
    <h3>Explorador_de_archivos</h3>
    
<br>
        <h4>posicion actual: <?= $_SESSION['usuario'].$root_user; ?></h4>
        <br>
    <table class="table table-striped">
        <tr>
            <th>Nombre</th>
            <th>Tipo de archivo</th>
            <th> -</th>
            
        </tr>
        
        <?php 
            
            if (is_dir($dir_actual)){
                if ($dh = opendir($dir_actual)){
                    while (($file = readdir($dh)) !== false){

                        if($file != "."){
                            $fullpath = ($dir_actual."\\".$file);
                        ?>     
                            <tr>
                                
                            <?php 
                            
                            if(is_dir($fullpath)){
                                
                            ?>
                                
                                <td>
                                    <?php


                                if($file === ".."){
                                    print  "<a href='index.php?action=browser&nav=".$root_user."\\".$file."'>";
                                    echo '<img style="height:25px" src="views/Explorador_de_archivos/imagenes/arrow-left-solid.svg"/>';
                                    print '</a></td>';
                                }else{
                                    echo '<img style="height:25px" src="views/Explorador_de_archivos/imagenes/folder.png"/>';
                                }
                                ?>
                                
                                
                                <?php if($file !==".."){ ?>
                                    <a href="index.php?action=browser&nav=<?=$root_user."\\".$file;?>"> <?=$file; ?> </a>
                                
                                </td>
                                
                                <td><?="Carpeta"; ?></td>
                                <?php }else { echo "<td></td>";} ?>
                                <td>
                                    <?php 
                                    
                                    if($file === ".."){
                                        // echo "algo pasa";
                                        $_SESSION['ruta']= $_SESSION['usuario'].$root_user; // Variable session per pasar la ruta com a parametre a formularis POST


                                        echo "<a class='btn btn-success mx-4' href='index.php?action=create_directory'> <img style='height:25px' src='views/Explorador_de_archivos/imagenes/crear.svg'/></a>";
                                        echo "<a class='btn btn-primary' href='index.php?action=create_file'><img style='height:25px' src='views/Explorador_de_archivos/imagenes/crear_file.png'/></a>";
                                        

                                        // if(isset)
                                        
                                    }else{
                                        $_SESSION['ruta']= $_SESSION['usuario'].$root_user; // Variable session per pasar la ruta com a parametre a formularis POST

                                        print "<a class='btn btn-danger mx-4' href='index.php?action=delete_item&nav=".$root_user."\\".$file."&root=".$root_user."&arch=carpeta'><img style='height:25px' src='views/Explorador_de_archivos/imagenes/fdelete.png'/></a>";
                                        print "<a class='btn btn-warning' href='index.php?action=copy_item&nav=".$root_user."\\".$file."&root=".$root_user."&arch=carpeta&fichero=".$file."'><img style='height:25px' src='views/Explorador_de_archivos/imagenes/editar.svg'/></a>";
                                        print "<a class='btn btn-secondary mx-4' href='index.php?action=zip&nav=".$root_user."\\".$file."&root=".$root_user."&arch=carpeta&fichero=".$file."'><img style='height:25px' src='views/Explorador_de_archivos/imagenes/file-zipper-solid.svg'/></a>";
                                        

                                    }

                                    ?>
                                    
                                </td>
                                
                                
                            <?php 
                            
                            }else{

                                $extension = pathinfo($file, PATHINFO_EXTENSION);
                                
                                

                                // $_SESSION['ruta']= "Almacen".$root_user; // Variable session per pasar la ruta com a parametre a formularis POST

                                if($extension =="png" || $extension =="jpg" )
                                echo '<td><img style="height:25px" src="views/Explorador_de_archivos/imagenes/file-img.jpg"/><a href="index.php?action=download_file&nav='.$root_user.'\\'.$file.' ">'.$file.'</a></td>';
                                // elseif($extension['extension'] ===null)
                                // echo '<td><img src="views/Explorador_de_archivos/imagenes/file-text.png"/><a href="download.php?nav='.$root_user.'\\'.$file.' "> '.$file.'</a></td>';
                                elseif($extension =="zip" || $extension =="rar")
                                echo '<td><img style="height:25px" src="views/Explorador_de_archivos/imagenes/file-zipper-regular.svg"/>&#32;<a href="index.php?action=download_file&nav='.$root_user.'\\'.$file.' ">'.$file.'</a></td>';

                                else
                                echo '<td><img style="height:25px" src="views/Explorador_de_archivos/imagenes/file-text.png"/><a href="index.php?action=download_file&nav='.$root_user.'\\'.$file.' "> '.$file.'</a></td>';
                                // echo '<td><a href="download.php"> '.$file.'  </a></td>';
                                print "<td>Archivo</td>\n";
                                print "<td><a class='btn btn-danger mx-4' href='index.php?action=delete_item&nav=".$root_user."\\".$file."&root=".$root_user."&arch=fichero'><img style='height:25px' src='views/Explorador_de_archivos/imagenes/fdelete.png'/></a>".
                                "<a class='btn btn-warning' href='index.php?action=copy_item&nav=".$root_user."\\".$file."&root=".$root_user."&arch=fichero&fichero=".$file."'><img style='height:25px' src='views/Explorador_de_archivos/imagenes/editar.svg'/></a>"."<a class='btn btn-secondary mx-4' href='index.php?action=zip&nav=".$root_user."\\".$file."&root=".$root_user."&arch=fichero&fichero=".$file."'><img style='height:25px' src='views/Explorador_de_archivos/imagenes/file-zipper-solid.svg'/> </td>";

                            }   
                            ?>
                            


                            


                            
                            </tr>
                            

                            <?php
                        
                        }   
                    
                    }
                closedir($dh);
                }
            }

            

            
    
        ?>
    </table>

</div>

            
    
    
    <!-- <?php 

            // $base_folder = realpath("dades/");
            // $dir=$base_folder;

            // if(isset($_GET["folder"])){
            //     $dir = realpath($dir ."/". $_GET["folder"]. "/");

            //     if(stripos($dir, $base_folder)===FALSE)
            //         $dir = $base_folder;
            // }

        // forma facil de listar archivo
            // $a = scandir($dir)

            // $root_user = str_replace($base_folder, "", $dir);


            // foreach ($a as $file){
            //     $fullpath = $dir. "/". $file;
            //     if($file == "."){
            //         echo "titulo";
            //     }elseif(is_dir($fullpath)){
            //         <a href='index.php?folder= $root_user. \\. $file .'>
            //     }else{

            //     }
            // }
    ?> -->
    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>



<?php include("views/plantillas/_footer.php"); ?>


    
</body>
</html>
