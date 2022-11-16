<?php
require_once "app/models/ApiModel.php";
require_once "app/views/ApiView.php";
require_once "app/helpers/AuthHelper.php";
require_once "app/models/AppModel.php";



class ApiComentController {

    private $model;
    private $view;
    private $authHelper;
    private $appModel;
    
    function __construct() {
        $this->model = new ApiModel();
        $this->appModel = new AppModel();
        $this->view = new ApiView();
        $this->authHelper = new AuthHelper();
    }
    
    function obtenerComentariosZapatilla($params = null) {
        $id = $params[":ID"];
        $existe = $this->appModel->getShoeById($id);
        if($existe) {
            $comentarios = $this->model->getComents($id);
            return $this->view->response($comentarios, 200);
        }
        else {
            return $this->view->response("no existe zapatilla",404);
        }

    }

    function obtenerComentariosZapatillaOrdenados($params = null) {
        $id = $params[":ID"];
        $orden = $params[":ORDEN"];
        if ($orden == "ASC" or $orden == "DESC") {
            $comentarios = $this->model->getComentsOrder($id, $orden);
            if ($comentarios) {
                return $this->view->response($comentarios, 200);
            } else {
                return $this->view->response("zapatilla con id $id no tiene comentarios", 404);
            }
        }
    }

    function obtenerComentariosZapatillaPorEstrellas($params = null) {
        $id = $params[":ID"];
        $puntaje = $params[":PUNTAJE"];
        if (($puntaje >= 1) && ($puntaje <= 5)) {
            $comentarios = $this->model->getComentsStars($id, $puntaje);
            if ($comentarios) {
                return $this->view->response($comentarios, 200);
            } else {
                return $this->view->response("zapatilla con id $id no tiene comentarios con $puntaje estrellas", 404);
            }
        }
    }

    function insertarComentario($params = null) {
        $logueado = $this->authHelper->checkLoggedIn();
        if ($logueado) {
            $body = $this->getBody();
            if (!empty($body->comentario) && !empty($body->puntaje)) {
                $ultimoId = $this->model->insertarComentarios($body->id_zapatilla, $body->comentario, $body->puntaje);
                if ($ultimoId) {
                    $this->view->response("Comentario realizado con exito en zapatilla $body->id_zapatilla, tendra el id= $ultimoId", 200);
                } else {
                    $this->view->response("El comentario en zapatilla $body->id_zapatilla no se pudo insertar", 500);
                }
            }
        }
    }

    function eliminarComentario($params = null) {
        $logueado = $this->authHelper->checkLoggedIn();
        $idComentario = $params[':ID'];
        //iria $admin solo al igual que los otros controllers, pero sino no anda, por eso el ==1
        if ($logueado) {
            $comentario = $this->model->getComent($idComentario);
            if ($comentario) {
                $this->model->deleteComent($idComentario);
                return $this->view->response("El comentario con el id=$idComentario fue borrada con exito", 200);
            } else {
                return $this->view->response("El comentario con el id=$idComentario no existe", 404);
            }
        }
    }


    // Devuelve el body del request
    private function getBody() {
        //trae lo que le mandaron en el body
        $bodyString = file_get_contents("php://input");
        //te devuelve el string en tipo objeto
        return json_decode($bodyString);
    }
}
