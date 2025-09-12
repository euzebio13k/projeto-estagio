<?php
  use App\Session\Login;

  $usuarioLogado = Login::getUsuarioLogado();
  if($usuarioLogado){
    $pos_espaco = strpos($usuarioLogado['nome'], ' ' );
    if ($pos_espaco !== false) {
      $nome = substr($usuarioLogado['nome'], 0, $pos_espaco); // Extrai do início até a posição do espaço
    }else{
      $nome = $usuarioLogado['nome'];
    }
  }
  
  $usuario = $usuarioLogado ? 
  '<a href="#" class="mx-2" data-bs-toggle="dropdown" aria-expanded="false">
    <img src="/si/images/alunos/'.$usuarioLogado['cpf'].'.jpg" width="60" height="70" class="rounded-circle">
  </a>
  <button type="button" class="btn btn-primary me-2">'.$nome.'</button>' : 
  '<button type="button" class="btn btn-light me-2"><a href="/si/aluno/cadastrar.php">Cadastrar</a></button>
  <button type="button" class="btn btn-success me-2"><a href="/si/login.php">Entrar</a></button>'
  ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistemas Integrados do IFTO</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="/sistemas/css/estilo.css" rel="stylesheet">
</head>
<body>
  <!-- CACEÇALHO  subtle   -->
  <header class="p-3 mb-3 border-bottom  bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a class="nav" href="/si/index.php">
          <img src="/si/images/logotop.png" width="100px">
        </a>
        <nav class="navbar navbar-expand-lg bg-body-tertiary col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">MENU</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <button class="btn btn-dark btn-sm me-1">
                    <a class="nav-link active text-white" aria-current="page" href="/si/index.php">Página Inicial</a>
                  </button>
                </li>
                <li class="nav-item">
                  <button class="btn btn-dark btn-sm me-1">
                    <a class="nav-link active text-white" aria-current="page" href="/si/aluno/listar.php">Alunos</a>
                  </button>
                </li>
                <li class="nav-item">
                  <button class="btn btn-dark btn-sm me-1">
                    <a class="nav-link active text-white" aria-current="page" href="/si/vaga/listar.php">Vagas de Estagio</a>
                  </button>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Relatorios
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/si/aluno/listar.php">Lista de Alunos</a></li>
                    <li><a class="dropdown-item" href="/si/inscricao/listar.php">Lista de Inscritos</a></li>
                  </ul>
                </li>
              </ul>
              <form class="d-flex ps-2 " role="search">
                <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </div>
        </nav>
        <div class="dropdown align-items-center">
          
          <?=$usuario?>
          <ul class="dropdown-menu text-small">
            
            <li><a class="dropdown-item" href="/si/aluno/editar.php?id=<?=$usuarioLogado['id']?>">Profile</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="/si/logout.php">Sair</a></li>
          </ul>
        </div>
        <div class="d-flex text-center align-items-end ps-3 text-end">
          <a href="/si/logout.php" class="me-lg-auto mb-2 mb-lg-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
              <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </header>
  <!-- FIM DO CACEÇALHO -->