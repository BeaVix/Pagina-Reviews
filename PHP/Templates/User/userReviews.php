<?php
include_once '../Private/Clases/reviewsDB.php';
include_once '../Private/Review/starLoad.php';
include_once '../Private/Clases/session.php';

use BDD\Tables\Reviews;
use userSession\Session;

$revs = new Reviews();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sess = new Session();
    $id = $sess->userId;
    $nom = $sess->userName;
    $avatar = $sess->userAvatar;
    
    $avatarURL = isset($avatar) ? "../../Uploads/" . $nom . '/' . $avatar : "../../Resources/imgs/default_avatar.png";
}

$getRevs = $revs->getUserReview($id);
$comms = $getRevs->fetchAll();

foreach ($comms as $values) {
    $modo = is_null($values['pelicula_Titulo']);
    $revID = $values['ID'];
?>
    <div class="col-sm">
        <div class="card m-auto mb-3" style="width: 40rem;">
            <div class="card-body">
                <div class="d-flex mb-3">
                    <img src="<?php echo $avatarURL; ?>" class="card-img" alt="...">
                    <h5 class="card-title m-2"><b><?php echo $nom; ?></b></h5>
                    <div><?php echo starLoad($values['Cant_Estrellas']); ?></div>
                    <div id="delete<?php echo $values['ID'] ?>" class="position-absolute top-0 end-0 p-2 delete"><i class="bx bx-trash fs-3" style="color:red"></i></div>
                </div>
                <div class="card-body text-center"><?php echo $modo ? $values['libro_Titulo'] : $values['pelicula_Titulo']; ?></div>
                <div class="text-center pb-2">
                    <img src="../../Resources/imgs/<?php echo $modo ? 'Libros/' . $values['libro_Portada'] : 'Peliculas/' . $values['pelicula_Portada']; ?>" class="card-img-top card-img-poster" alt="...">
                </div>
                <p class="card-text text-post"><?php echo $values['Comentario']; ?></p>
            </div>

            <div class="card-body">
                <div class="d-flex">
                    <button class="btn comment text-start" type="button" data-bs-toggle="collapse" data-bs-target="#demo<?php echo $values['ID'] ?>" aria-expanded="false" aria-controls="demo<?php echo $values['ID'] ?>">
                        <i class='bx bx-comment' style='color: black'></i> Comentar
                    </button>
                </div>
            </div>

            <div class="collapse" id="demo<?php echo $values['ID'] ?>">
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-9">
                                <textarea type="text" class="" placeholder="Comenta aqu??.." name="comment"></textarea>
                            </div>
                            <div class="col-2 pt-3">
                                <input type="submit" class="btn-comment" placeholder="Comentar" name="comment" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--Replies-->
            <div class="replies" id="replies<?php echo $revID; ?>">
                <?php include '../Templates/Replies/replies.php'; ?>
            </div>
        </div>
    </div>
<?php } ?>
<script src="../../JS/Review/deleteReviews.js"></script>