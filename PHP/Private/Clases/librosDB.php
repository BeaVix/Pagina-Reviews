<?php
    namespace BDD\Tables;

    include_once 'database.php';
    
    use BDD\Database;

    class Libros extends Database{

        public function getLibros(){
            $sql = "SELECT *, generos.Nombre FROM libros INNER JOIN generos 
                    ON libros.ID_Genero = generos.ID";
            $stmt = $this->BDDCon->prepare($sql);
            $stmt->execute();

            return $stmt;
        }
    }
?>