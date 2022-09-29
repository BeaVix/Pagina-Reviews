<?php
    include 'Clases/usersDB.php';
    include 'Clases/session.php';
    include 'Clases/files.php';

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    use BDD\Tables\users;
    use fileSystem\Files;
    use userSession\Session;

    $sess = new Session();
    $bdd = new users();
    $fs = new Files();

    $id = $sess->userId;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : $sess->userName;
    $avatar = isset($_FILES['avatar']) ? $_FILES['avatar'] : $sess->userAvatar;

    if($avatar != $sess->userAvatar && isset($sess->userAvatar)){
        $picName = $avatar['name'];
        $fs->uploadToFolder($nombre, $avatar);
        unlink('../../Uploads/'.$sess->userName.'/'.$sess->userAvatar);
    }else{
        $picName = $avatar;
    }

    if($nombre != $sess->userName){
        if(file_exists('../../Uploads/'.$sess->userName)){
            rmdir('../../Uploads/'.$sess->userName);
        }
    }

    $res = $bdd->updateUser($id, $nombre, $picName);

    $sess->update($nombre, $picName);
    echo '1';
?>