<?php

require_once 'libs/smarty-4.2.1/Router.php';
require_once 'app/controllers/ApiComentController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('api/comentarios/zapatilla/:ID', 'GET', 'ApiComentController', 'obtenerComentariosZapatilla');
// iria :('comentarios/botin/:ID/ordenPuntaje/:ORDEN'
$router->addRoute('comentarios/zapatilla/:ID/:ORDEN', 'GET', 'ApiComentController', 'obtenerComentariosZapatillaOrdenados');
// ('comentarios/botin/:ID/puntaje/:PUNTAJE'
$router->addRoute('coments/zapatilla/:ID/:PUNTAJE', 'GET', 'ApiComentController', 'obtenerComentariosZapatillaPorEstrellas');

$router->addRoute('comentarios/zapatilla/:ID', 'POST', 'ApiComentController', 'insertarComentario');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiComentController', 'eliminarComentario');




// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
