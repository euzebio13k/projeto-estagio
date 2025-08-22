<?php
 
  $mensagem ='';
  if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'sucess':
            $mensagem = '<div class="alert alert-sucess">Ação executada com sucesso!</div>';
            break;

            case 'error':
                $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
                break;
    }
  }

    $resultados = '';
    foreach ($obAlunos as $aluno){
        $resultados .= '<tr>
                            <td>'.$aluno->id.'</td>
                            <td>'.$aluno->nome.'</td>
                            <td>'.$aluno->cpf.'</td>
                            <td>'.$aluno->telefone.'</td>
                            <td>'.$aluno->email_pessoal.'</td>
                            <td>'.$aluno->email_institucional.'</td>
                            <td>'.$aluno->curso.'</td>
                            <td>'.$aluno->periodo.'</td>
                            <td>'.date('d/m/Y',strtotime($aluno->dtn)).'</td>
                            <td>
                               <a href="editar.php?id='.$aluno->id.'">
                                <button type="button" class="btn btn-primary">Editar</button>
                               </a>
                               <a href="excluir.php?id='.$aluno->id.'">
                                <button type="button" class="btn btn-danger">Excluir</button>
                               </a>
                             </td>
                        </tr>';
    }
       $resultados = strlen($resultados) ? $resultados :'<tr.
                                                            <td colspan="6" class="text=center">
                                                            Nenhuma aluno encontrada
                                                            </td>
                                                          </tr>';
?>
<main>

    <?=$mensagem?>

<section>
    <a href="cadastrar.php">
        <button class="btn btn-success"> Novo aluno</button>
    </a>
</section>

<section>

<table class="table bg-light mt-3"> 
     
    <thead> 
        <tr> 
            <th>ID</th> 
            <th>Nome</th> 
            <th>CPF</th> 
            <th>Telefone</th> 
            <th>Email Pessoal</th> 
            <th>Email Institucional</th>
            <th>Curso</th> 
            <th>Periodo</th> 
            <th>Data de Nascimento</th> 
            <th>Ações</th> 
        </tr>
    </thead>
    <tbody>
            <?= $resultados ?>
    </tbody>
</table>
</section>


</main>
