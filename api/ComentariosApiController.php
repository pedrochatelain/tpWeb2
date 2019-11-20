<?php
require_once("./Models/ComentariosModel.php");
require_once("./api/ApiController.php");
require_once("./api/JSONView.php");

class ComentariosApiController extends ApiController{
  
    public function getComentarios($params = []) {
        $id_plato = $params[':ID_PLATO'];
        $comentarios = $this->model->getComentarios($id_plato);
        $this->view->response($comentarios, 200);
    }

    public function deleteComentario($params = []) {
        $id_comentario = $params[':ID_COMENTARIO'];
        $comentario = $this->model->getComentario($id_comentario);

        if ($comentario) {
            $this->model->deleteComentario($id_comentario);
            $this->view->response("Comentario id=$id_comentario eliminado con éxito", 200);
        }
        else 
            $this->view->response("Comentario id=$id_comentario not found", 404);
    }

   public function addComentario($params = []) {     
        $comentario = $this->getData(); // lo obtengo del body

        // inserto el comentario y obtengo su id
        $id_comentario = $this->model->addComentario($comentario->usuario, $comentario->mensaje, $comentario->puntuacion, $comentario->id_plato, 0);

        // obtengo el recien creado
        $comentarioNuevo = $this->model->getComentario($id_comentario);
        
        if ($comentarioNuevo)
            $this->view->response($comentarioNuevo, 200);
        else
            $this->view->response("Error al insertar tarea", 500);
    }
}