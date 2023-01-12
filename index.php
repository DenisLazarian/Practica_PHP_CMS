<?php  
// error_reporting(E_ERROR); // per treure els warnings degut a la inexistencia de les variables de sessions quan no estas logat o es la primera vegada que s'entra a la pagina.
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
        }elseif( $_SESSION["level-role"] < 10){
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
        }elseif( !($_SESSION["level-role"] <=10 && $_SESSION["level-role"] >= 5)  ){
            // echo  $_SESSION["level-role"];
            die("Permiso denegado!!! no dispone de permisos para esta accion.");
        }
        require "controller/ctl_delete.php";
        render_delete_reportage();
}elseif (isset($_GET['action']) && $_GET['action']=="user-update"){
    session_start(); 
    
    if(!($_SESSION["level-role"] == 10 && $_SESSION["logueado"]==true) ){
        die("Permiso denegado!! no dispone de permiso para esta accion.");
    }

    include "model/crudFunctions.php";

    update_user();
}
elseif (isset($_GET['action']) && $_GET['action']=="new-update"){
    session_start();

    if(!($_SESSION["level-role"] <= 10 && $_SESSION["level-role"] >=5 && $_SESSION["logueado"]==true) ){
        die("Permiso denegado!! no dispone de permiso para esta accion.");
    }
    
    
    include "model/crudFunctions.php";
    
    update_reportage();
}



elseif (isset($_GET['action'])&& $_GET['action']=="close") {
    require "controller/ctl_log_out.php";
    destroy_session();
}
elseif (isset($_GET['action'])&& $_GET['action']=="browser"){
    session_start();
    if(!( $_SESSION["logueado"]==true) ){
        die("Acceso denegado!! no dispone de una cuenta activa para acceder aqui. Para iniciar sessión pulse <a href='index.php?action=login'>Aqui</a>.");
    }

    include "views/Explorador_de_archivos/browser.php";


}elseif(isset($_GET['action'])&& $_GET['action']=="create_directory"){
    session_start();

    include "controller/ctl_acciones_browser.php";
    render_crear_carpeta();
}elseif (isset($_GET['action'])&& $_GET['action']=="create_file"){
    session_start();

    include "controller/ctl_acciones_browser.php";
    render_crear_fichero();
}elseif (isset($_GET['action'])&& $_GET['action']=="delete_item"){
    session_start();

    include "controller/ctl_acciones_browser.php";
    render_borrar_archivos();
}
elseif (isset($_GET['action'])&& $_GET['action']=="copy_item") {
    session_start();

    include "controller/ctl_acciones_browser.php";
    render_copiar_arvhivo();
}
elseif (isset($_GET['action'])&& $_GET['action']=="download_file") {
    session_start();

    include "controller/ctl_acciones_browser.php";
    render_descargar_ficheros();
}
elseif (isset($_GET['action'])&& $_GET['action']=="zip") {
    session_start();

    include "controller/ctl_acciones_browser.php";
    render_create_zip();
}
elseif(isset($_GET['action'])&& $_GET['action']=="show-new"){
    session_start();

    include "controller/ctl_main.php";
    render_new_selected($_GET['id']);

    
}
elseif(isset($_GET['action'])&& $_GET['action']=="donwnload-toPDF"){
    include_once "lib/TCPDF-main/tcpdf.php";
    // session_start();

    include "controller/ctl_pdf.php";
    download_pdf($_GET['id']);

    
}

else{

    require "controller/ctl_main.php";
    inicio();

}







