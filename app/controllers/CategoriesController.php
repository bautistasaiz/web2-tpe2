<?php
require_once "./app/models/CategoriesModel.php";
require_once "./app/views/CategoriesView.php";
require_once "./app/helpers/AuthHelper.php";

class CategoriesController
{
    private $model;
    private $view;
    private $authHelper;

    function __construct() {
        $this->model = new CategoriesModel();
        $this->view = new CategoriesView();
        $this->authHelper = new AuthHelper();
    }
    function showListCategorias(){
        $logueado = $this->authHelper->checkLoggedIn();
        if($logueado){
            $categorias = $this->model->getCategories();
            $this->view->ShowCategories($categorias);
        }else{
            $categorias = $this->model->getCategories();
            $this->view->ShowCategories($categorias);
        }
    }

    function filtrarCategorias($id)  {
        $categoria = $this->model->filtro($id);
        $logueado = $this->authHelper->checkLoggedIn();
        if ($logueado) {
            $this->view->showCategoriaFiltro($categoria);
        } else {
            $this->view->showCategoriaFiltro($categoria);
        }
    }

    function formUpdateCategories($id) {
        $logueado = $this->authHelper->checkLoggedIn();
        if ($logueado) {
            $this->view->showFormUpCategorie($id);
            
        } else {
            header("Location: " . BASE_URL . "login");
        }    
    }

    function updateCategorieById(){
        $logueado = $this->authHelper->checkLoggedIn();
        $id = $_POST['id_categoria'];
        $nombre = $_POST['nombre_categoria'];
        if($logueado){
            $this->model->changeCategorieById($id, $nombre);
            header("Location: " . BASE_URL . "categorias");
        }else{
            header("Location: " . BASE_URL . "login");
        }
    }

    function deleteCategorie($id) {
        $logueado = $this->authHelper->checkLoggedIn();
        if($logueado){
            $this->model->deleteCategorieById($id);
            header("Location: " . BASE_URL . "categorias");
        }else{
            header("Location: " . BASE_URL . "login");
        }
    }
    function insertCategorie() {
        $logueado = $this->authHelper->checkLoggedIn();
        if ($logueado) {
        
        $this->model->insertCategorieToDb($_POST['newCategorie']);
        header("Location: " . BASE_URL . "categorias");
        }
        else {
            header("Location: " . BASE_URL . "login");
        }
    }
    function formAddCategorie(){
        $logueado = $this->authHelper->checkLoggedIn();
        if ($logueado) {
            $this->view->showFormAddCategorie();
        }else{
            header("Location: " . BASE_URL . "login");
        }
    }
}