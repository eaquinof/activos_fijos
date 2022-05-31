<?php
    if(!isset($_POST['idEmpleado'])){
        header('Location: ../empleadoeditar.php?mensaje=error');
    }

    include '../config/conexion.php';
    $idempleado = $_POST['idempleado'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $depto = $_POST['depto'];
    

    $sentencia = $bd->prepare("UPDATE activos.empleado SET nombre = ?, apellido = ?, departamento = ? where idEmpleado = ?;");
    $resultado = $sentencia->execute([$nombre, $apellido, $depto, $idempleado]);

    if ($resultado === TRUE) {
        header('Location: ../empleados.php?mensaje=editado');
    } else {
        header('Location: ../empleadoeditar.php?mensaje=error');
        exit();
    }
    
?>