<?php
namespace App\Entity;

use App\Db\DataBase;
use PDO;
use DateTime;

class Inscricao{
    
    public $id;
    public $vaga;
    public $aluno;
    public $data_inscricao;
    public $status;
    
    public function cadastrar(){
        date_default_timezone_set('America/Sao_Paulo');
        $this->data_inscricao = date('y-m-d H:i:s');
        $banco = new DataBase('inscricao');
        $this->id = $banco->insert([
            'id_vaga' => $this->vaga->id,
            'id_aluno' => $this->aluno->id,
            'status' => $this->status,
            'data_inscricao' => $this->data_inscricao
        ]);
        return true;    
    }
    public function atualizar(){
        date_default_timezone_set('America/Sao_Paulo');
        $this->data_inscricao = date('y-m-d H:i:s');
        return (new DataBase('inscricao'))->update('id = '.$this->id, [
            'id_vaga' => $this->vaga->id,
            'id_aluno' => $this->aluno->id,
            'status' => $this->status,
            'data_inscricao' => $this->data_inscricao
        ]);
        
    }
    public function excluir(){
        return (new DataBase('inscricao'))->delete('id = '.$this->id);
    }

    public static function getInscricao($id){
        return (new DataBase('inscricao'))->select('id = '.$id)->fetchObject(self::class);
    }
    public static function getInscricoes($where = null, $order = null, $limit=null){
        
        return (new DataBase('inscricao'))->select($where, $order,$limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }
    public static function getQuantidadeInscricoes($where = null)
    {
        return (new DataBase('inscricao'))->select($where, null, null, 'COUNT(*) as qtd')
            ->fetchObject()
            ->qtd;
    }
}