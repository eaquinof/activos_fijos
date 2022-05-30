<?php
    if(!isset($_POST['idempresa'])){
        header('Location: ../empresaeditar.php?mensaje=error');
    }

    include '../config/conexion.php';
    $idempresa = $_POST['idempresa'];
    $nomempresa = $_POST['nomempresa'];

    $sentencia = $bd->prepare("UPDATE activos.empresa SET nombreempresa = ? where idempresa = ?;");
    $resultado = $sentencia->execute([$nomempresa, $idempresa]);

    if ($resultado === TRUE) {
        header('Location: ../empresas.php?mensaje=editado');
    } else {
        header('Location: ../empresaeditar.php?mensaje=error');
        exit();
    }
    
?>