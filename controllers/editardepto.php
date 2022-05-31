<?php
    if(!isset($_POST['idDepto'])){
        header('Location: ../deptoeditar.php?mensaje=error');
    }

    include '../config/conexion.php';
    $idDepto = $_POST['idDepto'];
    $descrip = $_POST['descrip'];

    $sentencia = $bd->prepare("UPDATE activos.departamento SET descripcion = ? where iddepto = ?;");
    $resultado = $sentencia->execute([$descrip, $idDepto]);

    if ($resultado === TRUE) {
        header('Location: ../departamentos.php?mensaje=editado');
    } else {
        header('Location: ../deptoeditar.php?mensaje=error');
        exit();
    }
    
?>