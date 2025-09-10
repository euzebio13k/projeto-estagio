<?php

require __DIR__.'/vendor/autoload.php';
use App\Entity\Aluno;
use App\Session\Login;

//OBRIGA O USUARIO NÃO ESTAR LOGADO
Login::requereLogout();

$msg = '';

if(isset($_POST['cpf'], $_POST['senha'])){
   $obAluno = Aluno::getAlunoCpf($_POST['cpf']);
   

   if(!$obAluno instanceof Aluno || !password_verify($_POST['senha'], $obAluno->senha)){   
   
   //if(!$obAluno instanceof Aluno || strcmp($_POST['senha'], $obAluno->senha) != 0){
      $msg = "Usuario ou senha incorretos!";
   }else{
      
      Login::login($obAluno);
            
   }
   
}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario-login.php';
include __DIR__.'/includes/footer.php';
/*
echo "<pre>";  
print_r($obAluno); 
echo "</pre>"; 
exit;
*/
