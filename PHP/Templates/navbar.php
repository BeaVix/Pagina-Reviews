<?php 
    include_once '../Private/Clases/session.php';

    use userSession\Session;

    $sess = new Session();
    $loggedIn = $sess->loggedIn;
?>


<div class="container-fluid">
    <img class="navbar-brand" src="../../Resources/imgs/logo_transparent.png" alt="Logo">

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Public/peliculas.php">Peliculas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Public/libros.php">Libros</a>
                </li>
    </div>  <!--FORMULARIO DE INGRESO-->
            <?php
                if (!$loggedIn) {

            ?>
            <li class="nav-item d-flex dropdown">
                <a class="nav-link" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">Iniciar Sesión</a>
                <ul class="dropdown-menu dropdown-menu-lg-end">
                    <li>
                        <form class="dropdown-item form-container" action="../Private/loginAuth.php" method="POST">
                            <h1>Iniciar Sesión</h1>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="email">Email o Nombre de usuario</label><br>
                                        <input type="text" name="user" id="email" placeholder="ingrese el Email"><br>

                                        <label for="psw">Contraseña</label><br>
                                        <input type="password" name="psw" id="psw" placeholder="ingrese la contraseña">
                                    </div>
                                        <div class="formBtn">
                                            <button type="button" class="btn success" id="nav-login" onclick="signIn();">Ingresar</button>
                                            <button type="button" class="btn cancel" onclick="limpiarForm();" >Cancelar</button>
                                        </div>
                                        <span id="login-form-error" class="d-none">*Nombre de usuario y/o contraseña incorrectos</span>
                                </div>
                                <div class="col-sm-6 rigth text-center">
                                    <div class="mt-5">
                                        <button class="btn User" id="anon-btn">Ingresar Anonimamente</button>
                                        <p class="text-center">ó<p>
                                        <button type="button" class="btn signin" onclick="openModal();">Registrarse</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </li>
            <?php 
            }else{
                include 'userProfileBtn.php';
            } 
            ?>
        </ul>
</div>
<a href="javascript:void(0);" class="icon" onclick="menuResponsive();"><i class='bx bx-menu'></i></a>

<!--FORMULARIO DE REGISTRO-->
<div class="modal">
    <div class="modal-content">
        <form action="#" class="form-container">
            <h1>Registrarse</h1>

            <label for="nombre">Nombre de usuario</label>
            <input type="text" name="nombre" placeholder="ingrese el nombre de usuario">

            <label for="email">Email</label>
            <input type="email" name="email" placeholder="ingrese el Email">
            <label for="psw">Contraseña</label>
            <input type="password" name="psw" placeholder="ingrese la contraseña">

            <div class="formBtn">
                <button type="submit" class="btn success">Registrarse</button>
                <button type="button" class="btn cancel" onclick="closeModal();">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<script src="../../JS/main.js"></script>
<script src="../../JS/AJAX.js"></script>