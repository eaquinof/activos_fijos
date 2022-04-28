<?php
session_start();

require 'config/conexion.php';

if (isset($_SESSION['user_id']) && isset($_SESSION['empresa'])) {
    $records = $bd->prepare('SELECT codusr FROM usuario WHERE codusr = :codusr');
    $records->bindParam(':codusr', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $empresa = $bd->prepare('SELECT nombreempresa FROM empresa where idempresa = :id');
    $empresa->bindParam(':id', $_SESSION['empresa']);
    $empresa->execute();
    $empresaResult = $empresa->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
        $user = $results;
    }
}
?>

<nav class="navbar navbar-expand-lg navbar-primary bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand text-white text-bold text-uppercase ms-4" href="index.php">Activos fijos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
      </ul>

        <div class="dropdown me-4">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person"></i> 
                <span class="text-uppercase"> <?=$user['codusr'];?></span> | <span class="text-uppercase"><?=$empresaResult['nombreempresa'];?></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
  </div>
</nav>