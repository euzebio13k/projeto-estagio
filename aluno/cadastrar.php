<?php

require __DIR__.'/../vendor/autoload.php';

define('TITLE','Cadastrar aluno');

 use \App\Entity\Aluno;
 use \App\Session\Login;

 //OBRIGA O USUARIO A ESTAR LOGADO
 Login::requereLogin();
 
 $obAluno= new Aluno;


//VALIDAÇÃO DO POST
       if(isset($_POST['nome'], $_POST['cpf'],$_POST['curso'],$_POST['periodo'])){

              
              $obAluno-> nome                = $_POST['nome'] ;
              $obAluno-> cpf                 = $_POST['cpf'];
              $obAluno-> telefone            = $_POST['telefone'];
              $obAluno-> email_pessoal       = $_POST['email_pessoal'] ;
              $obAluno-> email_institucional = $_POST['email_institucional'];
              $obAluno-> curso               = $_POST['curso'];
              $obAluno-> periodo             = $_POST['periodo'] ;
              $obAluno-> dtn                 = $_POST['dtn'];
              $obAluno-> senha                 = password_hash($_POST['senha'], PASSWORD_DEFAULT);
              $obAluno-> cadastrar() ;

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