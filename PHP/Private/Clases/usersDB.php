<?php
	/* Clase encargada de manipular la tabla de usuarios en la base de datos */
	namespace BDD\Tables;

	include_once 'database.php';

	use BDD\database;
	
	class users extends database
	{
		//Crea un nuevo usuario en la base de datos
		function newUser( $nom,  $email, $pass){
			$sql = "INSERT INTO Usuarios (Nombre, Email, Password) VALUES (:nom, :email, :pass)";

			$stmt =$this->BDDCon->prepare($sql);
			$stmt->execute(array(':nom' => $nom, ':email' => $email, ':pass' => $pass));

			return $stmt;
		}

		//Busca usuario por email y devuelve los datos
		function getUserEmail( $email){ 
			$sql = "SELECT * FROM Usuarios WHERE Email=:email";
			
			$stmt =$this->BDDCon->prepare($sql);
			$stmt->execute(array(':email' => $email));

			return $stmt;
		}
		
		//Busca usuario por nombre y devuleve los datos
		function getUserName( $name){ 
			$sql = "SELECT * FROM Usuarios WHERE Nombre=:nom";
			
			$stmt =$this->BDDCon->prepare($sql);
			$stmt->execute(array(':nom' => $name));

			return $stmt;
		}
	}
?>