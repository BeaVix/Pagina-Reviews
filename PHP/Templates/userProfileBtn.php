<?php 
    include_once '../Private/Clases/session.php';

    use userSession\Session;

    $sess = new Session();

    $user = $sess->userName;
    $avatar= $sess->userAvatar;
    $userId = $sess->userId;

    if(!isset($avatar) && !$sess->anon){
        $avatar = '../../Resources/imgs/default_avatar.png';
    }elseif($sess->anon){
        $avatar = '../../Resources/imgs/Anon_avatar.png';
    }
?>
<div class="dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" id="userDropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $user ?>
    </a>

    <div class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="userDropdown">
        <a href="../Public/usuario.php"><button class="dropdown-item">Ver perfil</button></a>
        <button class="dropdown-item" id="btn-cerrar-sesion" onclick="signOut();">cerrar sesión</button>
  </div>
</div>
<img class="nav-user-avatar" src="<?php echo $avatar ?>">
