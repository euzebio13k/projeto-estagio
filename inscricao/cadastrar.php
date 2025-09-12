<?php

require __DIR__.'/../vendor/autoload.php';

 use \App\Entity\Inscricao;
 use \App\Entity\Vaga;
 use \App\Entity\Aluno;
 use \App\Session\Login;

 //OBRIGA O USUARIO A ESTAR LOGADO
 Login::requereLogin();

$inscricao = new Inscricao();
$vaga = new Vaga();
$aluno = new Aluno();

//VALIDAÇÃO DO POST
       if(isset($_GET['vaga'])){

              $vaga->id = $_GET['vaga'];
              $inscricao->vaga = $vaga;
              $aluno->id = $_SESSION['usuario']['id'];    
              $inscricao->aluno = $aluno;
              $inscricao->status = 'Em Analize'; 
              $inscricao-> cadastrar() ;

              header('location: /si/index.php?status=sucess');
              exit;
}
/*
echo "<pre>";  
print_r($_POST); 
echo "</pre>"; 
exit;
*/