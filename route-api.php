<?php
require_once("Router.php");
require_once("./api/ComentariosApiController.php");

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

// recurso solicitado
$resource = $_GET["resource"];

// método utilizado
$method = $_SERVER["REQUEST_METHOD"];

// instancia el router
$router = new Router();

// arma la tabla de ruteo

    // trae los comentarios de un plato en particular
    $router->addRoute("comentarios/:ID_PLATO", "GET", "ComentariosApiController", "getComentarios");
    // borra un comentario en particular
    $router->addRoute("comentario/borrar/:ID_COMENTARIO", "DELETE", "ComentariosApiController", "deleteComentario");
    // postea un comentario en un plato en particular
    $router->addRoute("comentar/:ID_PLATO", "POST", "ComentariosApiController", "addComentario");

    $router->addRoute("usuario", "GET", "ComentariosApiController", "getUsuario");

// rutea
$router->route($resource, $method);