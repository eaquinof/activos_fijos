<?php


    if(empty($_POST["oculto"]) || empty($_POST["tasa"]) || empty($_POST["fecha"]) || empty($_POST["codmoneda"])){
        header('Location: ../tasacamcrear.php?mensaje=falta');
        exit();
    }

    include '../config/conexion.php';
    $codmoneda = $_POST["codmoneda"];
    $tasa = $_POST["tasa"];
    $fecha = $_POST["fecha"];
    
    $sentencia = $bd->prepare("INSERT INTO activos.tasa_cambio(codmoneda,tasa,fecha) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$codmoneda,$tasa,$fecha]);

    if ($resultado === TRUE) {
        header('Location: ../tasascambio.php?mensaje=registrado');
    } else {
        header('Location: ../tasascambio.php?mensaje=error');
        exit();
    }
    
?>