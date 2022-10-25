<?php
    include_once '../Private/Clases/repliesDB.php';
    include_once '../Private/Clases/session.php';

    use BDD\Tables\Replies;
    use userSession\Session;

    $bdd = new Replies();
    $sess = new Session();

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reloadReps'])){
        if (isset($_POST['id'])){
            $revID = $_POST['id'];
        }
    }

    $getReps = $bdd->getRepliesReview($revID);
    $reps = $getReps->fetchAll();

    if($getReps->rowCount() == 0){?>
        <p class="ps-3">Se el primero en responder!</p>
    <?php }
    foreach($reps as $r){
?>
<div class="card-body mt-3">
    <div class="d-flex">
        <img src="<?php echo isset($r['Avatar']) ? "../../Uploads/".$r['Nombre'].'/'.$r['Avatar'] : "../../Resources/imgs/default_avatar.png"?>" class="card-img-user" alt="...">
        <h5 class="card-p m-2"><?php echo $r['Nombre']; ?></b>
        <?php echo ($sess->userId == $r['usuario_ID']) ?  '<i class="bx bx-trash fs-3 delete-Reply" id="delete-'.$r['ID'].'" style="color:red"></i>' : '' ?>
    </div>
    <p class="text-start text-post"><small><?php echo $r['Comentario']; ?></small></p>
</div>
<?php } ?>


