<?php  

define("MVC_CMS", "app");

if(isset($_GET['action']) && $_GET['action']=="login"){
    require "controller/ctl_forms.php";
    render_login_form();

}elseif(isset($_GET['action']) && $_GET['action']=="register") {

    require "controller/ctl_forms.php";
    render_register_form();

    // include "model/setUser.php";
    // setUserInBD();

    



}else{
    require "controller/ctl_main.php";
    inicio();
}







