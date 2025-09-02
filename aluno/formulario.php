<main>


<section>
    <a href="listar.php">
        <button class="btn btn-success"> Voltar</button>
    </a>
</section>

<h2  class="mt-3"><?=TITLE?></h2>

<form method="post">

<div class="form-group">
    <label>Nome</label>
    <input type="text" class="form-control" name="nome" value="<?=$obAluno->nome?>">
</div>

<div class="form-group">
    <label>CPF</label>
    <input type="text" class="form-control" name="cpf" value="<?=$obAluno->cpf?>">
</div>
<div class="form-group">
    <label>Telefone</label>
    <input type="text" class="form-control" name="telefone" value="<?=$obAluno->telefone?>">
</div>

<div class="form-group">
    <label>Email Pessoal</label>
    <input type="email" class="form-control" name="email_pessoal" value="<?=$obAluno->email_pessoal?>">
</div>
<div class="form-group">
    <label>Email Institucional</label>
    <input type="email" class="form-control" name="email_institucional" value="<?=$obAluno->email_institucional?>">
</div>

<div class="form-group">
    <label>Curso</label>
    <input type="text" class="form-control" name="curso" value="<?=$obAluno->curso?>">
</div>
<div class="form-group">
    <label>Periodo</label>
    <input type="number" class="form-control" name="periodo" value="<?=$obAluno->periodo?>">
</div>

<div class="form-group">
    <label>Data de Nascimento</label>
    <input type="date" class="form-control" name="dtn" value="<?=$obAluno->dtn?>">
</div>
<div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="senha" class="form-control" required>
                </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Enviar</button>
    
    </div>

</form>

</main>