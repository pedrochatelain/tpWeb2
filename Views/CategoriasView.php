<?php

require_once('libs/Smarty.class.php');
require_once('helpers/auth.helper.php');



class CategoriasView {

    private $smarty;
    private $authHelper;
    private $user;

    function __construct(){
        $this->authHelper = new AuthHelper();
        $this->smarty = new Smarty();
        $this->user= $this->authHelper->getLoggedUser();
        $this->smarty->assign('basehref', CATEGORIAS);
        $this->smarty->assign('userName', $this->user->username);
        $this->smarty->assign('userAdmin', $this->user->administrador);
    }

    public function showError($msgError) {
        echo "<h1>ERROR!</h1>";
        echo "<h2>{$msgError}</h2>";
    }

    public function displayCategorias($categorias){

        $this->smarty->assign('titulo',"Categorias");
        $this->smarty->assign('lista_categorias', $categorias);
        $this->smarty->display('templates/ver_categorias.tpl');
    }

    public function displayCategoria($categoria){
        $this->smarty->assign('titulo', $categoria->tipo);
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->display('templates/detalle_categoria.tpl');
    }
}

?>