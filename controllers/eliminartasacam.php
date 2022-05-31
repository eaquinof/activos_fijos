<?php 
    if(!isset($_GET['codmoneda'])||!isset($_GET['fecha'])){
        header('Location: ../tasascambio.php?mensaje=error');
        exit();
    }

    include '../config/conexion.php';
    $codmoneda = $_GET['codmoneda'];
    $fecha = $_GET['fecha'];

    $sentencia = $bd->prepare("DELETE FROM activos.tasa_Camio where codmoneda = ? AND fecha = ?;");
    $resultado = $sentencia->execute([$codmoneda, $fecha]);

    if ($resultado === TRUE) {
        header('Location: ../tasascambio.php?mensaje=eliminado');
    } else {
        header('Location: ../tasascambio.php?mensaje=error');
    }
    
?>