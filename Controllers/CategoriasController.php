<?php
require_once "./Models/CategoriasModel.php";
require_once "./Views/CategoriasView.php";
include_once('helpers/auth.helper.php');


class CategoriasController {

    private $model;
    private $view;
    private $user;

	function __construct(){

        // barrera para usuario logueado
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        
        $this->user = $authHelper->getLoggedUser();
        $this->model = new CategoriasModel();
        $this->view = new CategoriasView();
    }
    
    public function getCategorias(){
        $categorias = $this->model->getCategorias();
        $this->view->displayCategorias($categorias);
    }

    public function addCategoria(){
        $tipo = strtoupper($_POST['tipo']);
        $descripcion =  strtoupper($_POST['descripcion']);

        if ($this->user->administrador == 1) {
            $this->model->addCategoria($tipo, $descripcion);
        }

        header("Location: " . CATEGORIAS);
    }

    public function displayCategoria($params = null) {
        $idCategoria = $params[':ID'];
        $categoria = $this->model->getCategoria($idCategoria);

        if ($categoria)
            $this->view->displayCategoria($categoria);
        else
            $this->view->showError('La categoria no existe');
    }

    public function editarCategoria($params = null) {
        /*
            Dado un id, creo las variables correspondientes a cada valor de una categoria 
            y, en caso de que la variable sea un string, la paso a mayuscula.
            Ejemplo: postre -> POSTRE.
            Luego, si el usuario es administrador invoco a "editarCategoria" de model
            y redirecciono a la página donde está la categoría que se editó
        */

        $id_categoria = $params[':ID'];
        $tipo = strtoupper($_POST['tipo']);
        $descripcion =  strtoupper($_POST['descripcion']);

        if ($this->user->administrador == 1) { 
            $this->model->editarCategoria($id_categoria, $tipo, $descripcion);
        }

        header("Location: " . CATEGORIAS . "/" . $id_categoria );
    }

    public function deleteCategoria($params = null){
        $idCategoria = $params[':ID'];

        if ($this->user->administrador == 1) {
            $this->model->deleteCategoria($idCategoria);
        }

        header("Location: " . CATEGORIAS);
    }
}


?>