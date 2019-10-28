<?php
require_once('./models/UserModel.php');

class AuthHelper {

    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    public function login($user) {
        // INICIO LA SESSION Y LOGUEO AL USUARIO
        session_start();
        $_SESSION['ID_USER'] = $user->id_usuario;
        $_SESSION['USERNAME'] = $user->username;
        $_SESSION['ADMIN'] = $user->administrador;
    }

    public function logout() {
        session_start();
        session_destroy();
    }

    public function checkLoggedIn() {
        session_start();
        if (!isset($_SESSION['ID_USER'])) {
            header('Location: ' . LOGIN);
            die();
        }       
    }

    public function getLoggedUser() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        return $this->model->getByUsername($_SESSION['USERNAME']);
    }

}