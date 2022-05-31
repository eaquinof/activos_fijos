<?php
    if(!isset($_POST['codmoneda'])){
        header('Location: ../monedaeditar.php?mensaje=error');
    }

    include '../config/conexion.php';
    $codmoneda = $_POST['codmoneda'];
    $divisa = $_POST['divisa'];
    $simbolo = $_POST['simbolo'];

    $sentencia = $bd->prepare("UPDATE activos.moneda SET divisa = ?, simbolo = ?  where codmoneda = ?;");
    $resultado = $sentencia->execute([$divisa, $simbolo, $codmoneda]);

    if ($resultado === TRUE) {
        header('Location: ../moneda.php?mensaje=editado');
    } else {
        header('Location: ../monedaeditar.php?mensaje=error');
        exit();
    }
    
?>