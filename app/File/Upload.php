<?php
namespace App\File;

class Upload
{
    //nome do arquivo sem extensão
    private $nome;
    //extensão do arquivo sem o .
    private $extensao;
    private $tipo;
    private $nomeTemp;
    private $erro;
    private $tamanho;

    public function getNomeComExtensao(){
        $extensao = strlen($this->extensao) ? '.'.$this->extensao : '';
        return $this->nome.$extensao;
    }
    public function __construct($file)
    {
        $this->tipo = $file['type'];
        $this->nomeTemp = $file['tmp_name'];
        $this->erro = $file['error'];
        $this->tamanho = $file['size'];

        $info = pathinfo($file['name']);
        $this->nome = $info['filename'];
        $this->extensao = $info['extension'];
        
    }
    public function upload($dir, $nome)
    {
        $msg = '';
        switch ($this->erro) {
            case 0:
                if($nome != null){
                    $extensao = strlen($this->extensao) ? '.'.$this->extensao : '';
                    $path = $dir.'/'.$nome.$extensao;    
                }else{
                    $path = $dir.'/'.$this->getNomeComExtensao();
                }
                move_uploaded_file($this->nomeTemp, $path);
                $msg = "Arquivo enviado com sucesso!";
                break;
            case 1:
                $msg = 'O arquivo excede o limite de tamanho do servidor';
                break;
            case 2:
                $msg = 'O arquivo excede o limite definido no formulário';
                break;
            case 3:
                $msg = 'O arquivo carregado foi carregado apenas parcialmente';
                break;
            case 4:
                $msg = 'Nenhum arquivo foi enviado';
                break;
            case 5:
                $msg = 'Erro ao enviar o arquivo';
                break;
            case 6:
                $msg = 'Pasta temporária ausente';
                break;
            case 7:
                $msg = 'Falha ao gravar o arquivo no disco';
                break;
            case 8:
                $msg = 'Uma extensão PHP interrompeu o carregamento do arquivo';
                break;    
        }
        return $msg;
    }

}
