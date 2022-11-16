<?php
require_once './app/models/AdminModel.php';
require_once './app/views/AdminView.php';
require_once './app/helpers/AuthHelper.php';
class AdminController{
    
    private $view;
    private $model;
    private $authHelper;
    private $categoriesModel;
    function __construct()
    {
        $this->view = new AdminView();
        $this->model = new AdminModel();
        $this->authHelper = new AuthHelper();
        $this->categoriesModel = new CategoriesModel();
    }
    
    function addShoes(){
        $this->authHelper->checkLoggedIn();
        
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $marca = $_POST['marca'];
        $categoria = $_POST['categorias'];

        $id = $this->model->insertShoe($nombre, $descripcion, $precio, $marca, $categoria);

        header("Location: " . BASE_URL . "list");
    }

    function deleteShoes($id){
        $this->authHelper->checkLoggedIn();
        $this->model->deleteShoeById($id);
        header("Location: " . BASE_URL."list");

    }

    function formUpdate($id){
        $logueado = $this->authHelper->checkLoggedIn();
        $categorias = $this->categoriesModel->getCategories();
        if($logueado){
            $this->view->showFormUp($id,$categorias);
        }else{
            header("Location: " . BASE_URL . "login");
        }
    }

    function updateShoe(){
        $this->authHelper->checkLoggedIn();
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $marca = $_POST['marca'];
        $categoria = $_POST['categorias'];

        $this->model->changeShoeById($id,$nombre, $descripcion, $precio, $marca, $categoria);

        header("Location: " . BASE_URL . "list");
    }

    function formAdd(){

        $categorias = $this->categoriesModel->getCategories();
        $logueado = $this->authHelper->checkLoggedIn();
        if($logueado){
        $this->view->showFormAdd($categorias);
        }else{
            header("Location: " . BASE_URL . "login");
        }
    }

}