<?php
require_once './app/models/AppModel.php';
require_once './app/views/appView.php';
require_once './app/helpers/AuthHelper.php';

class AppController{
    
    private $view;
    private $model;
    private $authHelper;

    function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->model = new AppModel();
        $this->view = new AppView();
        $this->authHelper = new AuthHelper();
    }

    function showHomeLocation(){
        $logueado = $this->authHelper->checkLoggedIn();
        if($logueado){
            $this->view->showHome();
        }else{
            $this->view->showHome();
        }
        
    }

    function showListAll(){
        $logueado = $this->authHelper->checkLoggedIn();
        if($logueado){
            $listAll = $this->model->getAllShoes();
            $this->view->showListAllShoes($listAll);
        }else{
            $listAll = $this->model->getAllShoes();
            $this->view->showListAllShoes($listAll);
        }
    }
    function showItemById($id){
        $logueado = $this->authHelper->checkLoggedIn();
        if($logueado){
            $shoe = $this->model->getShoeById($id);
            $this->view->ShowItem($shoe);
        }else{
            $shoe = $this->model->getShoeById($id);
            $this->view->ShowItem($shoe);
        }
    }

}