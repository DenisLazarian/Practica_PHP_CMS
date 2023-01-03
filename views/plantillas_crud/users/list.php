<?php 
defined("MVC_CMS") or die('Permission denied');

// defined("PRIV_PAGE") or die('Permission denied!! no pasa por list-area');
session_start(); 

if(!($_SESSION["level-role"] == 10 && isset($_SESSION["logueado"]) && $_SESSION["logueado"]==true) ){
    die("Permiso denegado!! no dispone de permiso para esta accion.");
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

</head>
<body>


<?php include 'views/plantillas/_privNavBar.php'; ?>



<div class="m-5 p-3 pt-0">

    <h3 class="mb-5">Users management</h3>

    <a class="btn btn-success" href="index.php?action=user-create"><div class="glyphicon glyphicon-plus-sign"></div>New user</a>
    <a href="index.php?action=priv-space" class="btn btn-primary"><div class="glyphicon glyphicon-plus-sign"></div>Home</a>
    <table class="table mt-5 table-striped table-hover table-light">
        <thead>
            <tr>
                <th>Nickname</th>
                <th>Full name</th>
                <th>Mail</th>
                <th>Age</th>
                <th>Level</th>
                <th></th>
            </tr>

        </thead>
        <tbody>
            <?php 
            
            include("config/db.php");

            $connUser = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

            if ($connUser->connect_error) {
                die("Connection failed: " . $connUser->connect_error);
            }

            $sql = "Select * from users";
            $registers = $connUser -> query($sql);
            
            $paginas_x_article = 4;
            // $$registers  -> close();
            
            
            // $totalRegisters = $registers -> rowCount();
            $cont =0;
            $registers -> close();

            $sqlLimit = 'SELECT * from users limit 1,3';

            $sentencia = $connUser -> prepare($sqlLimit);
            // $sentencia -> bind_param('i', )
            $sentencia -> execute();

            if ($sentencia->num_rows > 0) {
                while($row=$sentencia -> fetch_assoc()){
            ?>
            

            <tr>
                <td><?php echo $row['nick'] ?>
                </td>
                <td><?php echo $row['nomcognom'] ?>
                </td>
                <td><?php echo $row['mail'] ?>
                </td>
                <td><?php echo $row['edat'] ?>
                </td>
                <td><?php echo $row['nivell'] ?>
                </td>
                <td><a href="index.php?action=user-edit&id=<?php echo $row['nick'] ?>" class="modify btn btn-warning">Modify</a>&#32;

                <?php if($row['nick'] != $_SESSION["usuario"]){ ?>
                
                <a href="index.php?action=user-delete&id=<?php echo $row['nick'] ?>" class="modify btn btn-danger">Delete</a>

                <?php 

                } ?>
                    
                </td>
            </tr>

        <?php 
                $cont++;
                }
            }
            echo $cont++;
            $paginasTotales = ceil($cont/$paginas_x_article);
        //    echo $paginasTotales;
        ?>
        

        </tbody>

    </table>

    <?php 
    if( !isset($_GET['pagina']) || $_GET['pagina']<1 )
    $_GET['pagina'] = 1;
    if($_GET['pagina']>$paginasTotales)
    $_GET['pagina'] = $paginasTotales;
    ?>

    <nav aria-label="Page navigation example">
    <ul class="pagination pagination-md justify-content-center">
        <li class="page-item <?=$_GET['pagina']<=1 ? 'disabled': ''; ?>"><a class="page-link" href="index.php?action=user-list&pagina=<?=$_GET['pagina']-1; ?>" >Previous</a></li>

        <?php 
        for ($i=0; $i < $paginasTotales; $i++) { 
        ?>
        
        <li class="page-item <?=$_GET['pagina']==$i+1 ? 'active': '';?> "><a class="page-link   " href="index.php?action=user-list&pagina=<?=$i+1; ?>"><?=$i+1; ?></a></li>

    <?php } ?>
    

        <li class="page-item <?=$_GET['pagina']>=$paginasTotales ? 'disabled': ''; ?>"><a class="page-link " href="index.php?action=user-list&pagina=<?=$_GET['pagina']+1; ?>">Next</a></li>
    </ul>
    </nav>

    <?php  ?>


</div>












<?php require "views/plantillas/_footer.php" ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>



</body>
</html>