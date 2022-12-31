<?php 

defined('MVC_CMS') or die ('Permission denied');

function inicio(){
    include 'views/main.php';
}

function privado(){
    include 'views/privSpace.php';
}

function listarUsuarios(){
    include 'views/plantillas_crud/users/list.php';
}
?>
