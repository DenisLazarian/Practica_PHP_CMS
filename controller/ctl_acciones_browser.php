
<?php 

defined('MVC_CMS') or die ('Permission denied');


function render_browser_inicio(){

    include "views/Explorador de archivos/browser.php";

}

function render_borrar_archivos(){
    include "model/model_browser/borrarArchivo.php";
}

function render_copiar_arvhivo(){
    include "model/model_browser/copiar.php";
}

function render_crear_fichero(){
    include "model/model_browser/crearFichero.php";
}
function render_crear_carpeta(){
    include  "model/model_browser/crearCarpeta.php";
}   

function render_descargar_ficheros(){
    include  "model/model_browser/download.php";
}

function render_create_zip(){
    include  "model/model_browser/downloadZIP.php";
}






?>
