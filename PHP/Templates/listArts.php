<?php
  include $modo ? '../Private/Clases/librosDB.php' : '../Private/Clases/peliculasDB.php';
  include '../Private/Clases/reviewsDB.php';
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
    $comms = $getRevs->fetchAll();
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
            <form action="../Private/reviewsAuth.php" method="POST">
              <div class="row">
                <div class="col-9">
                  <input type="hidden" name="modo" value="<?php $modo ?>">
                  <input type="hidden" name="id" value="<?php echo $row['ID'];?>">
                  <textarea type="text" class="" placeholder="Deja tu review aquí.." name="comment"></textarea>
                </div>
                <div class="col-2 pt-3">
                  <input type="submit" class="btn-comment" placeholder="Comentar" name="btn-comment"/>
                </div>
              </div>
            </form>
          </div>
        <!--Reviews-->
        <?php 
          foreach ($comms as $values) { //Carga las reviews?>
            <div class="card-body card-commet border-top pt-2">
              <div class="d-flex">
                <img src="../../Uploads/<?php echo ($values['Nombre'].'/Avatar.jpg') ?>" class="card-img-user" alt="...">
                <h5 class="card-p m-2"><?php echo $values['Nombre'];?></b></h5>
              </div>
              <div class="text-start m-2">Rating: <?php echo $values['Rating'];?>/5</div>
              <p class="text-start text-post"><small><?php echo $values['Comentario'];?></small></p>
              <div class="card-body">
                <div class="border-top d-flex">
                  <button class="btn comment text-start" type="button" data-bs-toggle="collapse" data-bs-target="#Userdemo<?php echo $values['ID'];?>" aria-expanded="false" aria-controls="demo">
                      <i class='bx bx-comment' style='color: black'></i>CantComment
                  </button>
                  <div class="btn-group">
                      <button type="button" class="btn dislike" onclick="">
                          <i class='bx bx-dislike' style='color: black'></i>
                      </button>
                      <button type="button" class="btn like" onclick="">
                          <i class='bx bx-like' style='color: black'></i>
                      </button>
                  </div>
                </div>
            </div>

            <div class="collapse" id="Userdemo<?php echo $values['ID'];?>">
          <div class="card-body">
            <form>
              <div class="row">
                <div class="col-9">
                    <textarea type="text" class="" placeholder="Comenta aquí.." name="comment"></textarea>
                </div>
                <div class="col-2 pt-3">
                    <input type="submit" class="btn-comment" placeholder="Comentar" name="btn-comment"/>
                </div>
              </div>
            </form>
          </div>
          <?php
          }
        ?>
        </div>
      </div>
    </div>
<?php
  }
  echo $out;

  function starLoad($num){
    $string = "";
    $half = "";
    if (is_float($num)){
      $num = floor($num);
      $half .= "<i class=\"bx bxs-star-half\"></i>";
    }
    $string .= str_repeat("<i class=\"bx bxs-star-fill\"></i>", $num);
    $string .= $half;
    $string .= str_repeat("<i class=\"bx bx-star\"></i>", (5-$num));

    return $string;
  }
?>  
