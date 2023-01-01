<?php 

// defined("MVC_CMS") or die('Permission denied');

// function setUserInBD(){
require "../config/db.php";


    $username="";
    $pass ="";
    $name="";
    $mail="";
    $age="";

    
    
    if(isset($_POST['register'])){ // només fincione per l'usuari que es vol registrar
    
        $name=$_POST['firstName'];
        $lastName = $_POST['lastName'];
        $username=$_POST['nickname'];
        $mail=$_POST['email'];
        $age=$_POST['age'];
        $pass =$_POST['pass'];
        $confirmPass = $_POST['confirmPass'];


        if(empty($username) && empty($pass) ){
            header("location: ../index.php?action=register");
        }
    
        $conexion = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME); 
    
    
        $stmt = $conexion -> prepare("INSERT INTO users (nick, nomcognom, contraseña, mail, edat) VALUES (?,?,?,?,?)"); // inserta registres a bases de dades
        $stmt ->bind_param("ssssi", $user,$fullName, $contraseña, $mail, $edad);
        
        $user = $username;
        $contraseña = password_hash($confirmPass, PASSWORD_DEFAULT);
        $fullName=$name. " ".$lastName;
        $edad=$age;
        $stmt -> execute();
    
        
        
        $stmt -> close();
        $conexion ->close();

        header("location: ../index.php");
    
        
    }else{
        
        header("location: ../index.php?action=register");
    }




?>
