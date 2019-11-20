<?php
require_once "./Models/UserModel.php";
require_once "./Views/UsersView.php";
require_once "./helpers/auth.helper.php";

class UsersController {
    private $model;
    private $view;
    private $user;

    function __construct() {
        // barrera para usuario logueado
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();

        $this->user = $authHelper->getLoggedUser();
        $this->model = new UserModel();
        $this->view = new UsersView();
    }

    public function getUsuarios() {
        $users = $this->model->getUsuarios();
        if ($this->user->administrador == 1) {
            $this->view->displayUsuarios($users);
        }else {
            header("Location: " . BASE_URL);
        }
    }

    public function displayUser($params = null) {
        $id_user = $params[':ID'];
        $user = $this->model->getUser($id_user);
        // si existe el usuario...
        if ($user)
            $this->view->displayUser($user);
        else
            $this->view->showError('El usuario no existe');
    }

    public function editarUsuario($params = null) {
        $id_user = $params[':ID'];
        $admin = $_POST['admin'];
        if ($this->user->administrador == 1) {
            $this->model->editarPlato($id_user, $admin);
        }
        header("Location: " . USUARIOS . "/" . $id_user);
    }

    public function deleteUser($params = null) {
        $id_user = $params[':ID'];
        // si es administrador...
        if ($this->user->administrador == 1) {
            $this->model->deleteUser($id_user);
        }
        header("Location: " . USUARIOS);
    }
}
