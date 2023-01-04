<?php 

defined('MVC_CMS') or die ('Permission denied');

function inicio(){
    include 'model/crudFunctions.php';
    $news = selectListReportages();
    include 'views/main.php';
}

function privado(){

    include 'model/crudFunctions.php';
    $news = selectListReportages();
    include 'views/privSpace.php';
}

function listarUsuarios(){
    include 'views/plantillas_crud/users/list.php';
    
}
function listarNoticias(){
    include 'views/plantillas_crud/news/list.php';
}
?>
