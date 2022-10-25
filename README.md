# Pagina-Reviews

**Estas leyendo la sección en ingles, para ver la sección en español haz click [aquí](#español)**<br>

**Disclaimer:** This page was made primarly for a spanish speaking audience, as a result, the page itself will be mostly if not entirely in spanish. No translation will be provided, as it is outside of the scope of this project.
<hr>

A page to make movie and book reviews. Done for the class of the Professor [Alex](https://github.com/bloome-alex). <br>

Features user registration, login, profile customization, review posting, comment posting, reply posting, and some other functions.

# Setup:
**A local server ([Xampp](https://www.apachefriends.org/index.html) recommended) and database must be running for the site to function properly.**<br>

Make a directory inside the project root called <code>Config</code> and a file inside with the name <code>BDD_Config.php</code><br>

Inside the file must be the following code:

 ```
<?php 
    define("BDDNombre", '[Name of the database]'); 
    define("BDDServer", '[Name of the server]'); // In most cases this will be localhost
    define("BDDUser", '[Database user name]');
    define('BDDPass', '[Database user password]');
?> 
```

## Database setup:
Import file inside <code>IMPORT-TO-DATABASE</code> to the database to create all the required tables.

<hr>

# Español:

Pagina para hacer reviews de peliculas y libros. Hecho para la clase del profe [Alex](https://github.com/bloome-alex). <br>

Cuenta con registro de usuarios, logueo, personalización de perfil, posteo de reviews, posteo de comentarios, posteo de respuestas y demás funciones.

## Despues de descargar:
 **Es necesario un servidor local (se recomienda [Xampp](https://www.apachefriends.org/es/index.html)) y una base de datos para el funcionamiento apropiado de la pagina.**<br>
 
 Crear un directorio dentro del root del proyecto llamado <code>Config</code> y un archivo dentro de el llamado <code>BDD_Config.php</code><br>
 
 Dentro del archivio debe estar el siguiente código:
 
 ```
<?php 
    define("BDDNombre", '[Nombre de la base de datos]'); 
    define("BDDServer", '[Nombre del servidor]'); // En la mayoria de los casos esto sera localhost
    define("BDDUser", '[Nombre del usuario de la base de datos]');
    define('BDDPass', '[Contraseña correspondiente a el usuario]');
?> 
```

## Configuración de la base de datos:
Importe archivo dentro de  <code>IMPORT-TO-DATABASE</code> a la base de datos para crear las tablas necesarias.
