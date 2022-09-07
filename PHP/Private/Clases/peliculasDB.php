<?php
    namespace BDD\Tables;

    include_once 'database.php';
    
    use BDD\Database;

    class Peliculas extends Database{

        public function getPelis(){
            $sql = "SELECT *, Generos.Nombre FROM Peliculas INNER JOIN Generos 
                    ON Peliculas.ID_Genero = Generos.ID";
            $stmt = $this->BDDCon->prepare($sql);
            $stmt->execute();

            return $stmt;
        }
    }
?>