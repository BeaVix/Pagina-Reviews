<?php 
    namespace BDD\Tables;

    include_once 'database.php';

    use BDD\Database;

    class Reviews extends Database{

        public function getReviewsPelis($id){
            $sql = "SELECT *, usuarios.Nombre FROM reviews INNER JOIN usuarios 
                    ON reviews.Usuario_ID = usuarios.ID WHERE Pelicula_ID=$id";
            $stmt = $this->BDDCon->prepare($sql);
            $stmt->execute();

            return $stmt;
        }

        public function getReviewsLibros($id){
            $sql = "SELECT *, usuarios.Nombre FROM reviews INNER JOIN usuarios 
                    ON reviews.Usuario_ID = usuarios.ID WHERE Libro_ID=$id";
            $stmt = $this->BDDCon->prepare($sql);
            $stmt->execute();
            
            return $stmt;
        }
    }
?>