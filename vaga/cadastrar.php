<?php

require __DIR__.'/../vendor/autoload.php';

define('TITLE','Cadastrar vaga');

 use \App\Entity\Vaga;
 use \App\Session\Login;

 //OBRIGA O USUARIO A ESTAR LOGADO
 Login::requereLogin();

 $vaga= new Vaga;


//VALIDAÇÃO DO POST
       if(isset($_POST['titulo'], $_POST['descricao'])){

              
              $vaga->id =  $_GET['id']; 
              $vaga->titulo =  $_POST['titulo']; 
              $vaga->descricao =  $_POST['descricao']; 
              $vaga->quantidade =  $_POST['quantidade'];
              $vaga->remuneracao =  $_POST['remuneracao'];
              $vaga->data_abertura =  $_POST['data_abertura'];
              $vaga->data_fechamento =  $_POST['data_fechamento']; 
              $vaga-> cadastrar() ;

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