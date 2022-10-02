<?php

    namespace BDD\Tables;

    include_once 'database.php';

    use BDD\Database;

    class Replies extends Database {

        public function addReplies(array $datos){
            $stmt = $this->BDDCon->prepare("INSERT INTO replies (Usuario_ID, Review_ID, Comentario, Date, Likes, Dislikes) VALUES (?, ?, ?, ?, 0, 0)");
            $stmt->execute($datos);
            return $stmt;
        }

        public function getReplies(){
            $sql = "SELECT *, usuarios.Nombre FROM replies INNER JOIN usuarios ON replies.Usuario_ID = usuarios.ID ORDER BY replies.Date DESC";
            $stmt = $this->BDDCon->prepare($sql);
            $stmt->execute();

            return $stmt;
        }

        public function getRepliesReview($id){
            $sql = "SELECT *, usuarios.Nombre FROM replies INNER JOIN usuarios ON replies.Usuario_ID = usuarios.ID 
                    WHERE replies.User_ID = :id ORDER BY replies.Date DESC";
            $stmt = $this->BDDCon->prepare($sql);
            $stmt->execute(array(':id' => $id));

            return $stmt;
        }
    }

?>