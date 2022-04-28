<?php

session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: ./home.php');
}
require 'config/conexion.php';

if (!empty($_POST['usuario']) && !empty($_POST['clave'])) {
    $records = $bd->prepare('SELECT codusr, usuariocol, password FROM usuario WHERE codusr = :codusr');
    $records->bindParam(':codusr', $_POST['usuario']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && ($_POST['clave'] == $results['password'])) {
        // Aqui se puede agregar un $_SESSION con la columna de la empresa al momento de logearse
        $_SESSION['user_id'] = $results['codusr'];
        $_SESSION['empresa'] = $_POST['empresa'];
        header("Location: ./home.php");
    } else {
        $message = '';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACTIVOS-</title>
    <link rel="stylesheet" href="assets/css/style_login.css">
</head>

<body>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Include the above in your HEAD tag -->

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <div class="main">


        <div class="container">
            <center>
                <div id="titulo">
                    <h1>MODULO DE ACTIVOS FIJOS</h1>
                </div>
                <div class="middle">
                    <div id="login">

                        <form action="login.php" method="POST">
                            <p><span class="fa fa-user"></span><input type="text" name="usuario" Placeholder="Usuario"
                                    required></p>
                            <p><span class="fa fa-lock"></span><input type="password" name="clave" Placeholder="Clave"
                                    required></p>
                            <p>
                                <span class="fa fa-building"></span>
                                <select class="input-select" style="background-color: #fff; border-radius: 0px 3px 3px 0px; color: #000; margin-bottom: 1em; padding:16px; width: 200px; height:50px;" id="empresa" name="empresa" required>
                                    <option value="0"> Seleccione la empresa </option>
                                    <?php
                                        $record = $bd->query("SELECT * FROM empresa");
                                        while($row = $record->fetch()) {
                                            echo '<option value="'.$row['idempresa'].'">'.$row['nombreempresa'].'</option>';
                                        }
                                    ?>
                                </select>
                            </p>
                            <input type="submit" value="Ingresar">
                        </form>

                        <div class="clearfix"></div>

                    </div> <!-- end login -->
                    <div class="logo">
                        <img src="assets/img/logo.png" alt="Logo">
                        <div class="clearfix"></div>
                    </div>

                </div>
            </center>
            <div>
                <!-- PIE DE PÁGINA -->
                <footer id="footer">
                    <p>Grupo 2 Ingenieria de Software UMG Portales &copy; <?=date('Y')?></p>
                </footer>
            </div>
        </div>
    </div>
</body>

</html>