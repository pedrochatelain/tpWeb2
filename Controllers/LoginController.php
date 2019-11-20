<?php
require_once "./Models/UserModel.php";
require_once "./Views/LoginView.php";
require_once "./helpers/auth.helper.php";

class LoginController {
    private $model;
    private $view;
    private $authHelper;

    function __construct() {
        $this->view = new LoginView();
        $this->model = new UserModel();
        $this->authHelper = new AuthHelper();
    }

    public function showLogin() {
        $this->view->showLogin();
    }

    public function verifyUser() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = $this->model->getByUsername($username);
        // encontró un user con el username que mandó, y tiene la misma contraseña
        if (!empty($user) && password_verify($password, $user->password)) {
            $this->authHelper->login($user);
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showLogin("Login incorrecto");
        }
    }

    public function verifyGuest() {
        $username = $_POST['invitado'];
        $user = $this->model->getByUsername($username);
        if (!empty($user)) {
            $this->authHelper->login($user);
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showLogin("Login incorrecto");
        }
    }

    public function logout() {
        $this->authHelper->logout();
        header('Location: ' . LOGIN);
    }
}
?>