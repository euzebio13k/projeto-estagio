<?php
    $msg = strlen($msg) ? '<div class="alert alert-danger">'.$msg.'</div>' : ''; 
?>

<div class="jumbotron text-dark"></div>
    <div class="row">
        <div class="col">
            <form method="POST">
                <h2>Login</h2>
                <?=$msg?>
                <div class="form-group">
                    <label>CPF</label>
                    <input type="text" name="cpf" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="senha" class="form-control" required>
                </div>
                <div class="form-group">
                    
                    <button type="submit" name="acao" value="logar" class="btn btn-primary">Entrar</button>
                </div>
            </form>
        </div>
        <div class="col">
            
        </div>
    </div>
</div>