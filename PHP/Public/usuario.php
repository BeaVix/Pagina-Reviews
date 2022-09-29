<?php
    include '../Templates/header.php';
    include_once '../Private/Clases/usersDB.php';
    include_once '../Private/Clases/reviewsDB.php';
    include_once '../Private/starLoad.php'; 
    include_once '../Private/Clases/session.php';

    use BDD\Tables\Users;
    use BDD\Tables\Reviews;
    use userSession\Session;

    $user = new Users();
    $revs = new Reviews();
    $sess = new Session();

    $nom = $sess->userName;
    $avatar = $sess->userAvatar;

 
        $avatar = '../../Resources/imgs/';


    $getUser = $user->getUserName($nom);
    $userRes = $getUser->fetchAll();

    foreach($userRes as $row){
?>
<div class=" p-5">
    <div class="card-body">
        <div class="d-flex mb-3">
        <img src="<?php  echo !isset($avatar) ? "../../Uploads/".$row['Nombre'].'/Avatar.jpg' : "../../Resources/imgs/default_avatar.png"?>" class="userPerfil" alt="<?php echo ($row['Avatar'].'.jpg') ?>">
            <div>
                <h5 class="card-title m-2"><b><?php echo $row['Nombre'];?></b></h5>
                <p class="card-text text-post">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>

    <hr>
<?php 
    $getRevs = $modo ? $revs->getReviewsLibros($rew) : $revs->getReviewsPelis($rew);
    $comms = $getRevs->fetchAll();

    foreach ($comms as $values) {
?>
    <div class="col-sm">
        <div class="card m-auto" style="width: 40rem;">
            <div class="card-body text-center">Nombre de la peli</div>
            <div class="card-body">
                <div class="d-flex mb-3">
                    <img src="../../Resources/imgs/logo.png" class="card-img" alt="...">
                    <h5 class="card-title m-2"><b>Nombre de usuario</b></h5>
                </div>
                <img src="../../Resources/imgs/logo.png" class="card-img-top" alt="...">
                <p class="card-text text-post">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>

            <div class="card-body">
                <div class="border-top d-flex">
                    <button class="btn comment text-start" type="button" data-bs-toggle="collapse" data-bs-target="#demo" aria-expanded="false" aria-controls="demo">
                        <i class='bx bx-comment' style='color: black'></i> Comentar
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn dislike" onclick="">
                            <i class='bx bx-dislike' style='color: black'></i>
                        </button>
                        <button type="button" class="btn like" onclick="">
                            <i class='bx bx-like' style='color: black'></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="collapse" id="demo">
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-9">
                                <textarea type="text" class="" placeholder="Comenta aquí.." name="comment"></textarea>
                            </div>
                            <div class="col-2 pt-3">
                                <input type="submit" class="btn-comment" placeholder="Comentar" name="comment"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card-body border-top">
                <div class="d-flex">
                    <img src="../../Resources/imgs/logo.png" class="card-img-user" alt="...">
                    <h5 class="card-p m-2">Nombre de usuario</b>
                </div>
                <p class="text-start text-post"><small>comentario de x usuario al review.</small></p>
            </div>
        </div>
    </div>

</div>

<?php } } ?>