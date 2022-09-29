<?php
    namespace BDD\Tables;

    include_once 'database.php';

    use BDD\Database;

    class Replies extends Database{
        /* Consigue las respuestas de una review por su id */
        public function getRepliesReview($id){
            $sql = 'SELECT replies.Comentario, replies.Date, replies.Likes, 
                    replies.Dislikes, usuarios.Nombre, usuarios.Avatar FROM 
                    replies INNER JOIN usuarios ON replies.Usuario_ID = 
                    usuarios.ID WHERE Review_ID = :id';

            $stmt = $this->BDDCon->prepare($sql);
            $stmt->execute(array(':id' => $id));

            return $stmt;
        }
    }
    
?>