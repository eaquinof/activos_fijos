<?php 
    if(!isset($_GET['idempresa'])){
        header('Location: ../empresas.php?mensaje=error');
        exit();
    }

    include '../config/conexion.php';
    $idempresa = $_GET['idempresa'];

    $sentencia = $bd->prepare("DELETE FROM activos.empresa where idempresa = ?;");
    $resultado = $sentencia->execute([$idempresa]);

    if ($resultado === TRUE) {
        header('Location: ../empresas.php?mensaje=eliminado');
    } else {
        header('Location: ../empresas.php?mensaje=error');
    }
    
?>