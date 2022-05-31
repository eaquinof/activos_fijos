<?php 
    if(!isset($_GET['codmoneda'])){
        header('Location: ../moneda.php?mensaje=error');
        exit();
    }

    include '../config/conexion.php';
    $codmoneda = $_GET['codmoneda'];

    $sentencia = $bd->prepare("DELETE FROM activos.moneda where codmoneda = ?;");
    $resultado = $sentencia->execute([$codmoneda]);

    if ($resultado === TRUE) {
        header('Location: ../moneda.php?mensaje=eliminado');
    } else {
        header('Location: ../moneda.php?mensaje=error');
    }
    
?>