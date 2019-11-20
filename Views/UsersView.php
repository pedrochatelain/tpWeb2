<?php
require_once "libs/Smarty.class.php";
require_once "helpers/auth.helper.php";

class UsersView {
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
    
    public function displayUsuarios($users) {
        $this->smarty->assign('titulo',"Usuarios");
        $this->smarty->assign('usuarios', $users);
        $this->smarty->display('templates/users.tpl');    
    }

    public function displayUser($user) {
        $this->smarty->assign('titulo',"User: ".$user->username);
        $this->smarty->assign('user', $user);
        $this->smarty->display('templates/user_details.tpl');    
    }
}
?>