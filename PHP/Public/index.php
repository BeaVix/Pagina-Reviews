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

    $res = $peliculas->fetchAll();
    $resLib = $libros->fetchAll();
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
        
<?php foreach($res as $row) { ?>
        
        <div id="demo" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="2000">
                    <div class="row row-cols-3 bg-light">
                        <div class="col-sm w-10">
                            <div class="card" style="width: 11rem;">
                                <a href="#"><img src="../../Resources/imgs/Peliculas/<?php echo $row['Portada']; ?>" class="card-img-top img-carrousel d-block" alt="Logo"></a>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $row['Titulo'];?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm w-10">
                            <div class="card" style="width: 11rem;">
                                <a href="#"><img src="../../Resources/imgs/Peliculas/<?php echo $row['Portada']; ?>" class="card-img-top img-carrousel d-block" alt="Logo"></a>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $row['Titulo'];?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm w-10">
                            <div class="card" style="width: 11rem;">
                                <a href="#"><img src="../../Resources/imgs/Peliculas/<?php echo $row['Portada']; ?>" class="card-img-top img-carrousel d-block" alt="Logo"></a>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $row['Titulo'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" data-bs-interval="2000">
                    <div class="row row-cols-3 bg-light">
                        <div class="col-sm">
                            <div class="card" style="width: 11rem;">
                                <a href="#"><img src="../../Resources/imgs/Peliculas/<?php echo $row['Portada']; ?>" class="card-img-top img-carrousel d-block" alt="Logo"></a>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $row['Titulo'];?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card" style="width: 11rem;">
                                <a href="#"><img src="../../Resources/imgs/Peliculas/<?php echo $row['Portada']; ?>" class="card-img-top img-carrousel d-block" alt="Logo"></a>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $row['Titulo'];?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card" style="width: 11rem;">
                                <a href="#"><img src="../../Resources/imgs/Peliculas/<?php echo $row['Portada']; ?>" class="card-img-top img-carrousel d-block" alt="Logo"></a>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $row['Titulo'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" data-bs-interval="2000">
                    <div class="row row-cols-3 bg-light">
                        <div class="col-sm">
                            <div class="card" style="width: 11rem;">
                                <a href="#"><img src="../../Resources/imgs/Peliculas/<?php echo $row['Portada']; ?>" class="card-img-top img-carrousel d-block" alt="Logo"></a>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $row['Titulo'];?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card" style="width: 11rem;">
                                <a href="#"><img src="../../Resources/imgs/Peliculas/<?php echo $row['Portada']; ?>" class="card-img-top img-carrousel d-block" alt="Logo"></a>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $row['Titulo'];?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card" style="width: 11rem;">
                                <a href="#"><img src="../../Resources/imgs/Peliculas/<?php echo $row['Portada']; ?>" class="card-img-top img-carrousel d-block" alt="Logo"></a>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $row['Titulo'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
<?php }
    foreach($resLib as $rowLib){
?>
        <!--Libros-->

        <div class="text-books"><b>Libros recomendados</b></div>

        <div id="demo" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="2000">
                    <div class="row row-cols-3 bg-light">
                        <div class="col-sm">
                            <div class="card" style="width: 11rem;">
                                <a href="#"><img src="../../Resources/imgs/Libros/<?php echo $rowLib['Portada']; ?>" class="card-img-top img-carrousel d-block" alt=".."></a>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $rowLib['Titulo'];?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card" style="width: 11rem;">
                                <a href="#"><img src="../../Resources/imgs/Libros/<?php echo $rowLib['Portada']; ?>" class="card-img-top img-carrousel d-block" alt=".."></a>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $rowLib['Titulo'];?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card" style="width: 11rem;">
                                <a href="#"><img src="../../Resources/imgs/Libros/<?php echo $rowLib['Portada']; ?>" class="card-img-top img-carrousel d-block" alt=".."></a>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $rowLib['Titulo'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" data-bs-interval="2000">
                    <div class="row row-cols-3 bg-light">
                        <div class="col-sm">
                            <div class="card" style="width: 11rem;">
                                <a href="#"><img src="../../Resources/imgs/Libros/<?php echo $rowLib['Portada']; ?>" class="card-img-top img-carrousel d-block" alt=".."></a>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $rowLib['Titulo'];?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card" style="width: 11rem;">
                                <a href="#"><img src="../../Resources/imgs/Libros/<?php echo $rowLib['Portada']; ?>" class="card-img-top img-carrousel d-block" alt=".."></a>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $rowLib['Titulo'];?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card" style="width: 11rem;">
                                <a href="#"><img src="../../Resources/imgs/Libros/<?php echo $rowLib['Portada']; ?>" class="card-img-top img-carrousel d-block" alt=".."></a>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $rowLib['Titulo'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" data-bs-interval="2000">
                    <div class="row row-cols-3 bg-light">
                        <div class="col-sm">
                            <div class="card" style="width: 11rem;">
                                <a href="#"><img src="../../Resources/imgs/Libros/<?php echo $rowLib['Portada']; ?>" class="card-img-top img-carrousel d-block" alt=".."></a>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $rowLib['Titulo'];?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card" style="width: 11rem;">
                                <a href="#"><img src="../../Resources/imgs/Libros/<?php echo $rowLib['Portada']; ?>" class="card-img-top img-carrousel d-block" alt=".."></a>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $rowLib['Titulo'];?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card" style="width: 11rem;">
                                <a href="#"><img src="../../Resources/imgs/Libros/<?php echo $rowLib['Portada']; ?>" class="card-img-top img-carrousel d-block" alt=".."></a>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $rowLib['Titulo'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
<?php } ?>
    </div>
</div>
