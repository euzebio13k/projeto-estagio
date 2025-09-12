<?php

use App\Entity\Aluno;
use App\Entity\Vaga;

$mensagem = '';
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
foreach ($inscricoes as $inscricao) {
    
    $inscricao->aluno = Aluno::getAluno($inscricao->id_aluno);
    $inscricao->vaga = Vaga::getVaga($inscricao->id_vaga); 
    $resultados .= '<tr>
                            <td>' . $inscricao->id . '</td>
                            <td>' . $inscricao->aluno->nome . '</td>
                            <td>' . $inscricao->vaga->titulo . '</td>
                            <td>' . $inscricao->status . '</td>
            <td>' . $inscricao->data_inscricao . '</td>
            <td><a href="editar.php?id=' . $inscricao->id . '"><button type="button" class="btn btn-sm btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg>
            </button></a>  
            <a href="excluir.php?id=' . $inscricao->id . '"><button type="button" class="btn btn-sm btn-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg>
            
            </button></a></td>
    
    </tr>';
}
$resultados = strlen($resultados) ? $resultados : '<tr><td colspan="6" class="text=center">Nenhuma inscricao encontrada</td></tr>';

//GETS
unset($_GET['status']);
unset($_GET['pagina']);
$gets = http_build_query($_GET);

//Paginação
$paginacao = '';
$paginas = $obPagination->getPages();
foreach ($paginas as $key => $pagina) {
    $class = $pagina['atual'] ? 'btn-primary' : 'btn-light';
    $paginacao .= '<a href="?pagina=' . $pagina['pagina'] . '&' . $gets . '">
        <button type="button" class="btn ' . $class . '">' . $pagina['pagina'] . '</button></a>';
}
/*
echo "<pre>";  
print_r($inscricao); 
echo "</pre>"; 
//exit;
*/
?>
<main class="container card mt-3">
    <div class="card-header  text-center">
        <h4 class="card-title" id="striped-row-layout-icons">Lista de Inscricaos</h4>
    </div>
    <div class="card-body">

        <?= $mensagem ?>

        <section>

        </section>
        <section>
            <form method="GET">
                <div class="row my-4">
                    <div class="col">
                        <label>Buscar por titulo</label>
                        <input type="text" name="busca" class="form-control" value="<?= $busca ?>">
                    </div>
                    <div class="col">
                        <label>Status</label>
                        <select name="filtroStatus" class="form-control">
                            <option value="">Ativa/Inativa</option>
                            <option value="s" <?= $filtroStatus == 's' ? 'selected' : '' ?>>Ativa</option>
                            <option value="n" <?= $filtroStatus == 'n' ? 'selected' : '' ?>>Inativa</option>
                        </select>
                    </div>
                    <div class="col-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                    </div>
                    
                </div>
            </form>
        </section>

        <section>

            <table class="table bg-light table-hover mt-3">

                <thead class="table-dark">
                    <tr>
                        <th>Numero</th>
                        <th>Candidato</th>
                        <th>Vaga</th>
                        <th>Status</th>
                        <th>Data da Inscrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $resultados ?>
                </tbody>
            </table>
        </section>
        <section>
            <?= $paginacao ?>
        </section>
    </div>
</main>