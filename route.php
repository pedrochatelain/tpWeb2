<?php
    require_once('Controllers/PlatosController.php');
    require_once('Controllers/CategoriasController.php');
    require_once('Controllers/LoginController.php');
    require_once('Router.php');
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", BASE_URL . 'login');
    define("CATEGORIAS", BASE_URL . 'categorias');

    $r = new Router();

    // rutas
    $r->addRoute("login", "GET", "LoginController", "showLogin");
    $r->addRoute("verify", "POST", "LoginController", "verifyUser");
    $r->addRoute("guest", "POST", "LoginController", "verifyGuest");
    $r->addRoute("logout", "GET", "LoginController", "logout");
    $r->addRoute("platos", "GET", "PlatosController", "getPlatos");
    $r->addRoute("categorias", "GET", "CategoriasController", "getCategorias");
    $r->addRoute("platos/:ID", "GET", "PlatosController", "displayPlato");
    $r->addRoute("categorias/:ID", "GET", "CategoriasController", "displayCategoria");
    $r->addRoute("borrar/:ID", "GET", "PlatosController", "deletePlato");
    $r->addRoute("categorias/borrar/:ID", "GET", "CategoriasController", "deleteCategoria");
    $r->addRoute("insertar", "POST", "PlatosController", "addPlato");
    $r->addRoute("categorias/insertar", "POST", "CategoriasController", "addCategoria");
    $r->addRoute("editar/:ID", "POST", "PlatosController", "editarPlato");
    $r->addRoute("categorias/editar/:ID", "POST", "CategoriasController", "editarCategoria");

    
    //Ruta por defecto.
    $r->setDefaultRoute("PlatosController", "getPlatos");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>