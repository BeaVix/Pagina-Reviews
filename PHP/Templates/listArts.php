<?php
  include $modo ? '../Private/Clases/librosDB.php' : '../Private/Clases/peliculasDB.php';
  include '../Private/Clases/reviewsDB.php';
  include '../Private/Review/starLoad.php';  
?>

<div class="container text-center" id="reviews">

<?php
  use BDD\Tables\Peliculas;
  use BDD\Tables\Libros;
  use BDD\Tables\Reviews;

  $arts = $modo ? new Libros() : new Peliculas();
  $revs = new Reviews();

  $getArts = $modo ? $arts->getLibros() : $arts->getPelis();
  $res = $getArts->fetchAll();

  foreach ($res as $row) {
    $rating = 0;
    $getRevs = $modo ? $revs->getReviewsLibros($row['ID']) : $revs->getReviewsPelis($row['ID']);
    $fetchRevs = $getRevs->fetchAll();

    foreach($fetchRevs as $valor){
        $rating += $valor['Cant_Estrellas'];
    }
    if($rating > 0){
      $rating = $rating / $getRevs->rowCount();
      if(is_float($rating)){
        $rating = floor($rating) + 0.5;
      }
    }
    ?>
    <div class="row" id="<?php echo $row['Titulo'];?>">

    <div class="col-md-auto mb-4">
      <img src="../../Resources/imgs/<?php echo $modo ? 'Libros/' : 'Peliculas/'; echo $row['Portada'];?>" class="Poster text-center" alt="<?php echo $modo ? 'Libro' : 'Pelicula';?>">
    </div>

    <div class="col-8 ps-auto">
      <div class="text-md-start">
        <h2><?php echo $row['Titulo'];?></h2>
        <h6><b><?php echo $row['Nombre'];?></b></h6>
        <p><?php echo $row['Descripcion'];?></p>
        <p><b><?php echo $modo ? 'Autor: </b>'.$row['Autor'] : 'Director: </b>'.$row['Director'];?></p>
      </div>

      <!-----------COMENTARIO-------->
          <div class="d-flex pb-2">
            <div><b>Rating: </b><?php echo $rating;?>/5 <?php echo starLoad($rating);?></div>
            <div class="ms-auto">
              <button class="btn collapsed text-start" type="button" data-bs-toggle="collapse" data-bs-target="#demo<?php $modo ? 'Libros/' : 'Peliculas/'; echo $row['ID'];?>" aria-expanded="false" aria-controls="collapse">
                  <i class='bx bxs-comment-detail' style='color: black'><b>Reviews:<?php echo $getRevs->rowCount()?></b></i>
              </button>
            </div>
          </div>

          <div class="collapse" id="demo<?php $modo ? 'Libros/' : 'Peliculas/'; echo $row['ID'];?>">
            <div class="card-body pb-3">
              <form id="review<?php echo $row['ID'];?>" method="POST">
                <div class="star-picker-container">
                  <b>Su rating:</b>
                    <div class="star-picker">
                      
                      <i class="bx bx-star" name="star1"></i>
                      <i class="bx bx-star" name="star2"></i>
                      <i class="bx bx-star" name="star3"></i>
                      <i class="bx bx-star" name="star4"></i>
                      <i class="bx bx-star" name="star5"></i>
                      
                    </div>
                    <span class="star-count">0/5</span>
                    <input type="hidden" name="rating" value="0">
                </div>
                <div class="row">
                  <div class="col-9">
                    <input type="hidden" name="modo" value="<?php echo $modo ?>">
                    <input type="hidden" name="id" value="<?php echo $row['ID'];?>">
                    <textarea class="form-control-plaintext p-2" placeholder="Review..." name="comment" id="Textarea"></textarea>
                  </div>
                  <div class="col-2 pt-3">
                    <button type="button" class="btn-comment" onclick="<?php echo $loggedIn ? 'reviewForm('.$row['ID'].','.$modo.')' : 'openModal()' ;?>" name="btn-comment">Comentar</button>
                  </div>
                </div>
              </form>
            </div>
            <!--Reviews-->
            <div class="card-body border-top pt-2" id="comment<?php echo $row['ID']?>">
            <?php 
              $rew = $row['ID'];
              
              include '../Templates/userComment.php';
            ?>
            </div>
          </div>
      </div>
<?php
  }
?>  
    </div>

<script src="../../JS/Review/starPicker.js"></script>
