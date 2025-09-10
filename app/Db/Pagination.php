<?php
namespace App\Db;
class Pagination{
    private $limit;
    private $results;
    private $pages;
    private $currentPage;
    
    public function __construct($results, $currentPage = 1, $limit=10){
        $this->results = $results;
        $this->limit = $limit;
        $this->currentPage = (is_numeric($currentPage) and $currentPage > 0) ? $currentPage : 1;
        $this->calculate();
    }

    //calcula a paginação
    public function calculate(){
        //Calcula o total de paginas
        $this->pages = $this->results > 0 ? ceil($this->results / $this->limit) : 1;
        //Verifica se a pagina atual não exede o numero de paginas
        $this->currentPage = $this->currentPage <= $this->pages ? $this->currentPage : $this->pages;
    }

    public function getLimit(){
        $offset = ($this->limit * ($this->currentPage -1));
        return $offset.','.$this->limit;
    }

    public function getPages(){
        //Não retorna paginas
        if($this->pages == 1) return [];

        //paginas
        $paginas = [];
        for($i = 1; $i <= $this->pages; $i++){
            $paginas[] = [
                'pagina' => $i,
                'atual' => $i == $this->currentPage
            ];
        }
        return $paginas;
    }
}