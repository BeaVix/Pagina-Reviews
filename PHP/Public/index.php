<?php
    include '../Templates/header.php';
    include '../Private/Clases/librosDB.php';
    include '../Private/Clases/peliculasDB.php';
    include '../Private/Clases/reviewsDB.php';
    include_once '../Private/starLoad.php';
    include_once '../Private/isLogged.php';

    use BDD\Tables\Peliculas;
    use BDD\Tables\Libros;
    use BDD\Tables\Reviews;

    $pelArt = new Peliculas();
    $libArt = new Libros();
    $revs = new Reviews();

    $peliculas = $pelArt->getPelis();
    $libros = $libArt->getLibros();
    $reviews = $revs->getReviews();

    $getRevs = $reviews->fetchAll();

    $avatarAnon = "../../Resources/imgs/default_avatar.png";
?>
<div class="container overflow-hidden">
    <div class="row">
        <!--Reviews mas vistos-->
        <div class="col-6">
<?php
    foreach($getRevs as $res){
        $modo = is_null($res['pelicula_Titulo']);
?>
            <div class="card mx-0 mb-3" style="width: 35rem;">
                <div class="card-body text-center border-bottom"><?php echo $modo ? $res['libro_Titulo'] : $res['pelicula_Titulo']; ?></div>
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <img src="../../<?php echo isset($res['Avatar']) ? 'Uploads/'.$res['Nombre'].'/'.$res['Avatar'] : 'Resources/imgs/default_avatar.png' ?>" class="card-img" alt="...">
                        <h5 class="card-title m-2"><b><?php echo $res['Nombre'] ?></b></h5>
                        <div><?php echo starLoad($res['Cant_Estrellas']); ?></div>
                    </div>
                    <div class="text-center pb-2">
                    <img src="../../Resources/imgs/<?php echo $modo ? 'Libros/' . $res['libro_Portada'] : 'Peliculas/' . $res['pelicula_Portada']; ?>" class="card-img-top card-img-poster" alt="...">
                    </div>
                    <p class="card-text text-post text-truncate"><?php echo $res['Comentario'] ?></p>
                </div>
                <!-----------COMENTARIO-------->
                <div class="card-body">
                    <div class="border-top d-flex">
                        <button class="btn text-start" type="button" data-bs-toggle="collapse" data-bs-target="#demo<?php echo $res['ID']?>" aria-expanded="false" aria-controls="collapse">
                            <i class='bx bxs-comment-detail' style='color: black'><b>Comentar</b></i>
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

                <div class="collapse" id="demo<?php echo $res['ID']?>">
                    <form id="reply-to<?php echo $res['ID'];?>" method="POST">
                        <div class="row">
                            <div class="col-9">
                                <input type="hidden" name="id" value="<?php echo $row['ID'];?>">
                                <div class="form-floating">
                                    <textarea class="form-control-plaintext" placeholder="Deja tu review aquí" name="comment" id="floatingTextarea"></textarea>
                                    <label for="floatingTextarea">Respuesta</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn-comment" onclick="<?php echo $isLogged ? 'repliesForm('.$res['ID'].')' : 'openModal()' ?>" name="comment">Comentar</button>
                            </div>
                        </div>
                    </form>
                    <div class="card-body border-top" id="replies<?php echo $res['ID'] ?>">

                    <?php 
                        $revID = $res['ID']; 
                        
                        include '../Templates/replies.php'; 
                    ?>

                    </div>
                </div>
            </div>
<?php } ?>
        </div>

        <!--Peliculas y libros recomendados-->
        
        <div class="col-6">
            <!--Peliculas-->
            <div class="titulo p-3"><b>Peliculas recomendados</b></div>

            <div id="demo_peliculas" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                <?php for($i = 0; $i < 3; $i ++) { 
                    if($i == 0){    
                ?>  
                    <div class="carousel-item active" data-bs-interval="3000">                  
                        <div class="row">
                            <?php for($a = 0; $a < 3; $a ++) { 
                                $res = $peliculas->fetch();
                            ?>
                            <div class="col-sm-auto">
                                <div class="card" style="width: 12rem; height: 20rem;">
                                    <a href="#"><img src="../../Resources/imgs/Peliculas/<?php echo $res['Portada']; ?>" class="card-img-top img-carrousel d-block" alt="<?php echo $res['Titulo']; ?>" style="height: 16rem;"></a>
                                    <div class="card-body bg-dark p-2">
                                        <p class="card-text text-center text-white"><small><?php echo $res['Titulo'];?></small></p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } else{ ?>
                    <div class="carousel-item" data-bs-interval="3000">
                        <div class="row">
                            <?php for($a = 0; $a < 3; $a ++) { 
                                $res = $peliculas->fetch();
                            ?>
                            <div class="col-sm-auto">
                                <div class="card" style="width: 12rem; height: 20rem;">
                                    <a href="#"><img src="../../Resources/imgs/Peliculas/<?php echo $res['Portada']; ?>" class="card-img-top img-carrousel d-block" alt="<?php echo $res['Titulo']; ?>" style="height: 16rem;"></a>
                                    <div class="card-body bg-dark p-2">
                                        <p class="card-text text-center text-white"><small><?php echo $res['Titulo'];?></small></p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } } ?>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#demo_peliculas" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo_peliculas" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
            

            <!--Libros-->
            <div class="titulo p-3 mt-5"><b>Libros recomendados</b></div>

            <div id="demo_libros" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                <?php for($j = 0; $j < 3; $j ++) { 
                    if($j == 0){    
                ?>  
                    <div class="carousel-item active" data-bs-interval="3000">                  
                        <div class="row">
                            <?php for($b = 0; $b < 3; $b ++) { 
                                $row = $libros->fetch();
                            ?>
                            <div class="col-sm-auto">
                                <div class="card" style="width: 12rem; height: 20rem;">
                                    <a href="#"><img src="../../Resources/imgs/Libros/<?php echo $row['Portada']; ?>" class="card-img-top img-carrousel d-block" alt="<?php echo $row['Titulo']; ?>"  style="height: 16rem;"></a>
                                    <div class="card-body bg-dark p-2">
                                        <p class="card-text text-center text-white"><small><?php echo $row['Titulo'];?></small></p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } else{ ?>
                    <div class="carousel-item" data-bs-interval="3000">
                        <div class="row">
                            <?php for($a = 0; $a < 3; $a ++) { 
                                $row = $libros->fetch();
                            ?>
                            <div class="col-sm-auto">
                                <div class="card" style="width: 12rem; height: 20rem;">
                                    <a href="#"><img src="../../Resources/imgs/Libros/<?php echo $row['Portada']; ?>" class="card-img-top img-carrousel d-block" alt="<?php echo $row['Titulo']; ?>" style="height: 16rem;"></a>
                                    <div class="card-body bg-dark p-2">
                                        <p class="card-text text-center text-white"><small><?php echo $row['Titulo'];?></small></p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } } ?>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#demo_libros" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo_libros" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>
<?php 
include '../Templates/footer.php';
?>