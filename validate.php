
<?php 
session_start();

$username="";
$password="";

if(isset($_POST["enviar"])){
    // echo "true";
    $username=$_POST["username"];
    $password=$_POST["password"];

    
}else{
    
    header("location: loginPage.php");
}

if(empty($username) && empty($password) ){
    header("location: loginPage.php");
}


$connUser = new mysqli("localhost","root", "", "cms_bd");
$connUser->set_charset("utf8");


$sqlSelect = "SELECT nick, contraseña from users where nick=?";

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
    
    $registres -> bind_result($userName, $passo); 

    

    while( $registres ->fetch()) {  // mentre hi hagi registres a la base de dades
        
        echo $name;
        if( password_verify($password,$passo)){ // validar si conincideix el hash de la bd amb la contraseña.

            echo "validacion hash";

            $_SESSION["logueado"]=true;
            $_SESSION["nombre"] = $userName;
            // echo "name: " . $userName. " - Pass: " . $passo. "<br>";
            $registres -> close();
            $connUser -> close();
            header("location: espacioPersonal.php");
        }else{
            
            $registres -> close();
            $connUser -> close();
            header("location: loginPage.php"); 
        }
        

    }


}
    
$registres -> close();
$connUser -> close();
header("location:loginPage.php");


?>


