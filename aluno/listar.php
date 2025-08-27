<?php

require __DIR__.'/../vendor/autoload.php';


use \App\Entity\Aluno;
use \App\Session\Login;
use \App\Db\Pagination;

 //OBRIGA O USUARIO A ESTAR LOGADO
 Login::requereLogin();


//Busca
$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);

//Condições SQL
$condicoes = [
    strlen($busca) ? 'titulo LIKE "%'.str_replace(' ','%', $busca).'%"' : null

];
//Remove posições vazias
$condicoes = array_filter($condicoes);
//Clausula WHERE
$where = implode(' AND ',$condicoes);

$quantidadeAlunos = Aluno::getQuantidadeAlunos($where);
$obPagination = new Pagination($quantidadeAlunos, $_GET['pagina'] ?? 1 , 2);

$obAlunos = Aluno:: getAlunos($where, null,$obPagination->getLimit());
/*
echo "<pre>";  
print_r($obAlunos); 
echo "</pre>"; 
*/
include __DIR__.'/../includes/header.php';
include __DIR__.'/listagem.php';
include __DIR__.'/../includes/footer.php';

?>