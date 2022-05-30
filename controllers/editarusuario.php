<?php
    //print_r($_POST);
    if($_POST["pass"] != $_POST["pass2"]){
        header('Location: ../usuarioeditar.php?mensaje=diferente');
        exit();
    }

    if(!isset($_POST['codusr'])){
        header('Location: ../usuarioeditar.php?mensaje=error');
    }

    include '../config/conexion.php';
    $Pass = $_POST['pass'];
    $rol = $_POST['rol'];
    

    $sentencia = $bd->prepare("UPDATE activos.usuario SET password = ?, rol = ? where codusr = ?;");
    $resultado = $sentencia->execute([$Pass, $rol, $codusr]);

    if ($resultado === TRUE) {
        header('Location: ../usuarios.php?mensaje=editado');
    } else {
        header('Location: ../usuarioeditar.php?mensaje=error');
        exit();
    }
    
?>