
<?php
  session_start();

  require 'config/conexion.php';
  if(isset($_SESSION['user_id'])) {
    $records = $bd->prepare('SELECT codusr FROM usuario WHERE codusr = :codusr');
    $records->bindParam(':codusr', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user  = null;

    if(count($results) > 0) {
      $user = $results;
    }
  }
?>

<!doctype html>
<html lang="es">
  <head>
    <title>INVENTARIO DE ACTIVOS FIJOS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- cdn icnonos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
  </head>
 <body>
   <div class="container-fluid bg-primary">
          <div class="row">
              <div class="col-md">
                  <header class="py-3">
                      <h3 class="text-center text-white" >INVENTARIO DE ACTIVOS FIJOS</h3>
                      <div>
                        <a class="btn btn-info cursor-pointer" href="logout.php">Logout </a>
                      </div>
                      <span class="text-white text-uppercase">Bienvenido <?= $user['codusr']; ?></span>
                  </header>
              </div>
          </div>
      </div>