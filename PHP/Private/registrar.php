<?php
    include_once 'Clases/usersDB.php';

	use BDD\Tables\users;

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['nombre'];
        $email = $_POST['email'];
        $pass = $_POST['psw'];

        $bd = new users();
        
        $query = $bd->getUserEmail($email);
        if ($query->rowCount() > 0){
            echo "ERROR: EMAIL YA REGISTRADO";
        }else{
            $query = $bd->getUserName($name);
            if ($query->rowCount() > 0){
                echo "ERROR: NOMBRE YA EXISTENTE";
            } else{
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $res = $bd->newUser($name, $email, $hash);
                if($res->rowCount() > 0){
                    echo "1";
                }else{
                    echo "ERROR DE SERVIDOR";
                }
            }
        }
    }else{
        echo "ERROR DE ACCESO";
    }
?>