<?php
    include_once '../Private/Clases/reviewsDB.php';
    include_once '../Private/Clases/session.php';
    
    use BDD\Tables\Reviews;
    use userSession\Session;

    if($_SERVER["REQUEST_METHOD"] != 'GET'){
        $modo = $_POST["modo"];
        $rew = $_POST["id"];
        $revs = new Reviews();
        $sess = new Session();
        $loggedIn = $sess->loggedIn;
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

        <div class="d-flex m-3">
            <button class="btn p-0 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#comment-box<?php echo $values['ID'] ?>" aria-expanded="false" aria-controls="collapse">
                <b>Responder</b>
            </button>
        </div>
        
        <!--Formulario para mandar respuesta-->
        <div class="collapse ms-3" id="comment-box<?php echo $values['ID'] ?>">
            <form id="reply-to<?php echo $values['ID']?>">
                <div class="row user-replies">
                    <div class="col-9">
                        <textarea class="form-control-plaintext p-2" placeholder="Comentar..." name="comment" id="Textarea"></textarea>
                    </div>
                    <div class="col-2 pt-3">
                        <button type="button" class="btn-comment" onclick="<?php echo $loggedIn ? 'repliesForm('.$values['ID'].')' : 'openModal()' ;?>" name="btn-comment">Comentar</button>
                    </div>
                </div>
            </form>
        <!--Respuestas-->
            <div class="replies" id="replies<?php echo $values['ID']?>">
                <?php include '../Templates/replies.php' ?>
                <hr>
            </div>
        </div>
<?php
    }
?>

