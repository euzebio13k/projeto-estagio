<main class="container card mt-3">
    <div class="card-header bg-primary-subtle text-center">
        <h4 class="card-title" id="striped-row-layout-icons"><?=TITLE?></h4>
    </div>
    <div class="card-body">
    
    <form action="" method="post" class="form form-horizontal striped-rows form-bordered">
        <div class="form-group">
            <label for="vaga">Selecione a vaga</label>
            <select name="vaga" class="form-select" required>
                <option selected>...</option>
                <?php include ('../includes/select-vaga.php'); ?>
            </select>
        </div>
        <div class="form-group">
        <a href="/si/index.php">
            <button class="btn btn-primary">Voltar</button>
        </a>
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </form>
</div>
</main>