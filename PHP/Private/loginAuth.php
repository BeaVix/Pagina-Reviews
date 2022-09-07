<?php
	// Verifica los datos mandados por el formulario de login
	include_once 'Clases/usersDB.php';
	include_once 'Clases/session.php';

	use PDO;
	use BDD\Tables\users;
	use userSession\session;

	if(isset($_POST['anon'])){
		$sess = new session();
		$sess->anonLogin();
		echo('1');
	}else{

		$email = $_POST['user'];
		$pass = $_POST['psw'];

		$email = filter_var($email, FILTER_SANITIZE_EMAIL);

		$db = new users();
		$query = $db->getUserEmail($email);

		if(loginVeirfy($query, $email, $pass)){
			echo('1');
		}else{
			$query = $db->getUserName($email);
			if(loginVeirfy($query, $email, $pass)){
				echo('1');
			} else{
				echo('0');
			}
		}
	}

	function loginVeirfy($query, $email, $pass){
		if($query->rowCount() > 0){
			$data = $query->fetch(PDO::FETCH_ASSOC);
			$hash = $data['Password'];
			if(password_verify($pass, $hash)){
				$email = $data['Email'];
				$nom = $data['Nombre'];
				$sess = new session();
				$sess->login($nom, $email);
				return true;
			} else{
				return false;
			}
		} else{
			return false;
		}
	}
?>