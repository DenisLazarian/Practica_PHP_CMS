<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>

<?php 

if(!$register['codin'])
    // die("noticia no disponible");
    // if()
    header("location: index.php?action=priv-space");
?>


<?php include "_privNavBar.php";?>



<main class="m-5">

    <div class="p-2  pt-0 pr-0 pl-0 container">
        <div class="row">
            <h1 class="mb-4 col-sm-10"><?=$register['titulo']; ?></h1>
            
        </div>
        
        <h3 class="mb-2"><?=$register['descripcio']; ?></h3>

        <span class="mb-5 "><?=$register['autor']; ?> | Publicado el <?=$register['fecha']; ?></span>
        <div></div>

        <p class="mt-5"><?=$register['article']; ?></p>
        <br>

        <a href="index.php?action=donwnload-toPDF&id=<?=$register['codin']; ?>" class="btn btn-danger">Descargar PDF</a>
    </div>



</main>








<?php include "_footer.php";?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>