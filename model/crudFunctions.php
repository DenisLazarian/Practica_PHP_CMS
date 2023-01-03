<?php 

// Funció que modifica les dades de l'usuari seleccionat per la funció "selected_user()".
function update_user(){
    include "../../../config/db.php";

    $connect = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    $stmt = $connect -> prepare("UPDATE users SET nomcognom = ?, contraseña = ?, mail = ?, edat = ?, nivell = ? where nick = ?"); // inserta registres a bases de dades
    $stmt ->bind_param(
        "sssiis", 
        $_POST['new-full-name'], 
        password_hash($_POST['password'], PASSWORD_DEFAULT), 
        $_POST['new-mail'], 
        $_POST['new-age'], 
        $_POST['level-role'],
        $_GET['id']
    );
    
    
    $stmt -> execute();

    $stmt -> close();
    $connect ->close();

    header("location: ../../../index.php?action=user-list");

}

function update_reportage(){
    include "../../../config/db.php";

    $connect = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    $stmt = $connect -> prepare("UPDATE noticias SET titulo = ?, fecha = ?, descripcio = ?  where codin =?"); // inserta registres a bases de dades
    $stmt ->bind_param(
        "sssi", 
        $_POST['new-title'], 
        $_POST['new-date'], 
        $_POST['new-description'], 
        $_GET['id']
    );
    
    
    $stmt -> execute();

    $stmt -> close();
    $connect ->close();

    header("location: ../../../index.php?action=news-list");

}



// Funció que selecciona l'usuari a modificar
function selected_user(){
    include "config/db.php";
    if(!isset($_SESSION['logueado'])&& $_SESSION['level-role']<10){
        die("Acceso denegado, no dispone de permisos para acceder aqui");
    }

    $id = $_GET['id'];
    // extract($_GET);
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
function selected_reportage(){
    include "config/db.php";
    if(!isset($_SESSION['logueado'])&& $_SESSION['level-role']<10){
        die("Acceso denegado, no dispone de permisos para acceder aqui");
    }

    $id = $_GET['id'];
    // extract($_GET);
    $connexion = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    $connexion->set_charset("utf8");

    // Crear la consulta preparada
    $select = "SELECT * from noticias where codin = ?";
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
        header("location: index.php?action=news-list");
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
function deleteReportage(){
    session_start();
    include "config/db.php";

    if(!isset($_SESSION['logueado'])&& $_SESSION['level-role']<10){
        die("Acceso denegado, no dispone de permisos para acceder aqui");
    }



    $conexion = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    $delete = "DELETE from noticias where codin = ?";

    $stmt = $conexion -> prepare($delete);
    $stmt -> bind_param("s", $_GET['id']);

    $stmt -> execute();

    $stmt -> close();
    $conexion -> close();

    header("location: index.php?action=news-list");

    
}


function insertUserByAdminAction(){
    require "config/db.php";

    if(isset($_POST['crear'])){ // només fincione per l'usuari que es vol registrar
    


        if(empty($_POST['new-password']) ){
            header("location: index.php?action=user-create");
        }
    
        $conexion = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME); 
    
    
        $stmt = $conexion -> prepare("INSERT INTO users (nick, nomcognom, contraseña, mail, edat, nivell) VALUES (?,?,?,?,?,?)"); // inserta registres a bases de dades
        $stmt ->bind_param("ssssii",
            $_POST['new-nick-name'],
            $_POST['new-full-name'],
            password_hash($_POST['new-password'], PASSWORD_DEFAULT),
            $_POST['new-mail'],
            $_POST['new-age'],
            $_POST['new-level-role']
        );
        
        
        $stmt -> execute();
    
        $stmt -> close();
        $conexion ->close();

        header("location: index.php?action=user-list");
    
        
    }
}



function insertNewByAdminOrReporterAction(){
    require "config/db.php";

    if(isset($_POST['crear-new'])){ // només fincione per l'usuari que es vol registrar
    

        $conexion = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME); 
        
        // echo $_POST['new-date'];
    
        $stmt = $conexion -> prepare("INSERT INTO noticias ( titulo, fecha, descripcio) VALUES (?,?,?)"); // inserta registres a bases de dades
        $stmt ->bind_param("sss",
            $_POST['new-title'],
            $_POST['new-date'],
            $_POST['new-description']
        );
        
        
        $stmt -> execute();
    
        $stmt -> close();
        $conexion ->close();

        header("location: index.php?action=news-list");
    
        
    }
}



function selectListReportages(){

    require "config/db.php";

    $newsSelect = "SELECT * from noticias";

    $conexion = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);  

    if ($conexion->connect_error) {
        die("Connection failed: " . $conexion->connect_error);
    }

    $stmt = $conexion -> query($newsSelect);

    if ($stmt->num_rows > 0) {
        // $res = $stmt->fetch_assoc();
        $res = $stmt->fetch_all(MYSQLI_ASSOC);
    } else {
        $res = null;
    }
    $conexion->close();
    return $res;
}




?>
