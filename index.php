<?php  

define("MVC_CMS", "app");

if(isset($_GET['action']) && $_GET['action']=="login"){
    require "";
}else{
    require "controller/ctl_main.php";
    inicio();
}







