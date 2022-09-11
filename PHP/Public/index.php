<?php
    include '../Templates/header.php';
    include '../Private/Clases/librosDB.php';
    include '../Private/Clases/peliculasDB.php';

    use BDD\Tables\Peliculas;
    use BDD\Tables\Libros;

    $pelArt = new Peliculas();
    $libArt = new Libros();

    $peliculas = $pelArt->getPelis();
    $libros = $libArt->getLibros();
?>

<div class="row p-0">
    <!--Reviews mas vistos-->
    <div class="col-sm-7">
        <div class="card m-auto" style="width: 40rem;">
            <div class="card-body text-center">Nombre de la peli</div>
            <div class="card-body">
                <div class="d-flex mb-3">
                    <img src="../../Resources/imgs/logo.png" class="card-img" alt="..">
                    <h5 class="card-title m-2"><b>Nombre de usuario</b></h5>
                </div>
                <img src="../../Resources/imgs/logo.png" class="card-img-top" alt="..">
                <p class="card-text text-post">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>

            <div class="card-body">
                <div class="border-top d-flex">
                    <button class="btn comment text-start" type="button" data-bs-toggle="collapse" data-bs-target="#demo" aria-expanded="false" aria-controls="demo">
                        <i class='bx bx-comment' style='color: black'></i> Comentar
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

            <div class="collapse" id="demo">
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-9">
                                <textarea type="text" class="" placeholder="Comenta aquí.." name="comment"></textarea>
                            </div>
                            <div class="col-2">
                                <input type="submit" class="btn-comment" placeholder="Comentar" name="comment"/>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-body border-top">
                    <div class="d-flex">
                        <img src="../../Resources/imgs/logo.png" class="card-img-user" alt="..">
                        <h5 class="card-p m-2">Nombre de usuario</b>
                    </div>
                    <p class="text-start text-post"><small>comentario de x usuario al review.</small></p>
                </div>
            </div>
        </div>
    </div>

    <!--Peliculas y libros recomendados-->
    <div class="col-sm-5">
        <!--Peliculas-->
        <div><b>Peliculas recomendados</b></div>

        <div id="demo" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
            <?php for($i = 0; $i < 3; $i ++) { 
                if($i == 0){    
            ?>  
                <div class="carousel-item active" data-bs-interval="3000">                  
                    <div class="row row-cols-3 bg-light">
                        <?php for($a = 0; $a < 3; $a ++) { 
                            $res = $peliculas->fetch();
                        ?>
                        <div class="col-sm w-10">
                            <div class="card" style="width: 11rem;">
                                <a href="#"><img src="../../Resources/imgs/Peliculas/<?php echo $res['Portada']; ?>" class="card-img-top img-carrousel d-block" alt="<?php echo $res['Titulo']; ?>"></a>
                                <div class="card-body" style="height: 4.2rem;">
                                    <p class="card-text"><?php echo $res['Titulo'];?></p>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } else{ ?>
                <div class="carousel-item" data-bs-interval="3000">
                    <div class="row row-cols-3 bg-light">
                        <?php for($a = 0; $a < 3; $a ++) { 
                            $res = $peliculas->fetch();
                        ?>
                        <div class="col-sm">
                            <div class="card" style="width: 11rem;">
                                <a href="#"><img src="../../Resources/imgs/Peliculas/<?php echo $res['Portada']; ?>" class="card-img-top img-carrousel d-block" alt="<?php echo $res['Titulo']; ?>"></a>
                                <div class="card-body" style="height: 4.2rem;">
                                    <p class="card-text"><?php echo $res['Titulo'];?></p>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } } ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!--Libros-->

        <div class="text-books"><b>Libros recomendados</b></div>

        <div id="demo" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
            <?php for($j = 0; $j < 3; $j ++) { 
                if($j == 0){    
            ?>  
                <div class="carousel-item active" data-bs-interval="3000">                  
                    <div class="row row-cols-3 bg-light">
                        <?php for($b = 0; $b < 3; $b ++) { 
                            $row = $libros->fetch();
                        ?>
                        <div class="col-sm w-10">
                            <div class="card" style="width: 11rem;">
                                <a href="#"><img src="../../Resources/imgs/Libros/<?php echo $row['Portada']; ?>" class="card-img-top img-carrousel d-block" alt="<?php echo $row['Titulo']; ?>"></a>
                                <div class="card-body" style="height: 4.2rem;">
                                    <p class="card-text"><?php echo $row['Titulo'];?></p>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } else{ ?>
                <div class="carousel-item" data-bs-interval="3000">
                    <div class="row row-cols-3 bg-light">
                        <?php for($a = 0; $a < 3; $a ++) { 
                            $row = $peliculas->fetch();
                        ?>
                        <div class="col-sm">
                            <div class="card" style="width: 11rem;">
                                <a href="#"><img src="../../Resources/imgs/Libros/<?php echo $row['Portada']; ?>" class="card-img-top img-carrousel d-block" alt="<?php echo $row['Titulo']; ?>"></a>
                                <div class="card-body" style="height: 4.2rem;">
                                    <p class="card-text"><?php echo $row['Titulo'];?></p>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } } ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
