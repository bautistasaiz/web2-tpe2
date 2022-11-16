<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class AdminView{
    
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showFormAdd($categorias) {
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->display('formAdd.tpl');
    }
    
    function showFormUp($id, $categorias) {
        $this->smarty->assign('id', $id);
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->display('formUpdate.tpl');
    }
}