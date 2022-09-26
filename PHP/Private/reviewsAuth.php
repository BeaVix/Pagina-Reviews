<?php
      include_once '../Private/Clases/reviewsDB.php';
      include_once '../Private/Clases/session.php';

      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);

      use userSession\Session;
      use BDD\Tables\Reviews;

      $revs = new Reviews();
      $sess = new Session();

      $modo = $_POST['modo'];
      $id = $sess->$userId;
      $fecha = date('Y-m-d H:i:s');
      $artId = $_POST['id'];
      $comm = $_POST['comment'];
      $datos = array($artId, $id, $comm, $fecha);

      if($sess){
            $revs->addReview($modo, $datos);
      }else {
            echo 'error de envio de comentario';
      }

      
?>