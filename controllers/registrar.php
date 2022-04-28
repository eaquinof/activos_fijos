<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtDescripcion"]) || empty($_POST["txtValor"]) || empty($_POST["txtFechaCompra"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include '../config/conexion.php';
    //$idActivo = $_POST["txtidActivo"];
    $Descripcion = $_POST["txtDescripcion"];
    $Valor = $_POST["txtValor"];
    $FechaCompra = $_POST["txtFechaCompra"];
    
    $sentencia = $bd->prepare("INSERT INTO Activo(Descripcion,Valor,FechaCompra) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$Descripcion,$Valor,$FechaCompra]);

    if ($resultado === TRUE) {
        header('Location: ../activos.php?mensaje=registrado');
    } else {
        header('Location: ../activos.php?mensaje=error');
        exit();
    }
    
?>