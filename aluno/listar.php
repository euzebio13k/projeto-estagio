<?php

require __DIR__.'/../vendor/autoload.php';


use \App\Entity\Aluno;
use \App\Session\Login;

 //OBRIGA O USUARIO A ESTAR LOGADO
 Login::requereLogin();


$obAlunos = Aluno:: getAlunos();
/*
echo "<pre>";  
print_r($obAlunos); 
echo "</pre>"; 
*/
include __DIR__.'/../includes/header.php';
include __DIR__.'/listagem.php';
include __DIR__.'/../includes/footer.php';

?>