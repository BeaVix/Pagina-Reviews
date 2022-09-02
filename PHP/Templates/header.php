<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="../../CSS/style.css" type=" text/css" rel='stylesheet'>
    <title>Entretaniment View</title>
</head>
<body>

    <div class="navbar" id="nav">
        <img src="" alt="Logo">
        <div class="navMenu">
            <a href="#">Inicio</a>
            <a href="#">Peliculas</a>
            <a href="#">Libros</a>
        </div>
        <div class="navLogin">
            <a href="#" onclick="openLoginForm();">Iniciar Sesión</a>
            <!--FORMULARIO DE INICIO DE SESION-->
            <div class="form-popup" id="loginForm">
                <form action="../Private/loginAuth.php" method="POST" class="form-container">
                    <h1>Iniciar Sesión</h1>
                    <div class="grid-container">
                        <div class="form-group">
                            <label for="email"><b>Email o Nombre de usuario</b></label>
                            <input type="text" name="user" placeholder="ingrese el Email">

                            <label for="psw"><b>Contraseña</b></label>
                            <input type="password" name="psw" placeholder="ingrese la contraseña">
                            <div class="formBtn">
                                <button type="submit" class="btn">Ingresar</button>
                                <button type="button" class="btn cancel" onclick="closeLoginForm();">Cancelar</button>
                            </div>
                        </div>
                        <div class="form-group rigth">
                            <div>
                                <input type="submit" name="anon" class="btn User" value="Ingresar Anonimamente">
                            </div>
                            <div>
                                <p>Si aun no posee una cuenta puede <button type="button" class="btn Register" onclick="openRegisterForm();">Registrarse aquí.</button></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!--FORMULARIO DE REGISTRO
            <div class="form-popup" id="registerForm">
                <form action="#" class="form-container">
                    <h1>Registrarse</h1>

                    <label for="email"><b>Nombre de usuario</b></label>
                    <input type="text" name="nombre" placeholder="ingrese el Email" required>

                    <label for="email"><b>Email</b></label>
                    <input type="email" name="email" placeholder="ingrese el Email" required>

                    <label for="psw"><b>Contraseña</b></label>
                    <input type="password" name="psw" placeholder="ingrese la contraseña" required>
                    <div class="formBtn">
                        <button type="submit" class="btn">Ingresar</button>
                        <button type="button" class="btn cancel" onclick="closeRegisterForm();">Cancelar</button>
                    </div>
                </form>
            </div>
            <a href="javascript:void(0);" class="icon" onclick="menuResponsive();">
            <i class='bx bx-menu'></i>
            </a>
        </div>-->
    </div>


    <script src="../../JS/main.js"></script>
