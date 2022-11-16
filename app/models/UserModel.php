<?php
class UserModel{

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_zapatillas;charset=utf8', 'root', '');
        
    }
    
    function getUser($email){
        $query = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_OBJ); 
        return $user;
    }

    function insertUserFromDb($nombre, $apellido, $nombre_usuario, $userEmail, $userPassword){  
            $sentencia = $this->db->prepare("INSERT INTO users(nombre, apellido, nombre_usuario, email, password) VALUES(?,?,?,?,?)");
            $sentencia->execute(array($nombre, $apellido, $nombre_usuario, $userEmail, $userPassword));
    }

    
}