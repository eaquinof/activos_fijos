<?php
//    print_r($_POST);

    if(empty($_POST["oculto"]) || empty($_POST["descrip"])){
        header('Location: ../deptocrear.php?mensaje=falta');
        exit();
    }

    include '../config/conexion.php';
    $descrip = $_POST["descrip"];
    
    $sentencia = $bd->prepare("INSERT INTO activos.departamento(descripcion) VALUES (?);");
    $resultado = $sentencia->execute([$descrip]);

    if ($resultado === TRUE) {
        header('Location: ../Departamentos.php?mensaje=registrado');
    } else {
        header('Location: ../deptocrear.php?mensaje=error');
        exit();
    }
    
?>