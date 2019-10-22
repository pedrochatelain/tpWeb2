<?php

require_once('libs/Smarty.class.php');
require_once('helpers/auth.helper.php');



class CategoriasView {

    private $smarty;

    function __construct(){
        $authHelper = new AuthHelper();
        $userName = $authHelper->getLoggedUserName();
        $userAdmin = $authHelper->getLoggedUserAdmin();
        $this->smarty = new Smarty();
        $this->smarty->assign('basehref',CATEGORIAS);
        $this->smarty->assign('userName', $userName);
        $this->smarty->assign('userAdmin', $userAdmin);
    }

    public function showError($msgError) {
        echo "<h1>ERROR!</h1>";
        echo "<h2>{$msgError}</h2>";
    }

    public function displayCategorias($categorias){

        $this->smarty->assign('titulo',"Categorias");
        $this->smarty->assign('lista_categorias',$categorias);
        $this->smarty->display('templates/ver_categorias.tpl');
    }

    public function displayCategoria($categoria){
        $this->smarty->assign('titulo', $categoria->tipo);
        $this->smarty->assign('categoria',$categoria);
        $this->smarty->display('templates/detalle_categoria.tpl');
    }
}

?>