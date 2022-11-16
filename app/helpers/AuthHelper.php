<?php
class AuthHelper{

    function checkLoggedIn(){
        session_start();
        if(isset($_SESSION['IS_LOGUED'])){
            return true;
        }else
            return false;
        }

}