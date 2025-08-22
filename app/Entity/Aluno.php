<?php

namespace App\Entity;

use \App\Db\DataBase;
use \PDO;

class Aluno{

    /**
     * Identificador unico da vaga
     * @var integer
     */
    public $id;
    public $nome;
    public $cpf;
    public $telefone;
    public $email_pessoal;
    public $email_institucional;
    public $curso;
    public $periodo;
    public $dtn;
    public $senha;

    public function cadastrar(){
        
        //DEFINIR DATA 
        $this->dtn = date('y-m-d', strtotime($this->dtn)); 
        //INSERIR O ALUNO NO BANCO
        $obDataBase = new DataBase('alunos');
        $this->id = $obDataBase->insert([
                                            'nome'    => $this->nome,
                                            'cpf'     => $this->cpf,
                                            'telefone'     => $this->telefone,
                                            'email_pessoal'     => $this->email_pessoal,
                                            'email_institucional'     => $this->email_institucional,
                                            'curso'     => $this->curso,
                                            'periodo'     => $this->periodo,
                                            'dtn'      => $this->dtn,
                                            'senha'    => $this->senha
                                        ]);
        //RETORNAR SUCESSO 
        return true;

    }

    public function atualizar(){
        return (new DataBase('alunos'))->update('id = '. $this->id,[
                                            'nome'    => $this->nome,
                                            'cpf'     => $this->cpf,
                                            'telefone'     => $this->telefone,
                                            'email_pessoal'     => $this->email_pessoal,
                                            'email_institucional'     => $this->email_institucional,
                                            'curso'     => $this->curso,
                                            'periodo'     => $this->periodo,
                                            'dtn'      => $this->dtn,
                                            'senha'    => $this->senha
                                        ]);
    }


    public function excluir(){
    return (new DataBase('alunos'))->delete('id = '. $this->id);   
    }
/**
 * metodo responsavel por obter as vagas do banco de dados 
 * @param string $where
 * @param string $order
 * @param string $limit
 * @return array
 */


public static function getAlunos($where= null, $order = null, $limit = null){
    return (new DataBase('alunos'))->select($where, $order, $limit)
                                  ->fetchAll(PDO::FETCH_CLASS, self::class);


    }

    public static function getAluno($id){
        return (new DataBase('alunos'))->select('id = '.$id)
                                      -> fetchObject(self::class);

    }
    public static function getAlunoCpf($cpf){
        return (new DataBase('alunos'))->select('cpf = "'.$cpf.'"')
                                      -> fetchObject(self::class);

    }

}