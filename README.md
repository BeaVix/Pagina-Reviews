# Pagina-Reviews
Pagina de reviews de peliculas/libros para la clase del profe Alex.
## Despues de descargar:
 Para que la pagina funcione necesita que su computadora tenga un servidor local corriendo, xampp recomendado, y una base de datos especificamente para la  pagina.<br>
 Una vez que tenga el servidor y la base de datos, es necesario crear un directorio en el root del proyecto llamado <code>Config</code> y un archivo dentro de el llamado <code>BDD_Config.php</code> nos quedaria como <code>Config/BDD_Config.php</code><br>
 Dentro del archivio <code>BDD_Config.php</code> debe estar este codigo, con los [ ] representando datos correspondientes a su servidor y base de datos.
 
 ```
<?php 
    define("BDDNombre", '[Nombre de la base de datos]'); 
    define("BDDServer", '[Nombre del servidor]');
    define("BDDUser", '[Nombre del usuario de la base de datos]');
    define('BDDPass', '[Contraseña correspondiente a el usuario]');
?> 
```

## Configuración de la base de datos:
Para el funcionamiento de la base de datos, importe el siguiente archivo a su base de datos <code>IMPORT-TO-DATABASE/ReviewsBD.sql</code><br>
Se encargara de importar todas las tablas necesarias y unas peliculas y libros de muestra. Por defecto el unico usuario es el anonimo.
