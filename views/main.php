<?php 
defined("MVC_CMS") or die('Permission denied');
session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<body class="">

<?php require "plantillas/_navBar.php" ?>

<main class="m-5">
        
    
        <div class="p-2  pt-0 pr-0 pl-0 container">
            <h1 class="mb-5">News letter</h1>


            <?php 
                    foreach($news as $row)
                    {
                        ?>

            <div class="row mt-5">
                <div class="col-lg-12">
                    <div>

                        <h2 class="mt-2">
                           <?=$row['titulo']; ?>
                        </h2>
                        <!-- <h4>
                            Se hara un acuerdo con la empresa X para la anexion entre Lazarian S.L con X
                        </h4> -->
                        <p class="text-justify">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam possimus soluta autem sint nesciunt fuga adipisci facilis, assumenda aliquam. Ab hic vero omnis provident illum repellendus tempora! Delectus, iusto ipsa.
                            Quia ex voluptatem pariatur commodi, atque est aperiam dolor placeat suscipit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa vitae inventore excepturi quia libero ad dolorem explicabo ducimus laboriosam cumque amet sit impedit quo vero itaque consequuntur eligendi, enim magni?
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque voluptate cumque rerum, adipisci repellendus commodi ad pariatur deserunt quidem. Quaerat vitae sunt aut quod quidem quam totam maiores iusto perferendis.
                            
                           
                        </p>

                        <a href="index.php?action=show-new&id=<?=$row['codin'];?>" class="btn btn-warning mb-2">Read more</a>

                    </div>

                </div>


            </div>

            <?php 
            } 
            ?>


        </div>

</main>

<?php require "plantillas/_footer.php" ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>