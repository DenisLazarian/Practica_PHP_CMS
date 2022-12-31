<?php 


// Funció que modifica les dades de l'usuari seleccionat per la funció "selected_user()".
function update_user(){
    include "../../../config/db.php";

    $connect = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    $stmt = $connect -> prepare("UPDATE users SET nomcognom = ?, contraseña = ?, mail = ?, edat = ?, nivell = ? where nick = '".$_GET['id']."'"); // inserta registres a bases de dades
    $stmt ->bind_param(
        "sssii", 
        $_POST['new-full-name'], 
        password_hash($_POST['password'], PASSWORD_DEFAULT), 
        $_POST['new-mail'], 
        $_POST['new-age'], 
        $_POST['level-role']
    );
    
    
    $stmt -> execute();

    $stmt -> close();
    $connect ->close();

    header("location: ../../../index.php?action=user-list");

}



// Funció que selecciona l'usuari a modificar
function selected_user(){
    include "config/db.php";
    if(!isset($_SESSION['logueado'])&& $_SESSION['level-role']<10){
        die("Acceso denegado, no dispone de permisos para acceder aqui");
    }

    $id = $_GET['id'];
    extract($_GET);
    $connexion = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    $connexion->set_charset("utf8");

    // Crear la consulta preparada
    $select = "SELECT * from users where nick = ?";
    $stmt = $connexion->prepare($select);

    // Vincular variables de PHP a los parámetros de la consulta

    $stmt->bind_param("s", $id);

    // Ejecutar la consulta
    $stmt->execute();

    // Procesar el resultado
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // output data of each row
        $user = $result->fetch_assoc();
    } else {
        header("location: index.php?action=user-list");
    }

    // Cerrar la declaración y la conexión a la base de datos
    $stmt->close();
    $connexion->close();

    return $user;
}



function deleteUser(){
    session_start();
    include "config/db.php";

    if(!isset($_SESSION['logueado'])&& $_SESSION['level-role']<10){
        die("Acceso denegado, no dispone de permisos para acceder aqui");
    }



    $conexion = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    $delete = "DELETE from users where nick = ?";

    $stmt = $conexion -> prepare($delete);
    $stmt -> bind_param("s", $_GET['id']);

    $stmt -> execute();

    $stmt -> close();
    $conexion -> close();

    header("location: index.php?action=user-list");

    
}




?>
