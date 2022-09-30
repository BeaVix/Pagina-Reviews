<?php

use userSession\Session;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $edit = $_POST['edit'];
        include_once '../Private/Clases/session.php';
        $sess = new Session();
        $nom = $sess->userName;
        $avatar = $sess->userAvatar;
        $avatarURL = isset($sess->userAvatar) ? "../../Uploads/" . $nom . '/' . $avatar : "../../Resources/imgs/default_avatar.png";
    }else{
        $edit = false;
    }
?>

<div class="card-body w-100">
<div class="d-flex mb-3">

<?php
    if($edit == 'true'){      
?>
        <input type="file" name="avatar" id="avatar">
        <div>
            <label for="userName">Nombre de usuario</label>
            <input type="text" name="userName" value="<?php echo $nom; ?>" id="nombre">
            <p class="card-text text-post">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>

<?php }else{ ?>

    
        <img src="<?php echo $avatarURL; ?>" class="userPerfil" id="avatar" alt="Foto de perfil">
        <div>
            <h5 class="card-title m-2" id="nombre"><b><?php echo $nom; ?></b></h5>
            <p class="card-text text-post">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>

<?php } ?>
    </div>
</div>