<?php
class AdminModel{
    private $db;
    function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_zapatillas;charset=utf8', 'root', '');
    }

    function insertShoe($nombre, $descripcion, $precio, $marca, $categoria) {
        $query = $this->db->prepare("INSERT INTO zapatillas (nombre, descripcion, precio, marca, id_categoria_fk) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$nombre, $descripcion, $precio, $marca, $categoria]);

        return $this->db->lastInsertId();
    }

    function deleteShoeById($id) {
        $query = $this->db->prepare('DELETE FROM zapatillas WHERE id = ?');
        $query->execute([$id]);
    }

    function changeShoeById($id,$nombre, $descripcion, $precio, $marca, $categoria){
        $query = $this->db->prepare('UPDATE zapatillas SET nombre = ?, descripcion = ?, precio = ?, marca = ?, id_categoria_fk = ? WHERE id = ?');
        $query->execute([$nombre,$descripcion,$precio,$marca,$categoria,$id]);
    }

}