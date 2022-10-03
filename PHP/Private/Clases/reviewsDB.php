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

        public function getReviews(){
            $sql = "SELECT reviews.*, usuarios.Nombre, usuarios.Avatar, 
                    peliculas.Titulo AS pelicula_Titulo, peliculas.Portada 
                    AS pelicula_Portada, libros.Titulo AS libro_Titulo, libros.Portada AS libro_Portada FROM reviews 
                    INNER JOIN usuarios ON reviews.Usuario_ID = usuarios.ID 
                    LEFT JOIN peliculas ON reviews.Pelicula_ID = peliculas.ID
                    LEFT JOIN libros ON reviews.Libro_ID = libros.ID
                    ORDER BY reviews.Date DESC";
            $stmt = $this->BDDCon->prepare($sql);
            $stmt->execute();

            return $stmt;
        }

        public function getUserReview($id){
            $sql = "SELECT reviews.*, usuarios.Nombre, usuarios.Avatar, peliculas.Titulo AS pelicula_Titulo, 
                    peliculas.Portada AS pelicula_Portada, libros.Titulo 
                    AS libro_Titulo, libros.Portada AS libro_Portada FROM reviews 
                    INNER JOIN usuarios ON reviews.Usuario_ID = usuarios.ID 
                    LEFT JOIN peliculas ON reviews.Pelicula_ID = peliculas.ID
                    LEFT JOIN libros ON reviews.Libro_ID = libros.ID WHERE reviews.Usuario_ID = :id
                    ORDER BY reviews.Date DESC";
            $stmt = $this->BDDCon->prepare($sql);
            $stmt->execute(array(':id' => $id));

            return $stmt;
        }

        public function getReviewsPelis($id){
            $sql = "SELECT reviews.*, usuarios.Nombre, usuarios.Avatar FROM reviews INNER JOIN usuarios 
                    ON reviews.Usuario_ID = usuarios.ID WHERE Pelicula_ID = :id";
            $stmt = $this->BDDCon->prepare($sql);
            $stmt->execute(array(':id' => $id));

            return $stmt;
        }

        public function getReviewsLibros($id){
            $sql = "SELECT reviews.*, usuarios.Nombre, usuarios.Avatar FROM reviews INNER JOIN usuarios 
                    ON reviews.Usuario_ID = usuarios.ID WHERE Libro_ID = :id";
            $stmt = $this->BDDCon->prepare($sql);
            $stmt->execute(array(':id' => $id));
            
            return $stmt;
        }

        public function deleteReviews($id){
            $sql = "DELETE FROM reviews WHERE ID = :id";
            $stmt = $this->BDDCon->prepare($sql);
            $stmt->execute(array(':id' => $id));
    
            return $stmt;
        }
    }
?>