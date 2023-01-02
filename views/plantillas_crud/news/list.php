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

<h3 class="mb-5">News management</h3>

<a class="btn btn-success" href="index.php?action=new-create"><div class="glyphicon glyphicon-plus-sign"></div>New reportage</a>
<a href="index.php?action=priv-space" class="btn btn-primary"><div class="glyphicon glyphicon-plus-sign"></div>Home</a>
<table class="table mt-5 table-striped table-hover table-light">
    <thead>
        <tr>
            <th>Title</th>
            <th>Publish date</th>
            <th>Desription</th>
            
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

        $sql = "SELECT * from noticias";
        $registers = $connUser -> query($sql);

        if ($registers->num_rows > 0) {
            while($row=$registers -> fetch_assoc()){
        ?>
        

        <tr>
            <td><?php echo $row['titulo'] ?>
            </td>
            <td><?php echo $row['fecha'] ?>
            </td>
            <td><?php echo $row['descripcio'] ?>
            </td>
            
            <td><a href="index.php?action=new-edit&id=<?php echo $row['codin'] ?>" class="modify btn btn-warning">Modify</a>&#32;

            
            <a href="index.php?action=new-delete&id=<?php echo $row['codin'] ?>" class="modify btn btn-danger">Delete</a>

            
                
            </td>
        </tr>

       <?php 
            }
        }
       
       ?>
       

    </tbody>

</table>


</div>












<?php require "views/plantillas/_footer.php" ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>



</body>
</html>