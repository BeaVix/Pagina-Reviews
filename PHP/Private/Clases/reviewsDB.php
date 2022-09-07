<?php 
    namespace BDD\Tables;

    include_once 'database.php';

    use BDD\Database;

    class Reviews extends Database{

        public function getReviewsPelis($id){
            $sql = "SELECT *, Usuarios.Nombre FROM Reviews INNER JOIN Usuarios 
                    ON Rviews.Usuario_ID = Usuarios.ID WHERE Pelicula_ID=$id";
            $stmt = $this->BDDCon->prepare($sql);
            $stmt->execute();

            return $stmt;
        }

        public function getReviewsLibros($id){
            $sql = "SELECT *, Usuarios.Nombre FROM Reviews INNER JOIN Usuarios 
                    ON Reviews.Usuario_ID = Usuarios.ID WHERE Libro_ID=$id";
            $stmt = $this->BDDCon->prepare($sql);
            $stmt->execute();
            
            return $stmt;
        }
    }
?>