<?php
    include_once '../Private/Clases/repliesDB.php';
    
    use BDD\Tables\Replies;

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if($_SERVER["REQUEST_METHOD"] != 'GET'){
        $row = $_POST["id"];
    }

    $rep = new Replies();

    $getRep = $rep->getReplies($row);

    $replies = $getRep->fetchAll();

    $avatarAnon = "../../Resources/imgs/default_avatar.png";

    foreach ($replies as $values) {
?>
                    <div class="d-flex">
                    <?php if($values['Usuario_ID'] == '0') {?>
                        <img src="<?php echo $avatarAnon; ?>" class="card-img-user" alt="anom_avatar">
                    <?php } else {?>
                        <img src="../../Uploads/<?php echo ($values['Nombre'].'/Avatar.jpg') ?>" class="card-img-user" alt="...">
                    <?php } ?>
                        <h5 class="card-p m-2"><?php echo $values['Nombre'] ?></b>
                    </div>
                    <p class="text-start text-post"><small><?php echo $values['Comentario'] ?></small></p>

<?php } ?>