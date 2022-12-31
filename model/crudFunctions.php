<?php 


function update_user(){
    include "config/db.php";

    $conexion = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    $stmt = $conexion -> prepare("UPDATE users SET nomcognom = ?, contraseña = ?, mail = ?, edat = ?, nivell = ?"); // inserta registres a bases de dades
    $stmt ->bind_param("sssii", $_POST['new-full-name'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['new-mail'], $_POST['new-age'], $_POST['level-role']);
    
    // $user = $username;
    // $contraseña = password_hash($confirmPass, PASSWORD_DEFAULT);
    // $fullName=$name. " ".$lastName;
    // $edad=$age;
    $stmt -> execute();

    $stmt -> close();
    $conexion ->close();

    header("location: index.php?action=user-list");

}




?>
