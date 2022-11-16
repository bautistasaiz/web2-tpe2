<?php

class ApiModel  {

    private $db;
    function __construct() {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_zapatillas;charset=utf8', 'root', '');
    }

    function getComents($id) {
        $sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE id_zapatilla = ?");
        $sentencia->execute(array($id));
        $comentarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }
    function getComentsOrder($id, $orden) {
        $sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE id_zapatilla = ? ORDER BY puntuacion $orden");
        $sentencia->execute(array($id));
        $comentarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    function getComentsStars($id, $puntaje) {
        $sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE id_zapatilla=? AND puntuacion =?");
        $sentencia->execute(array($id, $puntaje));
        $comentarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }


    function getComent($idComentario) {
        $sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE id=?");
        $sentencia->execute(array($idComentario));
        $comentario = $sentencia->fetch(PDO::FETCH_OBJ);
        return $comentario;
    }

    function insertarComentarios($id_zapatilla, $comentario, $puntaje) {
        $sentencia = $this->db->prepare("INSERT INTO comentarios (id_zapatilla, comentario, puntuacion) VALUES(?,?,?)");
        $sentencia->execute(array($id_zapatilla, $comentario, $puntaje,));
        return $this->db->lastInsertId();
    }

    function deleteComent($idComentario) {
        $sentencia = $this->db->prepare("DELETE FROM comentarios WHERE id=?");
        $sentencia->execute(array($idComentario));
    }
}
