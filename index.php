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





}elseif (isset($_GET['action']) && $_GET['action']=="change-pass") {
    
    require "controller/ctl_forms.php";
    render_change_pass_form();
}elseif (isset($_GET['action']) && $_GET['action']=="priv-space") {
    require "controller/ctl_main.php";
    privado();
}elseif (isset($_GET['action']) && $_GET['action']=="user-list") {
    require "controller/ctl_main.php";
    listarUsuarios();
}elseif (isset($_GET['action']) && $_GET['action']=="user-edit"){
    require "controller/ctl_forms.php";
    user_update_form();



}elseif (isset($_GET['action']) && $_GET['action']=="user-delete"){
    require "controller/ctl_delete.php";
    render_delete_user();
    
}




elseif (isset($_GET['action'])&& $_GET['action']=="close") {
    require "controller/ctl_log_out.php";
    destroy_session();
}

else{

    require "controller/ctl_main.php";
    inicio();

}







