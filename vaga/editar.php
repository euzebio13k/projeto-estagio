<?php

require __DIR__.'/../vendor/autoload.php';

define('TITLE','Editar vaga');

 use \App\Entity\Vaga;
 use \App\Session\Login;

//OBRIGA O USUARIO A ESTAR LOGADO
Login::requereLogin();

 if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: listar.php?status=error');
    exit;
 }
 //CONSULTAR VAGA
    $vaga = Vaga:: getVaga($_GET['id']);
    /*echo "<pre>";  
print_r($vaga); 
echo "</pre>"; 
exit;*/

//validação a vaga
   if(!$vaga instanceof Vaga){
    header('location: listar.php?status=error');
    exit;
   }

//VALIDAÇÃO DO POST
       if(isset($_POST['titulo'], $_POST['descricao'])){

              //$vaga= new Vaga;
              $vaga->id =  $_GET['id']; 
        $vaga->titulo =  $_POST['titulo']; 
        $vaga->descricao =  $_POST['descricao']; 
        $vaga->quantidade =  $_POST['quantidade'];
        $vaga->remuneracao =  $_POST['remuneracao'];
        $vaga->data_abertura =  $_POST['data_abertura'];
        $vaga->data_fechamento =  $_POST['data_fechamento']; 
              $vaga-> atualizar() ;

              header('location: listar.php?status=sucess');
              exit;
}


include __DIR__.'/../includes/header.php';
include __DIR__.'/formulario.php';
include __DIR__.'/../includes/footer.php';
/*
echo "<pre>";  
print_r($_POST); 
echo "</pre>"; 
exit;
*/
