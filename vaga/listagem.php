<?php

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
foreach ($vagas as $vaga) {
    $resultados .= '<tr>
                            <td>' . $vaga->id . '</td>
                            <td>' . $vaga->titulo . '</td>
                            <td>' . $vaga->descricao . '</td>
                            <td>' . ($vaga->ativo == 's' ? 'Ativo' : 'Inativo') . '</td>
                            <td>' . date('d/m/Y  á\s H:i:s', strtotime($vaga->data)) . '</td>
                            <td><a href="editar.php?id=' . $vaga->id . '"><button type="button" class="btn btn-sm btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg>
            </button></a>  
            <a href="excluir.php?id=' . $vaga->id . '"><button type="button" class="btn btn-sm btn-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg>
            
            </button></a></td>
                        </tr>';
}
$resultados = strlen($resultados) ? $resultados : '<tr><td colspan="6" class="text=center">Nenhuma vaga encontrada</td></tr>';

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

?>
<main class="container card mt-3">
    <div class="card-header  text-center">
        <h4 class="card-title" id="striped-row-layout-icons">Lista de Vagas</h4>
    </div>
    <div class="card-body">

        <?= $mensagem ?>

        <section>
            <a href="cadastrar.php">
                <button class="btn btn-success"> Nova vaga</button>
            </a>
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
                    <div class="col d-flex align-items-end">
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                    </div>
                </div>
            </form>
        </section>

        <section>

            <table class="table bg-light mt-3">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Data</th>
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