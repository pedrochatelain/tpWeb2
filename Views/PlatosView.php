<?php
require_once "libs/Smarty.class.php";
require_once "helpers/auth.helper.php";

class PlatosView {
    private $smarty;
    private $authHelper;
    private $user;

    function __construct(){
        $this->authHelper = new AuthHelper();
        $this->smarty = new Smarty();
        $this->user= $this->authHelper->getLoggedUser();
        $this->smarty->assign('basehref', BASE_URL);
        $this->smarty->assign('userName', $this->user->username);
        $this->smarty->assign('userAdmin', $this->user->administrador);
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

    public function displayPlato($plato, $categorias, $images, $comentarios, $prom_puntuacion) {
        $this->smarty->assign('titulo',$plato->nombre);
        $this->smarty->assign('plato', $plato);
        $this->smarty->assign('images',$images);
        $this->smarty->assign('comentarios', $comentarios);
        $this->smarty->assign('prom_puntuacion', $prom_puntuacion);
        $this->smarty->assign('lista_categorias', $categorias);
        $this->smarty->display('templates/detalle_plato.tpl');
    }
}
?>