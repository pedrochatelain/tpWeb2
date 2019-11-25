<?php
require_once "./views/SignInView.php";
require_once "./models/UserModel.php";
require_once "./helpers/auth.helper.php";

class SignInController {
    private $view;
    private $model;
    private $authHelper;

    public function __construct() {
        $this->view = new SignInView();
        $this->model = new UserModel();
        $this->authHelper = new AuthHelper();
    }

    public function showSignIn() {
        $this->view->showSignIn();
    }
    
    public function registrarUser() {
        $username = $_POST['user'];
        $password = $_POST['password'];
        $repeated_pass = $_POST['repeated_password'];
        if (!empty($username) && !empty($password) && !empty($repeated_pass) && ($password == $repeated_pass)) {
            if ( ! $this->model->isTaken($username)) {
                $this->model->addUser($username, $password);
                $user = $this->model->getByUsername($username);
                $this->authHelper->login($user);
                header('Location: ' . BASE_URL);
            }else {
                $this->view->showSignIn("Error al registrar. Ya existe un usuario con ese nombre.");
            }
        }else {
            $this->view->showSignIn("Error al registrar. Revise los campos correctamente.");
        }
    }
}
