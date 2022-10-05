<?php
include '../Templates/header.php';
include_once '../Private/Clases/session.php';

use userSession\Session;

$sess = new Session();

$nom = $sess->userName;
$avatar = $sess->userAvatar;
$id = $sess->userId;
$desc = $sess->desc;

$avatarURL = isset($avatar) ? "../../Uploads/" . $nom . '/' . $avatar : "../../Resources/imgs/default_avatar.png";
?>
<div class=" p-5">
    <div id="perfil">
        <?php include '../Templates/userProfile.php'; ?>
    </div>
    <div class="text-end">
        <i id='profile-edit' class="bx bx-edit fs-4"></i>
    </div>
    <hr>

    <div id="perfil-reviews">
        <div id="reviews">
            <?php include '../Templates/userReviews.php' ?>
        </div>
    </div>
</div>
<script src="../../JS/editProfile.js"></script>