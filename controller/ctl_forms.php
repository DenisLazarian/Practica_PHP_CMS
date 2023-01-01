<?php 

defined("MVC_CMS") or die('Permission denied');


function render_login_form(){
    include "views/forms/loginPage.php";
}

function render_register_form(){
    include "views/forms/registerPage.php";
}

function render_change_pass_form(){
    include "views/forms/changePassPage.php";
}


function user_update_form(){
    include "views/plantillas_crud/users/edit.php";
}

function user_create_form(){
    include "views/plantillas_crud/users/create.php";
}




?>
