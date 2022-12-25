<?php 

defined("MVC_CMS") or die('Permission denied');


function render_login_form(){
    include "views/forms/loginPage.php";
}

function render_register_form(){
    include "views/forms/registerPage.php";
}


?>
