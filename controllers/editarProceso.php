<?php
    print_r($_POST);
    if(!isset($_POST['idActivo'])){
        header('Location: ../index.php?mensaje=error');
    }

    include '../config/conexion.php';
    $idActivo = $_POST['idActivo'];
    $Descripcion = $_POST['txtDescripcion'];
    $Serial = $_POST['txtSerial'];
    $Valor = $_POST['txtValor'];
    $FechaCompra = $_POST['txtFechaCompra'];

    $sentencia = $bd->prepare("UPDATE Activo SET Descripcion = ?, No_Serial = ?, Valor = ?, FechaCompra = ? where idActivo = ?;");
    $resultado = $sentencia->execute([$Descripcion, $Serial, $Valor, $FechaCompra, $idActivo]);

    if ($resultado === TRUE) {
        header('Location: ../activos.php?mensaje=editado');
    } else {
        header('Location: ../activos.php?mensaje=error');
        exit();
    }
    
?>