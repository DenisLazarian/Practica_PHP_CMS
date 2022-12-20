<?php 

$username="";
$pass ="";
$name="";
$mail="";
$age="";


if(empty($username) && empty($pass) ){
    header("location: registerPage.php");
}

if(isset($_POST['registro'])){

    $username=$_POST['username'];
    $pass =$_POST['pass'];
    $name=$_POST['name'];
    $mail=$_POST['email'];
    $age=$_POST['age'];

    $conexion = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME); 


    $stmt = $conexion -> prepare("INSERT INTO users (nick, nomcognom, contraseña, mail, edat) VALUES (?,?,?,?,?)"); // inserta registres a bases de dades
    $stmt ->bind_param("ssssi", $user,$fullName, $contraseña, $mail, $edad);

    $user = $username;
    $contraseña = password_hash($pass, PASSWORD_DEFAULT);
    $fullName=$name;
    $edad=$age;

    $stmt -> execute();

        
    $stmt -> close();
    $conexion ->close();


}else{
    header("location: registerPage.php");
}






// echo "username: ". $username. " - pass: ". $pass; 


?>
