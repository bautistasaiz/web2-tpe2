<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class AppView{
    
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showHome(){
        $this->smarty->display('home.tpl');
    }

    function showListAllShoes($listAll){
            // asigno variables al tpl smarty
            $this->smarty->assign('count', count($listAll)); 
            $this->smarty->assign('listAll', $listAll);
    
            // mostrar el tpl
            $this->smarty->display('showList.tpl');
    }

    function showItem($shoe){
        $this->smarty->assign('shoe', $shoe);
        $this->smarty->display('showItem.tpl');
    }

}