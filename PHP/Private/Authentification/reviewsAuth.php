<?php
      date_default_timezone_set('America/Argentina/Buenos_Aires');
      include_once '../Clases/reviewsDB.php';
      include_once '../Clases/session.php';

      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);

      use userSession\Session;
      use BDD\Tables\Reviews;

      $revs = new Reviews();
      $sess = new Session();

      $modo = $_POST['modo'];
      $artId = $_POST['id'];
      $rating = $_POST['rating'];
      if(!$sess->anon){
            $id = $sess->userId;
      }else{
            $id = 0;
      }
      $fecha = date('Y-m-d H:i:s');
      
      $comm = $_POST['comment'];

      if($comm != ''){
            $datos = array($artId, $id, $comm, $rating, $fecha);
      } else {
            echo 'campo vacio';
      }

      if($sess){
            $revs->addReview($modo, $datos);
            echo '1';
      }else {
            echo 'error de envio de comentario';
      }

      
?>