<?php
require_once "./Models/ImageModel.php";
require_once "./helpers/auth.helper.php";

class ImageController {
    private $model;
    private $user;

    function __construct(){
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();        
        $this->model = new ImageModel();
        $this->user = $authHelper->getLoggedUser();
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
        } else {
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
            unlink('images/platos/' . $image_name . '');
            // 3. Borro la imagen de la base de datos
            $this->model->deleteImage($id_image);
        }
        header("Location: " . BASE_URL . "platos/" . $id_plato);
    }
}
