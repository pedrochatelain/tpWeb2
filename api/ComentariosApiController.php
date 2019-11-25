<?php
require_once "./Models/ComentariosModel.php";
require_once "./Models/UserModel.php";

require_once "./api/ApiController.php";
require_once "./api/JSONView.php";
require_once "./helpers/auth.helper.php";

class ComentariosApiController extends ApiController {
    private $user;
    private $user_model;

    public function __construct() {
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();        
        parent::__construct();
        $this->model = new ComentariosModel();
        $this->user_model = new UserModel();
        $this->user = $authHelper->getLoggedUser();
    }
  
    public function getComentarios($params = []) {
        $id_plato = $params[':ID_PLATO'];
        $comentarios = $this->model->getComentarios($id_plato);
        $this->view->response($comentarios, 200);
    }

    public function getUsuario() {
        $user = $this->user;
        $this->view->response($user, 200);
    }

    public function deleteComentario($params = null) {
        $id_comentario = $params[':ID_COMENTARIO'];
        $comentario = $this->model->getComentario($id_comentario);
        if ($comentario) {
            if ($this->user->administrador == 1) {
                $this->model->deleteComentario($id_comentario);
                $this->view->response("Comentario id=$id_comentario eliminado con éxito", 200);
            }
        }
        else 
            $this->view->response("Comentario id=$id_comentario not found", 404);
    }

   public function addComentario($params = []) {     
        $body = $this->getData(); // lo obtengo del body
        $usuario = $body->usuario;
        $mensaje = $body->mensaje;
        $puntuacion = $body->puntuacion;
        $id_plato = $body->id_plato;
        // por si el usuario no ingresó ninguna de las puntuaciones válidas
        if ($this->user->username != "guest") {
            if ($puntuacion > 0) {
                $this->model->addComentario($usuario, $mensaje, $puntuacion, $id_plato);
            }
        }
    }
}