<?php
      date_default_timezone_set('America/Argentina/Buenos_Aires');
      include_once '../Clases/repliesDB.php';
      include_once '../Clases/session.php';

      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);

      use userSession\Session;
      use BDD\Tables\Replies;

      $revs = new Replies();
      $sess = new Session();

      $revId = $_POST['id'];
      if(!$sess->anon){
            $id = $sess->userId;
      }else{
            $id = 0;
      }
      $fecha = date('Y-m-d H:i:s');
      $comm = $_POST['comment'];

      if($comm != ''){
            $datos = array($id, $revId, $comm, $fecha);
      } else {
            echo 'campo vacio';
      }
      
      if($sess){
            $revs->addReplies($datos);
            echo '1';
      }else {
            echo 'error de comentario';
      }

      
?>