<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtSerial"]) || empty($_POST["txtDescripcion"]) || empty($_POST["txtValor"]) || empty($_POST["txtFechaCompra"])){
        header('Location: activocrear.php?mensaje=falta');
        exit();
    }

    include '../config/conexion.php';
    $Serial = $_POST["txtSerial"];
    $Descripcion = $_POST["txtDescripcion"];
    $Valor = $_POST["txtValor"];
    $FechaCompra = $_POST["txtFechaCompra"];
    
    $sentencia = $bd->prepare("INSERT INTO Activo(Descripcion,No_Serial,Valor,FechaCompra) VALUES (?,?,?,?);");
    $resultado = $sentencia->execute([$Descripcion,$Serial,$Valor,$FechaCompra]);

    if ($resultado === TRUE) {
        header('Location: ../activos.php?mensaje=registrado');
    } else {
        header('Location: ../activocrear.php?mensaje=error');
        exit();
    }
    
?>