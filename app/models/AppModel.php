<?php
class AppModel{
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_zapatillas;charset=utf8', 'root', '');
        
    }

    function getAllShoes(){
        $query = $this->db->prepare("SELECT * FROM zapatillas");
        $query->execute();
        $listaTodo = $query->fetchAll(PDO::FETCH_OBJ); 
        return $listaTodo;
    }

    function getShoeById($id){
        $query = $this->db->prepare("SELECT * FROM zapatillas WHERE id = ?");
        $query->execute([$id]);

        $Shoe = $query->fetch(PDO::FETCH_OBJ);
        return $Shoe;
    }

}
