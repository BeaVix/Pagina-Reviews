<?php 
    include_once 'Clases/session.php';

    use userSession\Session;

    $sess = new Session();
    $isLogged = $sess->loggedIn;
?>