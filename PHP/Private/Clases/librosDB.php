<?php
    namespace BDD\Tables;

    include_once 'database.php';
    
    use BDD\Database;

    class Libros extends Database{

        public function getLibros(){
            $sql = "SELECT *, Generos.Nombre FROM Libros INNER JOIN Generos 
                    ON Libros.ID_Genero = Generos.ID";
            $stmt = $this->BDDCon->prepare($sql);
            $stmt->execute();

            return $stmt;
        }
    }
?>