<?php
    namespace BDD\Tables;

    include_once 'database.php';
    
    use BDD\Database;

    class Peliculas extends Database{

        public function getPelis(){
            $sql = "SELECT *, generos.Nombre FROM peliculas INNER JOIN generos 
                    ON peliculas.ID_Genero = generos.ID";
            $stmt = $this->BDDCon->prepare($sql);
            $stmt->execute();

            return $stmt;
        }
    }
?>