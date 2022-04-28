<?php 
    if(!isset($_GET['idActivo'])){
        header('Location: ../index.php?mensaje=error');
        exit();
    }

    include '../config/conexion.php';
    $idActivo = $_GET['idActivo'];

    $sentencia = $bd->prepare("DELETE FROM Activo where idActivo = ?;");
    $resultado = $sentencia->execute([$idActivo]);

    if ($resultado === TRUE) {
        header('Location: ../activos.php?mensaje=eliminado');
    } else {
        header('Location: ../activos.php?mensaje=error');
    }
    
?>