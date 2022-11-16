<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class UserView  {
    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function formLogin($error = "") {
        $this->smarty->assign('titulo', 'Iniciar sesión');
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/usuarios/login.tpl');
    }

    function formRegister() {
        $this->smarty->assign('titulo', 'Registrarme');
        $this->smarty->display('templates/usuarios/register.tpl');
    }


    function showHomeLocation() {
        header("Location: " . BASE_URL . "home");
    }

    function showRegisterLocation() {
        header("Location: " . BASE_URL . "register");
    }
}
