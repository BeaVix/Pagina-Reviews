<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include '../Clases/repliesDB.php';

    use BDD\Tables\Replies;

    $rep = new Replies();

    $id = $_POST['id'];

    $rep->deleteReplies($id);

    echo '1';
?>