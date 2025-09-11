<main class="container card mt-3">
    <div class="card-header  text-center">
        <h4 class="card-title" id="striped-row-layout-icons"><?= TITLE ?></h4>
    </div>
    <div class="card-body">

        <section>
            <a href="listar.php">
                <button class="btn btn-success"> Voltar</button>
            </a>
        </section>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="label-control" for="foto">Foto* (png, jpg ou jpeg):</label>
                <div class="col-md-6">
                    <label class="col-md-6 custom-file-label" for="target"></label>
                    <input type="file" name="arquivo" accept=".png, .jpg, .jpeg, .JPG, .PNG, .JPEG"
                        class="custom-file-input">
                </div>
            </div>
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name="nome" value="<?= $obAluno->nome ?>" required>
            </div>
            <div class="form-group">
                <label>Matricula</label>
                <input type="text" class="form-control" name="matricula" value="<?= $obAluno->matricula ?>" required>
            </div>
            <div class="form-group">
                <label>CPF</label>
                <input type="text" class="form-control" name="cpf" value="<?= $obAluno->cpf ?>" required>
            </div>
            <div class="form-group">
                <label>Telefone</label>
                <input type="text" class="form-control" name="telefone" value="<?= $obAluno->telefone ?>" required>
            </div>

            <div class="form-group">
                <label>Email Pessoal</label>
                <input type="email" class="form-control" name="email_pessoal" value="<?= $obAluno->email_pessoal ?>" required>
            </div>
            <div class="form-group">
                <label>Email Institucional</label>
                <input type="email" class="form-control" name="email_institucional" value="<?= $obAluno->email_institucional ?>" required>
            </div>

            <div class="form-group">
                <label>Curso</label>
                <input type="text" class="form-control" name="curso" value="<?= $obAluno->curso ?>" required>
            </div>
            <div class="form-group">
                <label>Periodo</label>
                <input type="number" class="form-control" name="periodo" value="<?= $obAluno->periodo ?>" required>
            </div>

            <div class="form-group">
                <label>Data de Nascimento</label>
                <input type="date" class="form-control" name="dtn" value="<?= $obAluno->dtn ?>" required>
            </div>
<?php 
if(TITLE == 'Cadastrar aluno' )
{
?>    
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control" value="">
            </div>
<?php
}
?>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form>
    </div>
</main>