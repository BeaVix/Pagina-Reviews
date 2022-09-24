<?php
    include 'Clases/session.php';

    use userSession\Session;

    $sess = new Session();

    $action = $_POST['action'];

    $sess->closeSession();
    echo '1';
?>