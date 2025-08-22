<?php
namespace App\Session;
class Login{
    public static function isLogged(){
        return false;
    }
    public static function requereLogin(){
        if(!self::isLogged()){
            header('location: /si/login.php');
            exit;
        }
    }
    public static function requereLogout(){
        if(self::isLogged()){
            header('location: /si/index.php');
            exit;
        }
    }
}