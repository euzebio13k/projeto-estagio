<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Upload de Arquivos</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="alert alert-danger"><?=$msg?></div>
        <label>Arquivo</label>
        <input type="file" name="arquivo">
        <br><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>