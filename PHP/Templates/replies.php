<?php
    include_once '../Private/Clases/repliesDB.php';

    use BDD\Tables\Replies;

    $bdd = new Replies();
    $getReps = $bdd->getRepliesReview($revID);
    $reps = $getReps->fetchAll();

    foreach($reps as $r){
?>
<div class="card-body border-top">
    <div class="d-flex">
        <img src="<?php echo isset($r['Avatar']) ? "../../Uploads/".$nom.'/'.$avatar : "../../Resources/imgs/default_avatar.png"?>" class="card-img-user" alt="...">
        <h5 class="card-p m-2"><?php echo $r['Nombre']; ?></b>
    </div>
    <p class="text-start text-post"><small><?php echo $r['Comentario']; ?></small></p>
</div>
<?php } ?>