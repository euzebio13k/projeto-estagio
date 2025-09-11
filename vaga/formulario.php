<main class="container card mt-3">
    <div class="card-header bg-primary-subtle text-center">
        <h4 class="card-title" id="striped-row-layout-icons"><?=TITLE?></h4>
    </div>
    <div class="card-body">
    
    <form action="" method="post" class="form form-horizontal striped-rows form-bordered">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label bg-primary-subtle text-center" for="titulo">Título</label>
            <div class="col-sm-10">
                <input type="text" name="titulo" class="form-control" required value="<?=$vaga->titulo?>">
            </div>    
        </div>           
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label bg-primary-subtle text-center" for="descricao">Descrição</label>
            <div class="col-sm-10">
                <textarea name="descricao" class="form-control"required ><?=$vaga->descricao?></textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label bg-primary-subtle text-center" for="quantidade">Quantidade</label>
            <div class="col-sm-10">
                <input type="number" name="quantidade" class="form-control" required value="<?=$vaga->quantidade?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label bg-primary-subtle text-center" for="remuneracao">Remuneração</label>
            <div class="col-sm-10">
                <input type="text" name="remuneracao" class="form-control" required value="<?=$vaga->remuneracao?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label bg-primary-subtle text-center" for="data_abertura">Data de Abertura</label>
            <div class="col-sm-10">
                <input type="date" name="data_abertura" class="form-control" required value="<?=$vaga->data_abertura?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label bg-primary-subtle text-center" for="data_fechamento">Data de Encerramento</label>
            <div class="col-sm-10">
                <input type="date" name="data_fechamento" class="form-control" required value="<?=$vaga->data_fechamento?>">
            </div>
        </div>
        <div class="form-group">
        <a href="/sistemas/vaga/listar.php">
            <button class="btn btn-primary">Voltar</button>
        </a>
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </form>
</div>
</main>