<?php 


function destroy_session(){
    session_start();   
    // Aqui simplement borren les assignacions de le variables de sessió, sense haber de destruir-la.
    $_SESSION["logueado"] = false;     
    $_SESSION["usuario"] = null;
    $_SESSION['nombre-completo'] =null;
    $_SESSION['email'] =null;
    $_SESSION['edad'] =null;
    $_SESSION["level-role"] = null;
    // session_abort();
    header("location: index.php");

    
}

?>
