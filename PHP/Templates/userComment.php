<?php
    include_once '../Private/Clases/reviewsDB.php';
    
    use BDD\Tables\Reviews;

    if($_SERVER["REQUEST_METHOD"] != 'GET'){
        $modo = $_POST["modo"];
        $rew = $_POST["id"];
        $revs = new Reviews();
        include_once '../Private/starLoad.php';
    }
    $getRevs = $modo ? $revs->getReviewsLibros($rew) : $revs->getReviewsPelis($rew);
    $comms = $getRevs->fetchAll();

    foreach ($comms as $values) { //Carga las reviews
        $revID = $values['ID']
?>
        <div class="d-flex">
        <img src="<?php echo isset($values['Avatar']) ? '../../Uploads/'.$values['Nombre'].'/'.$values['Avatar'] : '../../Resources/imgs/default_avatar.png' ?>" class="card-img-user" alt="anon_avatar">
        <h5 class="card-p m-2"><?php echo $values['Nombre'];?></b></h5>
        </div>
        <div class="text-md-start m-2">Rating: <?php echo $values['Cant_Estrellas'];?>/5<?php echo starLoad($values['Cant_Estrellas']) ?></div>
        <p class="text-start text-post"><small><?php echo $values['Comentario'];?></small></p>

        <div class="ms-auto">
            <i class='bx bxs-comment-detail' data-bs-toggle="collapse" data-bs-target="#replies<?php echo $values['ID'] ?>" aria-expanded="false" aria-controls="replies<?php echo $values['ID'] ?>"></i> 
            <b>Respuestas</b>
        </div>

        <hr>
        <!--Formulario para mandar respuesta-->
        <div class="form-floating">
            <form id="reply-to<?php echo $values['ID']?>">
                <label for="comment">Respuesta</label>
                <textarea class="form-control-plaintext pt-1" placeholder="Deja aquí tu respuesta" name="comment" id="floatingTextarea"></textarea>
            </form>
        </div>
        <div class="col-2 pt-3">
            <button type="button" class="btn-comment" onclick="<?php echo $loggedIn ? 'repliesForm('.$values['ID'].')' : 'openModal()' ;?>" name="btn-comment">Comentar</button>
        </div>
        <!--Respuestas-->
        <div class="collapse" id="replies<?php echo $values['ID']?>">
            <?php include '../Templates/replies.php' ?>
        </div>
<?php
    }
?>

