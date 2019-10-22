<?php
require_once "./Models/PlatosModel.php";
require_once "./Views/PlatosView.php";
require_once "./Models/CategoriasModel.php";
include_once('helpers/auth.helper.php');



class PlatosController {

    private $model;
    private $view;
    private $model_categoria;

	function __construct(){

        // barrera para usuario logueado
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
    
        $this->model = new PlatosModel();
        $this->view = new PlatosView();
        $this->model_categoria = new CategoriasModel();
    }
    
    public function getPlatos(){
        $platos = $this->model->getPlatos();
        $categorias = $this->model_categoria->getCategorias();
        $this->view->displayPlatos($platos, $categorias);
    }

    public function addPlato(){
        $tipo = $this->model_categoria->getCategoriaByID($_POST['id_categoria'])->tipo;
        $this->model->addPlato($tipo,$_POST['nombre'],$_POST['vegetariano'],$_POST['tacc'],$_POST['vegano'],$_POST['precio'], $_POST['id_categoria']);
        header("Location: " . BASE_URL);
    }

    public function displayPlato($params = null) {
        $idPlato = $params[':ID'];
        $plato = $this->model->get($idPlato);
        $categorias = $this->model_categoria->getCategorias();
        if ($plato) // si existe el plato
            $this->view->displayPlato($plato, $categorias);
        else
            $this->view->showError('El plato no existe');
    }

    public function editarPlato() {
        $fila = $_POST['fila'];
        $tipo = $this->model_categoria->getCategoriaByID($_POST['editar_tipo'][$fila])->tipo;
        $this->model->editarPlato($_POST['id_plato'][$fila], $tipo, $_POST['editar_nombre'][$fila], $_POST['editar_vegetariano'][$fila], $_POST['editar_tacc'][$fila], $_POST['editar_vegano'][$fila], $_POST['editar_precio'][$fila], $_POST['editar_tipo'][$fila]);
        //redirecciono a la pagina donde esta el plato
        header("Location: " . BASE_URL . "platos/" . $_POST['id_plato'][$fila] );
    }

    public function deletePlato($params = null){
        $idPlato = $params[':ID'];
        $this->model->deletePlato($idPlato);
        header("Location: " . BASE_URL);
    }
}

?>