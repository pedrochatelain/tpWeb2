<?php
require_once "./Models/ComentariosModel.php";
require_once "./helpers/auth.helper.php";

class ComentariosController {
    private $model;
    private $user;

	function __construct(){
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();        
        $this->user = $authHelper->getLoggedUser();
        $this->model = new ComentariosModel();
    }
    
    public function addComentario($params = []) {
        $usuario = $_POST['username'];
        $mensaje = $_POST['mensaje'];
        $puntuacion = $_POST['puntuacion'];
        $id_plato = $params[':ID_PLATO'];
        if ($puntuacion > 0 && $puntuacion <= 5) {
            $this->model->addComentario($usuario, $mensaje, $puntuacion, $id_plato);
        }
        header("Location: " . BASE_URL . "platos/" . $id_plato);
    }
}
?>
