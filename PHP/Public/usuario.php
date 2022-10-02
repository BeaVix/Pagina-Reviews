<?php
include '../Templates/header.php';
include_once '../Private/Clases/reviewsDB.php';
include_once '../Private/starLoad.php';
include_once '../Private/Clases/session.php';

use BDD\Tables\Reviews;
use userSession\Session;

$revs = new Reviews();
$sess = new Session();

$nom = $sess->userName;
$avatar = $sess->userAvatar;
$id = $sess->userId;

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
    <?php
    $getRevs = $revs->getUserReview($id);
    $comms = $getRevs->fetchAll();

    foreach ($comms as $values) {
        $modo = is_null($values['pelicula_Titulo']);
        $revID = $values['ID'];
    ?>
        <div class="col-sm">
            <div class="card m-auto" style="width: 40rem;">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <img src="<?php echo $avatarURL; ?>" class="card-img" alt="...">
                        <h5 class="card-title m-2"><b><?php echo $nom; ?></b></h5>
                        <div><?php echo starLoad($values['Cant_Estrellas']); ?></div>
                    </div>
                    <div class="card-body text-center"><?php echo $modo ? $values['libro_Titulo'] : $values['pelicula_Titulo']; ?></div>
                    <img src="../../Resources/imgs/<?php echo $modo ? 'Libros/' . $values['libro_Portada'] : 'Peliculas/' . $values['pelicula_Portada']; ?>" class="card-img-top" alt="...">
                    <p class="card-text text-post"><?php echo $values['Comentario']; ?></p>
                </div>

                <div class="card-body">
                    <div class="border-top d-flex">
                        <button class="btn comment text-start" type="button" data-bs-toggle="collapse" data-bs-target="#demo<?php echo $values['ID']?>" aria-expanded="false" aria-controls="demo<?php echo $values['ID']?>">
                            <i class='bx bx-comment' style='color: black'></i> Comentar
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn dislike" onclick="">
                                <i class='bx bx-dislike' style='color: black'></i>
                            </button>
                            <?php echo $values['Dislikes'] ?>
                            <button type="button" class="btn like" onclick="">
                                <i class='bx bx-like' style='color: black'></i>
                            </button>
                            <?php echo $values['Likes'] ?>
                        </div>
                    </div>
                </div>

                <div class="collapse" id="demo<?php echo $values['ID']?>">
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-9">
                                    <textarea type="text" class="" placeholder="Comenta aquí.." name="comment"></textarea>
                                </div>
                                <div class="col-2 pt-3">
                                    <input type="submit" class="btn-comment" placeholder="Comentar" name="comment" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--Replies-->
                <div id="replies-<?php echo $revID; ?>">
                    <?php include '../Templates/replies.php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } ?>
<script src="../../JS/editProfile.js"></script>