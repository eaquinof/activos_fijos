<?php 
    if(!isset($_GET['idDepto'])){
        header('Location: ../Departamentos.php?mensaje=error');
        exit();
    }

    include '../config/conexion.php';
    $idDepto = $_GET['idDepto'];

    $sentencia = $bd->prepare("DELETE FROM activos.departamento where idDepto = ?;");
    $resultado = $sentencia->execute([$idDepto]);

    if ($resultado === TRUE) {
        header('Location: ../Departamentos.php?mensaje=eliminado');
    } else {
        header('Location: ../Departamentos.php?mensaje=error');
    }
    
?>