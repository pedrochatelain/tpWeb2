<?php
require_once "./Models/PlatosModel.php";
require_once "./Models/CategoriasModel.php";
require_once "./Models/ComentariosModel.php";
require_once "./Models/ImageModel.php";
require_once "./helpers/auth.helper.php";
require_once "./Views/PlatosView.php";

class PlatosController {
    private $model;
    private $model_categoria;
    private $model_comentarios;
    private $model_images;
    private $user;
    private $view;

    function __construct() {
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        $this->user = $authHelper->getLoggedUser();
        $this->model = new PlatosModel();
        $this->model_categoria = new CategoriasModel();
        $this->model_comentarios = new ComentariosModel();
        $this->model_images = new ImageModel();
        $this->view = new PlatosView();
    }

    public function getPlatos() {
        $platos = $this->model->getPlatos();
        $categorias = $this->model_categoria->getCategorias();
        $this->view->displayPlatos($platos, $categorias);
    }

    public function addPlato() {
        $nombre = strtoupper($_POST['nombre']);
        $vegetariano = strtoupper($_POST['vegetariano']);
        $tacc = strtoupper($_POST['tacc']);
        $vegano = strtoupper($_POST['vegano']);
        $precio = $_POST['precio'];
        $id_categoria = $_POST['id_categoria'];
        if ($this->user->administrador == 1) {
            if($precio > 0 && !empty($nombre)) {
                $this->model->addPlato($nombre, $vegetariano, $tacc, $vegano, $precio, $id_categoria);
                header("Location: " . BASE_URL);
            } else {
                $this->view->showError(
                    "ERROR: Usted intentó agregar un plato con un precio menor a 0
                    o con un nombre sin definir");
            }
        }
    }

    public function displayPlato($params = null) {
        $id_plato = $params[':ID_PLATO'];
        $plato = $this->model->get($id_plato);
        $categorias = $this->model_categoria->getCategorias();
        $images = $this->model_images->getImages($id_plato);
        $comentarios = $this->model_comentarios->getComentarios($id_plato);
        $prom_puntuacion = $this->model_comentarios->getPromPuntuacion($id_plato);
        // si existe el plato...
        if ($plato) {
            $this->view->displayPlato($plato, $categorias, $images, $comentarios, $prom_puntuacion);
        }
        else
            $this->view->showError('El plato no existe');
    }

    public function editarPlato($params = null) {
        $id_plato = $params[':ID'];
        $nombre = strtoupper($_POST['nombre']);
        $vegetariano = strtoupper($_POST['vegetariano']);
        $tacc = strtoupper($_POST['tacc']);
        $vegano = strtoupper($_POST['vegano']);
        $precio = $_POST['precio'];
        $id_categoria = $_POST['id_categoria'];
        if ($this->user->administrador == 1) {
            $this->model->editarPlato($id_plato,$nombre,$vegetariano,$tacc,$vegano,$precio,$id_categoria);
        }
        header("Location: " . BASE_URL . "platos/" . $id_plato);
    }

    public function deletePlato($params = null) {
        $id_plato = $params[':ID'];
        // si es administrador...
        if ($this->user->administrador == 1) {
            $this->model_images->deleteImages($id_plato);
            $this->model_comentarios->deleteComentarios($id_plato);
            $this->model->deletePlato($id_plato);
        }
        header("Location: " . BASE_URL);
    }
}
