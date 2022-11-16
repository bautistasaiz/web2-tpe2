<?php
    require_once './libs/smarty-4.2.1/libs/Smarty.class.php';
    
    class CategoriesView{
    
        private $smarty;
    function __construct()
    {
        $this->smarty = new Smarty();
    }
    
    
    function showCategories($categorias){
        $this->smarty->assign('count', count($categorias)); 
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->display('showCategories.tpl');
    }

    function showCategoriaFiltro($categoria){
        var_dump($categoria);
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->display('showCategoria.tpl');
    }

    function showFormUpCategorie($id){
        $this->smarty->assign('id', $id);
        $this->smarty->display('formUpCategorie.tpl');
    }

    function showFormAddCategorie(){
        $this->smarty->display('formAddCategorie.tpl');
    }
}