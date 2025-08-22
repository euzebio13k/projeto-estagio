<?php

require __DIR__.'/../vendor/autoload.php';


use \App\Entity\Vaga;
use \App\Db\Pagination;
use \App\Session\Login;

//OBRIGA O USUARIO A ESTAR LOGADO
Login::requereLogin();

//Busca
$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);
//Filtro de Status
$filtroStatus = filter_input(INPUT_GET, 'filtroStatus', FILTER_SANITIZE_STRING);
$filtroStatus = in_array($filtroStatus,['s','n']) ? $filtroStatus: '';

//Condições SQL
$condicoes = [
    strlen($busca) ? 'titulo LIKE "%'.str_replace(' ','%', $busca).'%"' : null,
    strlen($filtroStatus) ? 'ativo = "'.$filtroStatus.'"' : null
];
//Remove posições vazias
$condicoes = array_filter($condicoes);
//Clausula WHERE
$where = implode(' AND ',$condicoes);

$quantidadeVagas = Vaga::getQuantidadeVagas($where);
$obPagination = new Pagination($quantidadeVagas, $_GET['pagina'] ?? 1 , 3);

$vagas = Vaga:: getVagas($where, null,$obPagination->getLimit());
    

echo $quantidadeVagas."<pre>";  
print_r($obPagination->getLimit()); 
echo "</pre>"; 



include __DIR__.'/../includes/header.php';
include __DIR__.'/listagem.php';
include __DIR__.'/../includes/footer.php';




?>