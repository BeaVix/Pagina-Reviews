<?php
    include_once '../Private/Clases/reviewsDB.php';
    
    use BDD\Tables\Reviews;

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if($_SERVER["REQUEST_METHOD"] != 'GET'){
        $modo = $_POST["modo"];
        $rew = $_POST["id"];
        $revs = new Reviews();
        include_once '../Private/starLoad.php';
    }
    $getRevs = $modo ? $revs->getReviewsLibros($rew) : $revs->getReviewsPelis($rew);
    $comms = $getRevs->fetchAll();

    foreach ($comms as $values) { //Carga las reviews
?>
        <div class="d-flex">
        <img src="../../Uploads/<?php echo ($values['Nombre'].'/Avatar.jpg') ?>" class="card-img-user" alt="...">
        <h5 class="card-p m-2"><?php echo $values['Nombre'];?></b></h5>
        </div>
        <div class="text-start m-2">Rating: <?php echo $values['Cant_Estrellas'];?>/5<?php echo starLoad($values['Cant_Estrellas']) ?></div>
        <p class="text-start text-post"><small><?php echo $values['Comentario'];?></small></p>
<?php
    }
?>