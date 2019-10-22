<?php

require_once('libs/Smarty.class.php');
require_once('helpers/auth.helper.php');



class PlatosView {

    private $smarty;

    function __construct(){
        $authHelper = new AuthHelper();
        $userName = $authHelper->getLoggedUserName();
        $userAdmin = $authHelper->getLoggedUserAdmin();
        $this->smarty = new Smarty();
        $this->smarty->assign('basehref', BASE_URL);
        $this->smarty->assign('userName', $userName);
        $this->smarty->assign('userAdmin', $userAdmin);
    }

    public function showError($msgError) {
        echo "<h1>ERROR!</h1>";
        echo "<h2>{$msgError}</h2>";
    }
    
    public function displayPlatos($platos, $categorias){
        $this->smarty->assign('titulo',"Platos");
        $this->smarty->assign('lista_platos', $platos);
        $this->smarty->assign('lista_categorias', $categorias);
        $this->smarty->display('templates/ver_platos.tpl');
    }

    public function displayPlato($plato, $categorias) {
        $this->smarty->assign('titulo',$plato->nombre);
        $this->smarty->assign('plato', $plato);
        $this->smarty->assign('lista_categorias', $categorias);
        $this->smarty->display('templates/detalle_plato.tpl');
    }
}

?>