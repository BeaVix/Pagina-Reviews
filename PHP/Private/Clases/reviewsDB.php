<?php 
    namespace BDD\Tables;

    include_once 'database.php';

    use BDD\Database;

    class Reviews extends Database{

        public function addReview($modo, array $datos){
            if(!$modo){
                $stmt = $this->BDDCon->prepare("INSERT INTO reviews (Pelicula_ID, Usuario_ID, Comentario, Cant_Estrellas, `Date`, Likes, Dislikes) VALUES (?, ?, ?, ?, ?, 0, 0)");
            } else {
                $stmt = $this->BDDCon->prepare("INSERT INTO reviews (Libro_ID, Usuario_ID, Comentario, Cant_Estrellas, `Date`, Likes, Dislikes) VALUES (?, ?, ?, ?, ?, 0, 0)");
            }
            $stmt->execute($datos);
            return $stmt;
        }
        
        public function getUserReview($id){
            $sql = "SELECT *, usuarios.Nombre FROM reviews INNER JOIN usuarios 
                    ON reviews.Usuario_ID = usuarios.ID WHERE Usuario_ID = :id";
            $stmt = $this->BDDCon->prepare($sql);
            $stmt->execute(array(':id' => $id));

            return $stmt;
        }

        public function getReviewsPelis($id){
            $sql = "SELECT *, usuarios.Nombre FROM reviews INNER JOIN usuarios 
                    ON reviews.Usuario_ID = usuarios.ID WHERE Pelicula_ID = :id";
            $stmt = $this->BDDCon->prepare($sql);
            $stmt->execute(array(':id' => $id));

            return $stmt;
        }

        public function getReviewsLibros($id){
            $sql = "SELECT *, usuarios.Nombre FROM reviews INNER JOIN usuarios 
                    ON reviews.Usuario_ID = usuarios.ID WHERE Libro_ID = :id";
            $stmt = $this->BDDCon->prepare($sql);
            $stmt->execute(array(':id' => $id));
            
            return $stmt;
        }
    }
?>
