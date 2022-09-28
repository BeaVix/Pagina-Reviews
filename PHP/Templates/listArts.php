<?php
  include $modo ? '../Private/Clases/librosDB.php' : '../Private/Clases/peliculasDB.php';
  include '../Private/Clases/reviewsDB.php';
  include '../Private/starLoad.php';  
?>

<div class="container text-center">

<?php
  use BDD\Tables\Peliculas;
  use BDD\Tables\Libros;
  use BDD\Tables\Reviews;

  $arts = $modo ? new Libros() : new Peliculas();
  $revs = new Reviews();

  $getArts = $modo ? $arts->getLibros() : $arts->getPelis();
  $res = $getArts->fetchAll();

  $out = '';

  foreach ($res as $row) {
    $getRevs = $modo ? $revs->getReviewsLibros($row['ID']) : $revs->getReviewsPelis($row['ID']);
    ?>
    <div class="row text-start pb-4">

    <div class="col-md-auto">
      <img src="../../Resources/imgs/<?php echo $modo ? 'Libros/' : 'Peliculas/'; echo $row['Portada'];?>" class="Poster" alt="<?php echo $modo ? 'Libro' : 'Pelicula';?>">
    </div>

    <div class="col-8 ps-auto">
      <div class="text-md-start">
        <h2><?php echo $row['Titulo'];?></h2>
        <h6><b><?php echo $row['Nombre'];?></b></h6>
        <p><?php echo $row['Descripcion'];?></p>
        <p><b><?php echo $modo ? 'Autor: </b>'.$row['Autor'] : 'Director: </b>'.$row['Director'];?></p>
      </div>

      <div class="d-flex pb-2">

        <div><b>Rating: </b><?php echo $row['Rating'];?>/5 <?php echo starLoad($row['Rating']);?></div>
          <div class="ms-auto">
            <i class='bx bxs-comment-detail' data-bs-toggle="collapse" data-bs-target="#demo<?php $modo ? 'Libros/' : 'Peliculas/'; echo $row['ID'];?>" aria-expanded="false" aria-controls="demo"></i> 
            <b>Reviews: <?php echo $getRevs->rowCount()?></b>
          </div>
        </div>

        <div class="collapse" id="demo<?php $modo ? 'Libros/' : 'Peliculas/'; echo $row['ID'];?>">
          <div class="card-body">
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
                  <div class="form-floating">
                    <textarea class="form-control-plaintext" placeholder="Deja tu review aquí" name="comment" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Reviews</label>
                  </div>
                </div>
                <div class="col-2 pt-3">
                  <button type="button" class="btn-comment" onclick="reviewForm(<?php echo $row['ID']; ?>,<?php echo $modo; ?>)" name="btn-comment">Comentar</button>
                </div>
              </div>
            </form>
          </div>
        <!--Reviews-->
        <div class="card-body border-top pt-2" id="comment<?php echo $row['ID']?>">
        <?php 
          $rew = $row['ID'];
          
          include 'userComment.php';
        ?>
        </div>
        </div>
      </div>
    </div>
<?php
  }
  echo $out;
?>  

<script src="../../JS/starPicker.js"></script>