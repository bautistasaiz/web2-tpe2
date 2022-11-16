<?php
class CategoriesModel{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_zapatillas;charset=utf8', 'root', '');
    }
    
    function getCategories() {
        $sentencia = $this->db->prepare("SELECT * FROM categorias");
        $sentencia->execute();
        $categorias = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $categorias;
    }



    function changeCategorieById($id, $nombre){
        $query = $this->db->prepare('UPDATE categorias SET nombre = ? WHERE id_categoria_pk = ?');
        $query->execute([$nombre, $id]);
    }
    
    function deleteCategorieById($id){
        $query = $this->db->prepare('DELETE FROM categorias WHERE id_categoria_pk = ?');
        $query->execute([$id]);
    }

    function insertCategorieToDb($nombre){
        $query = $this->db->prepare("INSERT INTO categorias(nombre) VALUES (?)");
        $query->execute([$nombre]);
    }

    function filtro($id) {
        $sentencia = $this->db->prepare("SELECT * FROM zapatillas JOIN categorias ON zapatillas.id_categoria_fk = categorias.id_categoria_pk  AND zapatillas.id_categoria_fk = ?");
        $sentencia->execute([$id]);
        $categoriaFiltro = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $categoriaFiltro;
    }

}