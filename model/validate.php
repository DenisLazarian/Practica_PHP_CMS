
<?php 
require "../config/db.php";
session_start();



$username="";
$password="";

if(isset($_POST["enviar"])){
    // echo "true";
    $username=$_POST["username"];
    $password=$_POST["password"];

    
}else{
    
    header("location: ../index.php?action=login");
} // Para el Denis del futuro: poner modal  -- no tiene permiso de acceso --

if(empty($username) && empty($password) ){
    header("location: ../index.php?action=login");
} // Para el Denis del futuro: poner modal --No pueden estar vacios los campos--


$connUser = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$connUser->set_charset("utf8");


$sqlSelect = "SELECT * from users where nick=?";

// consulta de hackeo ->  consulta = "'; DROP users; -- '"
// echo $sqlSelect;

if ($connUser->connect_error) {
    die("Connection failed: " . $connUser->connect_error);
}


// $registres = $connUser->query($sqlSelect);
$registres = $connUser->prepare($sqlSelect); // ho fem per evitar el SQL Injection
$registres -> bind_param("s", $username);

$ok = $registres ->execute();


if($ok === true){
    
    $registres -> bind_result($userName, $fullName, $passo, $email, $age, $level); 

    

    while( $registres ->fetch()) {  // mentre hi hagi registres a la base de dades
        
        
        if( password_verify($password,$passo)){ // validar si conincideix el hash de la bd amb la contraseña.

            
            // les dades de bases de dades del usuari logats es guarden en variables de sessió
            $_SESSION["logueado"]=true;     
            $_SESSION["usuario"] = $userName;
            $_SESSION['nombre-completo'] =$fullName;
            $_SESSION['email'] =$email;
            $_SESSION['edad'] =$age;
            $_SESSION["level-role"] = $level;
            

            $_SESSION['not-correct-pass']=false;
            $_SESSION['not-equal-error'] = false;
            $registres -> close();
            $connUser -> close();
            header("location: ../index.php?action=priv-space");
        }else{
            
            $registres -> close();
            $connUser -> close();
            header("location: ../index.php?action=login"); 
        }
        

    }
}
    
$registres -> close();
$connUser -> close();
header("location: ../index.php?action=login");

?>


