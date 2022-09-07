<?php
include '../Templates/header.php';
?>

<div class="container text-center">
  <div class="row">
    <div class="col-3 p-0 me-0">
      <img src="../../Resources/imgs/logo.png" class="Poster" alt="Pelicula">
    </div>
    <div class="col-sm pt-5">
      <div class="text-md-start">
        <h2>Titulo de la Pelicula</h2>
        <h6><b>Genero</b></h6>
        <p>Descripcion de la pelicula</p>
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
      <div class="card-body border-top pt-2">
        <div class="d-flex">
          <img src="../../Resources/imgs/logo.png" class="card-img-user" alt="...">
          <h5 class="card-p m-2">Nombre de usuario</b></h5>
        </div>
        <p class="text-start text-post"><small>Gracias a un descubrimiento, un grupo de científicos y exploradores, encabezados por Cooper, se embarcan en un viaje espacial para encontrar un lugar con las condiciones necesarias para reemplazar a la Tierra y comenzar una nueva vida allí.</small></p>
      </div>
    </div>
  </div>
</div>