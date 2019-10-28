<?php
require_once "./Models/PlatosModel.php";
require_once "./Views/PlatosView.php";
require_once "./Models/CategoriasModel.php";
include_once('helpers/auth.helper.php');



class PlatosController {

    private $model;
    private $view;
    private $model_categoria;
    private $user;

	function __construct(){
        // barrera para usuario logueado
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();

        $this->user = $authHelper->getLoggedUser();
        $this->model = new PlatosModel();
        $this->view = new PlatosView();
        $this->model_categoria = new CategoriasModel();
    }
    
    public function getPlatos(){
        $platos = $this->model->getPlatos();
        $categorias = $this->model_categoria->getCategorias();
        $this->view->displayPlatos($platos, $categorias);
    }

    public function addPlato() {
        /*
            Creo las variables correspondientes a cada valor de un plato 
            y, en caso de que la variable sea un string, la paso a mayuscula.
            Ejemplo: ensalada -> ENSALADA.
            Luego, si el usuario es administrador invoco a "addPlato" de model
            y redirecciono a la página BASE_URL

        */

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
        $idPlato = $params[':ID'];
        $plato = $this->model->get($idPlato);
        $categorias = $this->model_categoria->getCategorias();

        // si existe el plato...
        if ($plato) 
            $this->view->displayPlato($plato, $categorias);
        else
            $this->view->showError('El plato no existe');
    }

    public function editarPlato($params = null) {
        /*
            Dado un id, creo las variables correspondientes a cada valor de un plato 
            y, en caso de que la variable sea un string, la paso a mayuscula.
            Ejemplo: ensalada -> ENSALADA.
            Luego, si el usuario es administrador invoco a "editarPlato" de model
            y redirecciono a la página donde está el plato que se editó
        */

        $id_plato = $params[':ID'];
        $nombre = strtoupper($_POST['nombre']);
        $vegetariano = strtoupper($_POST['vegetariano']);
        $tacc = strtoupper($_POST['tacc']);
        $vegano = strtoupper($_POST['vegano']);
        $precio = $_POST['precio'];
        $id_categoria = $_POST['id_categoria'];

        if ($this->user->administrador == 1) { 
            $this->model->editarPlato(
                $id_plato, $nombre, $vegetariano, $tacc, $vegano, $precio, $id_categoria);
        }

        header("Location: " . BASE_URL . "platos/" . $id_plato);
    }

    public function deletePlato($params = null){
        $idPlato = $params[':ID'];

        // si es administrador...
        if ($this->user->administrador == 1) { 
            $this->model->deletePlato($idPlato);
        }

        header("Location: " . BASE_URL);
    }
}

?>