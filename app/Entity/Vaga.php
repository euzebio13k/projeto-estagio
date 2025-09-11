<?php
namespace App\Entity;

use App\Db\DataBase;
use PDO;
use DateTime;

class Vaga{
    
    public $id;
    public $titulo;
    public $descricao;
    public $quantidade;
    public $remuneracao;
    public $data_abertura;
    public $data_fechamento;
    public $data_criacao;
/*
    private $id;
    private $titulo;
    private $descricao;
    private $quantidade;
    private $remuneracao;
    private $data_abertura;
    private $data_fechamento;
    private $data;
*/
    

    public function cadastrar(){
        $this->data_abertura = date('Y-m-d', strtotime($this->data_abertura));
        $this->data_fechamento = date('Y-m-d', strtotime($this->data_fechamento));
        date_default_timezone_set('America/Sao_Paulo');
        $this->data_criacao = date('y-m-d H:i:s');
        $banco = new DataBase('vagas');
        $this->id = $banco->insert([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'quantidade' => $this->quantidade,
            'remuneracao' => $this->remuneracao,
            'data_abertura' => $this->data_abertura,
            'data_fechamento' => $this->data_fechamento,
            'data_criacao' => $this->data_criacao
        ]);
        return true;    
    }
    public function atualizar(){
        $this->data_abertura = date('y-m-d', strtotime($this->data_abertura));
        $this->data_fechamento = date('y-m-d', strtotime($this->data_fechamento));
        date_default_timezone_set('America/Sao_Paulo');
        $this->data_criacao = date('y-m-d H:i:s');
        return (new DataBase('vagas'))->update('id = '.$this->id, [
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'quantidade' => $this->quantidade,
            'remuneracao' => $this->remuneracao,
            'data_abertura' => $this->data_abertura,
            'data_fechamento' => $this->data_fechamento,
            'data_criacao' => $this->data_criacao
        ]);
        
    }
    public function excluir(){
        return (new DataBase('vagas'))->delete('id = '.$this->id);
    }

    public static function getVaga($id){
        return (new DataBase('vagas'))->select('id = '.$id)->fetchObject(self::class);
    }
    public static function getVagas($where = null, $order = null, $limit=null){
        return (new DataBase('vagas'))->select($where, $order,$limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }
    public static function getQuantidadeVagas($where = null)
    {
        return (new DataBase('vagas'))->select($where, null, null, 'COUNT(*) as qtd')
            ->fetchObject()
            ->qtd;
    }
}