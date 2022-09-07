<?php
  include '../Templates/header.php';
  include '../Private/Clases/peliculasDB.php';
  include '../Private/Clases/reviewsDB.php';
?>

<div class="container text-center">

<?php
  use BDD\Tables\Peliculas;
  use BDD\Tables\Reviews;

  $pelis = new Peliculas();
  $revs = new Reviews();

  $getPelis = $pelis->getPelis();
  $res = $getPelis->fetchAll();

  $out = '';

  foreach ($res as $row) {?>
    <div class="row">

    <div class="col-3 p-0">
      <img src="../../Resources/imgs/<?php echo $row['Portada'];?>" class="Poster" alt="Pelicula">
    </div>

    <div class="col-sm pt-5 me-0">
      <div class="text-md-start">
        <h2><?php echo $row['Titulo'];?></h2>
        <h6><b><?php echo $row['Nombre'];?></b></h6>
        <p><?php echo $row['Descripcion'];?></p>
        <p><b>Director:</b> <?php echo $row['Director'];?></p>
      </div>

      <div class="d-flex pb-2">

        <div>Rating: stars rating</div>
          <div class="ms-auto">
            <i class='bx bxs-comment-detail' data-bs-toggle="collapse" data-bs-target="#demo" aria-expanded="false" aria-controls="demo"></i> Reviews: hfh
          </div>
        </div>

        <div class="collapse" id="demo">
          <div class="card-body">
            <form>
              <div class="row">
                <div class="col-9">
                  <textarea type="text" class="" placeholder="Deja tu review aquí.." name="comment"></textarea>
                </div>
                <div class="col-2 pt-3">
                  <input type="submit" class="btn-comment" placeholder="Comentar" name="comment"/>
                </div>
              </div>
            </form>
          </div>
        </div>
        
      <!--Comentarios-->
      <?php 
        $getRevs = $revs->getReviewsPelis($row['ID']);
        $comms = $getRevs->fetchAll();

        foreach ($comms as $values) { ?>
          <div class="card-body border-top pt-2">
            <div class="d-flex">
              <img src="../../Uploads/<?php echo ($values['Nombre'].'/Avatar.jpg') ?>" class="card-img-user" alt="...">
              <h5 class="card-p m-2"><?php echo $values['Nombre'];?></b></h5>
            </div>
            <p class="text-start text-post"><small><?php echo $values['Comentario'];?></small></p>
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
?>   