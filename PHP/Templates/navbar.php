<?php 
    include_once '../Private/Clases/session.php';

    use userSession\Session;

    $sess = new Session();
    $loggedIn = $sess->loggedIn;
?>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="../../Resources/imgs/logo.png" alt="Logo" width="150" height="150" class="d-inline-block align-text-top"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
            </div>
              <!--FORMULARIO DE INGRESO-->
                    <?php
                        if (!$loggedIn) {

                    ?>
                    <li class="nav-item d-flex me-1 dropdown">
                    <a class="nav-link" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">Iniciar Sesión</a>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li>
                                <form class="dropdown-item form-container" id="form-iniciar-sesion">
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
                                                <button type="button" class="btn User" id="anon-btn" onclick="anonSignIn();">Ingresar Anonimamente</button>
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
</nav>
<!--FORMULARIO DE REGISTRO-->
<div class="modal">
    <div class="modal-content">
        <form action="#" class="form-container" id="form-registrarse">
            <h1>Registrarse</h1>

            <label for="nombre">Nombre de usuario</label>
            <input type="text" name="nombre" placeholder="ingrese el nombre de usuario">

            <label for="email">Email</label>
            <input type="email" name="email" placeholder="ingrese el Email">
            <label for="psw">Contraseña</label>
            <input type="password" name="psw" placeholder="ingrese la contraseña">

            <div class="formBtn">
                <button type="button" class="btn success" onclick="signUp();">Registrarse</button>
                <button type="button" class="btn cancel" onclick="closeModal();">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<script src="../../JS/main.js"></script>
<script src="../../JS/AJAX.js"></script>