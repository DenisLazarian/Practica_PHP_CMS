
<?php 
session_start();

require "../config/db.php";


// print $_POST['oldPass'];
// print $_POST['newPass'];
// print $_POST['confirmNewPass'];


if(isset($_POST['enviar'])){

    $_SESSION['not-correct-pass']=false;
    $_SESSION['not-equal-error']=false;

    if($_POST['newPass']!=$_POST['confirmNewPass']){
        $_SESSION['not-equal-error'] = true;
        header("location: ../index.php?action=change-pass");
    }else{
        $_SESSION['not-equal-error'] = false;

        $connUser = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $connUser->set_charset("utf8");
        
        
        $sqlSelect = "SELECT contraseña from users where nick=?";
        
        $sqlUpdate = "UPDATE users SET contraseña=? WHERE nick=?";
        
        
        if ($connUser->connect_error) {
            die("Connection failed: " . $connUser->connect_error);
        }
        
        
        
        $registres = $connUser->prepare($sqlSelect); // ho fem per evitar el SQL Injection
        $registres -> bind_param("s", $_SESSION['usuario']); // fem el select per obtenir el registre amb les dades de l'usuari logat.

        
        $ok = $registres ->execute();
        
        
        if($ok === true){
            
            $registres -> bind_result($passo); 
        
            
        
            while( $registres ->fetch()) {  // mentre hi hagi registres a la base de dades
                
                
                if( password_verify($_POST['oldPass'],$passo)){ // validar si conincideix el hash de la bd amb la contraseña pasada, en cas afirmatiu fem el UPDATE.
                    $registres -> close();

                    $regUpdate = $connUser -> prepare($sqlUpdate);
                    $regUpdate -> bind_param("ss", password_hash($_POST['confirmNewPass'], PASSWORD_DEFAULT), $_SESSION['usuario']);

                    $regUpdate -> execute();

                    
                    $regUpdate-> close();
                    $connUser -> close();
                    header("location: ../index.php?action=priv-space");
                }else{

                    $_SESSION['not-correct-pass']=true;
                    
                    $registres -> close();
                    $connUser -> close();
                    header("location: ../index.php?action=change-pass"); 
                }
                
        
            }
        }
    }

    
        
    $registres -> close();
    $connUser -> close();
    header("location: ../index.php?action=change-pass");
    
    


}else{
    header("location: index.php?action=change-pass");
}



?>
