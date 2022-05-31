<?php

    if(empty($_POST["oculto"]) || empty($_POST["nombre"])|| empty($_POST["apellido"])|| empty($_POST["depto"])){
        header('Location: ../empleadocrear.php?mensaje=falta');
        exit();
    }

    include '../config/conexion.php';
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $depto = $_POST["depto"];
    
    $sentencia = $bd->prepare("INSERT INTO activos.empleado(nombre, apellido, departamento) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$nombre,$apellido,$depto]);

    if ($resultado === TRUE) {
        header('Location: ../empleados.php?mensaje=registrado');
    } else {
        header('Location: ../empleados.php?mensaje=error');
        exit();
    }
    
?>