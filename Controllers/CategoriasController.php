<?php
require_once "./Models/CategoriasModel.php";
require_once "./Views/CategoriasView.php";
include_once('helpers/auth.helper.php');


class CategoriasController {

    private $model;
    private $view;

	function __construct(){

        // barrera para usuario logueado
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        
        $this->model = new CategoriasModel();
        $this->view = new CategoriasView();
    }
    
    public function getCategorias(){
        $categorias = $this->model->getCategorias();
        $this->view->displayCategorias($categorias);
    }

    public function addCategoria(){
        $this->model->addCategoria($_POST['tipo'],$_POST['descripcion']);
        header("Location: " . CATEGORIAS);
    }

    public function displayCategoria($params = null) {
        $idCategoria = $params[':ID'];
        $categoria = $this->model->get($idCategoria);
        if ($categoria) // si existe la categoria
            $this->view->displayCategoria($categoria);
        else
            $this->view->showError('La categoria no existe');
    }

    public function editarCategoria() {
        $fila = $_POST['fila'];
        $this->model->editarCategoria($_POST['id_categoria'][$fila], $_POST['tipo'][$fila], $_POST['descripcion'][$fila]);
        header("Location: " . CATEGORIAS . "/" . $_POST['id_categoria'][$fila] );
    }

    public function deleteCategoria($params = null){
        $idCategoria = $params[':ID'];
        $this->model->deleteCategoria($idCategoria);
        header("Location: " . CATEGORIAS);
    }
}


?>