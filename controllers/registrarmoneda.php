<?php

    if(empty($_POST["oculto"]) || empty($_POST["codmoneda"])|| empty($_POST["divisa"])|| empty($_POST["simbolo"])){
        header('Location: ../monedacrear.php?mensaje=falta');
        exit();
    }

    include '../config/conexion.php';
    $codmoneda = $_POST["codmoneda"];
    $divisa = $_POST["divisa"];
    $simbolo = $_POST["simbolo"];
    
    $sentencia = $bd->prepare("INSERT INTO activos.moneda(codmoneda, divisa, simbolo) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$codmoneda,$divisa,$simbolo]);

    if ($resultado === TRUE) {
        header('Location: ../moneda.php?mensaje=registrado');
    } else {
        header('Location: ../moneda.php?mensaje=error');
        exit();
    }
    
?>