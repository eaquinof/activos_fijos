<?php
/*
    if(empty($_POST["oculto"]) || ($_POST["empleado"] != "0") || ($_POST["activo"] != "0")){
        header('Location: ../asignaractivos.php?mensaje=falta');
        exit();
    }
*/
    include '../config/conexion.php';
    $empleado = $_POST["empleado"];
    $activo = $_POST["activo"];
    
    $sentencia = $bd->prepare("INSERT INTO activos.asignacion(idEmpleado, idActivo, FechaAsigna) VALUES (?,?,sysdate());");
    $resultado = $sentencia->execute([$empleado,$activo]);

    if ($resultado === TRUE) {
        header('Location: ../asignaractivos.php?mensaje=registrado');
    } else {
        header('Location: ../asignaractivos.php?mensaje=error');
        exit();
    }
    
?>