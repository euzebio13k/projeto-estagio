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
foreach ($obAlunos as $aluno) {
    $resultados .= '<tr>
                            <td>' . $aluno->id . '</td>
                            <td>' . $aluno->nome . '</td>
                            <td>' . $aluno->telefone . '</td>
                            <td>' . $aluno->email_institucional . '</td>
                            <td>' . $aluno->curso . '</td>
                            <td>' . $aluno->periodo . '</td>
                            <td>' . date('d/m/Y', strtotime($aluno->dtn)) . '</td>
                            <td><a href="vizualizar.php?id=' . $aluno->id . '"><button class="btn btn-sm btn-info">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg></button></a>
                            </td>
                            <td><a href="editar.php?id=' . $aluno->id . '"><button type="button" class="btn btn-sm btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg></button></a>  
                            </td>
                    </tr>';
}
$resultados = strlen($resultados) ? $resultados : '<tr><td colspan="6" class="text=center">Nenhum aluno encontrado</td></tr>';
//GETS
unset($_GET['status']);
unset($_GET['pagina']);
$gets = http_build_query($_GET);
/*
echo "<pre>";
print_r($gets);
echo "</pre>";
*/
//Paginação
$paginacao = '';
$paginas = $obPagination->getPages();
$paginacao .= '<li class="page-item"><a class="page-link" href="?pagina=1&'.$gets.'">&laquo;</a></li>';
foreach ($paginas as $key => $pagina) {
    
    if($pagina['atual']){
        if(($pagina['pagina']-2) > 0){
            $paginacao .= '<li class="page-item"><a class="page-link" href="?pagina=' . $pagina['pagina']-1 . '&' . $gets . '">Anterior</a></li>';
        }
        if(($pagina['pagina']-2) > 0){
            $paginacao .= '<li class="page-item"><a class="page-link" href="?pagina=' . $pagina['pagina']-2 . '&' . $gets . '">' . $pagina['pagina']-2 . '</a></li>';
        }
        if(($pagina['pagina']-1) > 0){
            $paginacao .= '<li class="page-item"><a class="page-link" href="?pagina=' . $pagina['pagina']-1 . '&' . $gets . '">' . $pagina['pagina']-1 . '</a></li>';
        }       
        $paginacao .= '<li class="page-item"><a class="page-link active" href="?pagina=' . $pagina['pagina'] . '&' . $gets . '">' . $pagina['pagina'] . '</a></li>';
        if(($pagina['pagina']+1) <= count($paginas)){
            $paginacao .= '<li class="page-item"><a class="page-link" href="?pagina=' . $pagina['pagina']+1 . '&' . $gets . '">' . $pagina['pagina']+1 . '</a></li>';
        }
        if(($pagina['pagina']+2) <= count($paginas)){
            $paginacao .= '<li class="page-item"><a class="page-link" href="?pagina=' . $pagina['pagina']+2 . '&' . $gets . '">' . $pagina['pagina']+2 . '</a></li>';
        }
        if(($pagina['pagina']+2) <= count($paginas)){
            $paginacao .= '<li class="page-item"><a class="page-link" href="?pagina=' . $pagina['pagina']+1 . '&' . $gets . '">Proxima</a></li>';
        }
    }
    
}
$paginacao .= '<li class="page-item"><a class="page-link" href="?pagina='.count($paginas).'&'.$gets.'">&raquo;</a></li>';

?>
<main class="container card mt-3">
    <div class="card-header  text-center">
        <h4 class="card-title" id="striped-row-layout-icons">Lista de Alunos</h4>
    </div>
    <div class="card-body">

        <?= $mensagem ?>

        <section>

            <form method="GET">
                <div class="row my-4">
                    <div class="col">
                        <label>Buscar por titulo</label>
                        <input type="search" class="form-control" placeholder="Pesquisar" name="busca"
                            value="<?= $busca ?>">
                    </div>
                    <div class="col">
                        <label>Status</label>
                        <select class="form-control" name="curso" id="curso">
                            <option value="">Selecione o Curso</option>
                            <option value="Técnico em Administração - Integrada - Série Anual" <?= $curso == 'Técnico em Administração - Integrada - Série Anual' ? 'selected' : '' ?>>Técnico em Administração -
                                Integrada - Série Anual</option>
                            <option
                                value="Técnico em Meio Ambiente - Integrada - Série Anual<?= $curso == 'Técnico em Meio Ambiente - Integrada - Série Anual' ? 'selected' : '' ?>">
                                Técnico em Meio Ambiente - Integrada - Série Anual</option>
                            <option
                                value="Técnico em Informática para Internet - Integrada - Série Anual<?= $curso == 'Técnico em Informática para Internet - Integrada - Série Anual' ? 'selected' : '' ?>">
                                Técnico em Informática para Internet - Integrada - Série Anual</option>
                        </select>
                    </div>
                    <div class="col">
                        <label>Status</label>
                        <select class="form-control" name="periodo" id="periodo">
                            <option value="">Selecione o Periodo</option>
                            <option value="1º" <?= $periodo == '1º' ? 'selected' : '' ?>>1º</option>
                            <option value="2º" <?= $periodo == '2º' ? 'selected' : '' ?>>2º</option>
                            <option value="3º" <?= $periodo == '3º' ? 'selected' : '' ?>>3º</option>
                            <option value="4º" <?= $periodo == '4º' ? 'selected' : '' ?>>4º</option>
                            <option value="5º" <?= $periodo == '5º' ? 'selected' : '' ?>>5º</option>
                            <option value="6º" <?= $periodo == '6º' ? 'selected' : '' ?>>6º</option>
                            <option value="7º" <?= $periodo == '7º' ? 'selected' : '' ?>>7º</option>
                            <option value="8º" <?= $periodo == '8º' ? 'selected' : '' ?>>8º</option>
                        </select>
                    </div>
                    <div class="col-1 d-flex align-items-end">
                        <button class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                    </div>
                    <div class="col-2 d-flex align-items-end">
                        <a href="/si/aluno/cadastrar.php"><button class="btn btn-success">Novo Aluno</button></a>
                    </div>
                </div>
            </form>
            <table class="table bg-light table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Nome</th>
                        <th>Matricula</th>
                        <th>Telefone</th>
                        <th>Email Institucional</th>
                        <th>Curso</th>
                        <th>Periodo</th>
                        <th>Data de Nascimento</th>
                        <th colspan="2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $resultados ?>
                </tbody>
            </table>
        </section>
        <nav>
            <ul class="pagination">
                
                <?= $paginacao ?>
                
            </ul>
        </nav>
    </div>
</main>