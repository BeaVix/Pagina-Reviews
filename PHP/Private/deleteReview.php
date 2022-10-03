<?php 
    include 'Clases/reviewsDB.php';

    use BDD\Tables\Reviews;

    $revs = new Reviews();

    $id = $_POST['id'];

    $res = $revs->deleteReviews($id);
    echo '1';
?>