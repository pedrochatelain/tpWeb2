<?php
require_once "Controllers/PlatosController.php";
require_once "Controllers/CategoriasController.php";
require_once "Controllers/LoginController.php";
require_once "Controllers/SignInController.php";
require_once "Controllers/UsersController.php";
require_once "Controllers/ImageController.php";
require_once "Router.php";
    
// CONSTANTES PARA RUTEO
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("LOGIN", BASE_URL . 'login');
define("CATEGORIAS", BASE_URL . 'categorias');
define("USUARIOS", BASE_URL . 'usuarios');

$r = new Router();

// rutas

// CATEGORIAS
$r->addRoute("categorias", "GET", "CategoriasController", "getCategorias");
$r->addRoute("categorias/:ID", "GET", "CategoriasController", "displayCategoria");
$r->addRoute("categorias/insertar", "POST", "CategoriasController", "addCategoria");
$r->addRoute("categorias/borrar/:ID", "GET", "CategoriasController", "deleteCategoria");
$r->addRoute("categorias/editar/:ID", "POST", "CategoriasController", "editarCategoria");
// PLATOS
$r->addRoute("platos", "GET", "PlatosController", "getPlatos");
$r->addRoute("platos/:ID_PLATO", "GET", "PlatosController", "displayPlato");
$r->addRoute("insertar", "POST", "PlatosController", "addPlato");
$r->addRoute("borrar/:ID", "GET", "PlatosController", "deletePlato");
$r->addRoute("editar/:ID", "POST", "PlatosController", "editarPlato");
// IMAGENES
$r->addRoute("upload_image/:ID", "POST", "ImageController", "addImage");
$r->addRoute("delete_image/:ID", "POST", "ImageController", "deleteImage");
// LOGIN
$r->addRoute("login", "GET", "LoginController", "showLogin");
$r->addRoute("logout", "GET", "LoginController", "logout");
$r->addRoute("verify", "POST", "LoginController", "verifyUser");
$r->addRoute("guest", "POST", "LoginController", "verifyGuest");
// SIGN-IN
$r->addRoute("registrar_usuario", "POST", "SignInController", "registrarUser");
$r->addRoute("registrarse", "GET", "SignInController", "showSignIn");
// USUARIOS
$r->addRoute("usuarios", "GET", "UsersController", "getUsuarios");
$r->addRoute("usuarios/:ID", "GET", "UsersController", "displayUser");
$r->addRoute("usuarios/borrar/:ID", "GET", "UsersController", "deleteUser");
$r->addRoute("usuarios/editar/:ID", "POST", "UsersController", "editarUsuario");

//Ruta por defecto.
$r->setDefaultRoute("PlatosController", "getPlatos");

//run
$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>