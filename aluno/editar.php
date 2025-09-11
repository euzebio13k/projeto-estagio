<?php

require __DIR__.'/../vendor/autoload.php';

define('TITLE','Editar aluno');

 use \App\Entity\Aluno;
 use \App\Session\Login;
 use \App\File\Upload;

 //OBRIGA O USUARIO A ESTAR LOGADO
 //Login::requereLogin();
 
 $obAluno= new Aluno;

 
 //OBRIGA O USUARIO A ESTAR LOGADO
 Login::requereLogin();

 if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: listar.php?status=error');
    exit;
 }
 //CONSULTAR VAGA
    $obAluno = Aluno:: getAluno($_GET['id']);
    /*echo "<pre>";  
print_r($obAluno); 
echo "</pre>"; 
exit;*/

//validação a aluno
   if(!$obAluno instanceof Aluno){
    header('location: listar.php?status=error');
    exit;
   }

   //VALIDAÇÃO DO POST
   if(isset($_POST['nome'], $_POST['cpf'],$_POST['curso'],$_POST['periodo'])){

          
          $obAluno-> nome                =$_POST['nome'] ;
          $obAluno-> cpf                 =$_POST['cpf'];
          $obAluno-> telefone            =$_POST['telefone'];
          $obAluno-> email_pessoal       =$_POST['email_pessoal'] ;
          $obAluno-> email_institucional =$_POST['email_institucional'];
          $obAluno-> curso               =$_POST['curso'];
          $obAluno-> periodo             =$_POST['periodo'] ;
          $obAluno-> dtn                 =$_POST['dtn'];
          $obAluno-> matricula           = $_POST['matricula'];
          $obAluno-> senha               = password_hash($_POST['senha'], PASSWORD_DEFAULT);
          $obAluno-> nivel               = 1;
          if(isset($_FILES['arquivo'])){
       
            $upload = new Upload($_FILES['arquivo']);
            $msg = $upload->upload(__DIR__.'/../images/alunos',$obAluno->cpf);
            
         }
         $obAluno-> atualizar() ;

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
