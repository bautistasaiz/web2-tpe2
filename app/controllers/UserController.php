<?php
require_once "./app/models/UserModel.php";
require_once "./app/views/UserView.php";
require_once './app/helpers/AuthHelper.php';


class UserController{

    private $model;
    private $view;
    public function __construct() {
        $this->model = new UserModel();
        $this->view = new UserView();
        $this->authHelper = new AuthHelper();
    }

    function logout(){
        session_start();
        session_destroy();
        header('Location: '.BASE_URL.'home');
    }

    function showLogin(){
        $this->view->formLogin();
    }

    function verifyLogin(){
        if(!empty($_POST['email'])&&!empty($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $user = $this->model->getUser($email);
            if($user && password_verify($password, $user->password)){
                session_start();
                $_SESSION['USER_ID'] = $user->id;
                $_SESSION['USER_NAME'] = $user->nombre_usuario;
                $_SESSION['USER_EMAIL'] = $user->email;
                $_SESSION['IS_LOGUED'] = true;
                
                $this->view->showHomeLocation();
            }
                else{
                $this->view->formLogin('Acceso Denegado!');
            }
        }
    }

    function insertRegister()  {
        if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['nombre_usuario']) && !empty($_POST['email']) && !empty($_POST['password'])){ 
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $nombre_usuario = $_POST['nombre_usuario'];
            $userEmail = $_POST['email'];
            $userPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
            
            $this->model->insertUserFromDB($nombre, $apellido, $nombre_usuario, $userEmail, $userPassword);
            
            $this->view->formLogin();
        }
        else {
            $this->view->showRegisterLocation();
        }
    }

    function register()  {
        $this->view->formRegister();
    }



}