<?php

require __DIR__.'/../vendor/autoload.php';


use \App\Entity\Aluno;
use \App\Session\Login;
use \App\Db\Pagination;

 //OBRIGA O USUARIO A ESTAR LOGADO
 Login::requereLogin();


//Busca
$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);
$curso = filter_input(INPUT_GET, 'curso', FILTER_SANITIZE_STRING);
$periodo = filter_input(INPUT_GET, 'periodo', FILTER_SANITIZE_STRING);

//Condições SQL
$condicoes = [
    strlen($busca) ? 'nome LIKE "%'.str_replace(' ','%', $busca).'%"' : null,
    strlen($curso) ? 'curso LIKE "%'.str_replace(' ','%', $curso).'%"' : null,
    strlen($periodo) ? 'periodo LIKE "%'.str_replace(' ','%', $periodo).'%"' : null

];
//Remove posições vazias
$condicoes = array_filter($condicoes);
//Clausula WHERE
$where = implode(' AND ',$condicoes);

$quantidadeAlunos = Aluno::getQuantidadeAlunos($where);
$obPagination = new Pagination($quantidadeAlunos, $_GET['pagina'] ?? 1 , 10);

$obAlunos = Aluno:: getAlunos($where, null,$obPagination->getLimit());
/*
echo "<pre>";  
print_r($obPagination->getPages()); 
echo "</pre>"; 
*/
include __DIR__.'/../includes/header.php';
include __DIR__.'/listagem.php';
include __DIR__.'/../includes/footer.php';

?>