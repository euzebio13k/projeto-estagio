<?php
namespace App\Session;
class Login{


    private static function init(){

        if(session_status() !== PHP_SESSION_ACTIVE){
            
            session_start();
        }
    }
    public static function getUsuarioLogado(){
        
        self::init();
        return self::isLogged() ? $_SESSION['usuario'] : null;
        
    }
    public static function login($obAluno){
        
        self::init();
        
        $_SESSION['usuario'] = [
            'id'   => $obAluno->id,
            'nome' => $obAluno->nome,
            'cpf'  => $obAluno->cpf
        ];

        header('Location: /si/index.php');
        exit;
    
    }
    public static function logout(){
        
        self::init();
        
        unset($_SESSION['usuario']);

        header('Location: /si/login.php');
        exit;
    
    }
    public static function isLogged(){
        self::init(); 
        if (isset($_SESSION['usuario'])){
            return true;
        } else{
            return false;    
        }
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