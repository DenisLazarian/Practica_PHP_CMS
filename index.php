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
    // session_start();

        require "controller/ctl_main.php";
        listarUsuarios();
    
        // die("Permiso denegado!! no dispone de permiso para esta accion.");
    
}elseif (isset($_GET['action']) && $_GET['action']=="user-edit"){
        require "controller/ctl_forms.php";
        user_update_form();

}elseif (isset($_GET['action']) && $_GET['action']=="user-delete"){
        session_start(); 
        if(!isset($_SESSION["logueado"]) || $_SESSION["logueado"]==false ){
            die("Permiso denegado!!! Debe iniciar session para acceder aqui.");
        }elseif( $_SESSION["level-role"] ==10){
            die("Permiso denegado!!! no dispone de permisos para esta accion.");
        }
        require "controller/ctl_delete.php";
        render_delete_user();

}
elseif (isset($_GET['action']) && $_GET['action']=="user-create"){
    require "controller/ctl_forms.php";
    user_create_form();
    
}elseif(isset($_GET['action']) && $_GET['action']=="news-list"){
    require "controller/ctl_main.php";
    listarNoticias();
}
elseif(isset($_GET['action']) && $_GET['action']=="new-edit"){
    require "controller/ctl_forms.php";
    news_update_form();
}
elseif(isset($_GET['action']) && $_GET['action']=="new-create"){
    require "controller/ctl_forms.php";
    news_create_form();
}
elseif (isset($_GET['action']) && $_GET['action']=="new-delete") {
    session_start(); 
        if(!isset($_SESSION["logueado"]) || $_SESSION["logueado"]==false ){
            die("Permiso denegado!!! Debe iniciar session para acceder aqui.");
        }elseif( !($_SESSION["level-role"] ==10 || $_SESSION["level-role"] >= 5)  ){
            // echo  $_SESSION["level-role"];
            die("Permiso denegado!!! no dispone de permisos para esta accion.");
        }
        require "controller/ctl_delete.php";
        render_delete_reportage();
}



elseif (isset($_GET['action'])&& $_GET['action']=="close") {
    require "controller/ctl_log_out.php";
    destroy_session();
}

else{

    require "controller/ctl_main.php";
    inicio();

}







