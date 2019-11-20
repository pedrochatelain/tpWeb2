<?php
require_once "./Models/PlatosModel.php";
require_once "./Models/CategoriasModel.php";
require_once "./Models/ComentariosModel.php";
require_once "./Views/PlatosView.php";
require_once "./helpers/auth.helper.php";

class PlatosController {
    private $model;
    private $view;
    private $model_categoria;
    private $user;
    private $comentarios_model;

    function __construct() {
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        $this->user = $authHelper->getLoggedUser();
        $this->model = new PlatosModel();
        $this->view = new PlatosView();
        $this->comentarios_model = new ComentariosModel();
        $this->model_categoria = new CategoriasModel();
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
            $this->model->addPlato($nombre, $vegetariano, $tacc, $vegano, $precio, $id_categoria);
        }
        header("Location: " . BASE_URL);
    }

    public function displayPlato($params = null) {
        $id_plato = $params[':ID_PLATO'];
        $plato = $this->model->get($id_plato);
        $categorias = $this->model_categoria->getCategorias();
        $images = $this->model->getImages($id_plato);
        $comentarios = $this->comentarios_model->getComentarios($id_plato);
        // si existe el plato...
        if ($plato) {
            $this->view->displayPlato($plato, $categorias, $images, $comentarios);
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
        $idPlato = $params[':ID'];
        // si es administrador...
        if ($this->user->administrador == 1) {
            $this->model->deletePlato($idPlato);
        }
        header("Location: " . BASE_URL);
    }

    public function addImage($params = null) {
        // tomo el id del plato
        $idPlato = $params[':ID'];
        // tomo el nombre de la imagen
        $image = $_FILES['image']['name'];
        // tomo la direccion donde van las imagenes
        $target = "images/platos/" . basename($image);
        // muevo la imagen a la carpeta "images"
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        }
        if ($this->user->administrador == 1) {
            $this->model->addImage($image, $idPlato);
        }
        header("Location: " . BASE_URL . "platos/" . $idPlato);
    }
    
    public function deleteImage($params = null) {
        $id_image = $params[':ID'];
        /**
         * obtengo el id del plato del cual se quiere borrar la imagen
         * para redirigirme a esa url luego del borrado
         */
        $id_plato = $this->model->getIdPlatoImage($id_image);
        if ($this->user->administrador == 1) {
            // 1. Obtengo el nombre de la imagen
            $image_name = $this->model->getImageName($id_image);
            // 2. Borro la imagen de la carpeta donde se alojan las imagenes subidas
            unlink('images/platos/'.$image_name.'');
            // 3. Borro la imagen de la base de datos
            $this->model->deleteImage($id_image);
        }
        header("Location: " . BASE_URL . "platos/" . $id_plato);
    }
}
