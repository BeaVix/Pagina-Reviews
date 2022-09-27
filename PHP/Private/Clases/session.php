<?php
    /* Clase encargada de la manipulación de la variable $_SESSION */
    namespace userSession;

    class Session{

        public $loggedIn;
        public $userEmail;
        public $userName;
        public $userAvatar;
        public $anon; //Si el usuario inicio sesión de forma anonima
        public $userId;

        function __construct(){
            session_start();
            /*Si ya existe una sesión activa, automaticamente se guardan las variables
              al crearse el objeto*/
            if(isset($_SESSION['loggedIn']) && isset($_SESSION['anon']) && $_SESSION['anon'] == false){ //Usuario inicio sesion y no es anonimo
                $this->loggedIn = $_SESSION['loggedIn'];
                $this->anon = false;
                $this->userName = $_SESSION['username'];
                $this->userEmail = $_SESSION['email'];
                $this->userAvatar = $_SESSION['avatar'];
                $this->userId = $_SESSION['userId'];
            } elseif (isset($_SESSION['anon']) && $_SESSION['anon'] == true){ //Usuario inicio sesion y es anonimo
                $this->loggedIn = $_SESSION['loggedIn'];
                $this->anon = true;
            }
        }

        /* Iniciar sesión con email */
        public function login(String $name, String $email, $avatar, $userId){
            $this->loggedIn = $_SESSION['loggedIn'] = true;
            $this->anon = $_SESSION['anon'] = false;
            $this->userName = $_SESSION['username'] = $name;
            $this->userEmail = $_SESSION['email'] = $email;
            $this->userAvatar = $_SESSION['avatar'] = $avatar;
            $this->userId = $_SESSION['userId'] = $userId;
        }

        /* Iniciar sesión de forma anonima */
        public function anonLogin(){
            $this->loggedIn = $_SESSION['loggedIn'] = true;
            $this->anon = $_SESSION['anon'] =  true;
        }

        public function closeSession(){
            session_destroy();
        }
    }

?>