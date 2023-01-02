<?php 

function render_delete_user(){
    require "model/crudFunctions.php";
    deleteUser();
}
function render_delete_reportage(){
    require "model/crudFunctions.php";
    deleteReportage();
}

?>
