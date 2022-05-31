<?php 
    if(!isset($_GET['idEmpleado'])){
        header('Location: ../empleados.php?mensaje=error');
        exit();
    }

    include '../config/conexion.php';
    $idEmpleado = $_GET['idEmpleado'];

    $sentencia = $bd->prepare("DELETE FROM activos.empleado where idEmpleado = ?;");
    $resultado = $sentencia->execute([$idEmpleado]);

    if ($resultado === TRUE) {
        header('Location: ../empleados.php?mensaje=eliminado');
    } else {
        header('Location: ../empleados.php?mensaje=error');
    }
    
?>