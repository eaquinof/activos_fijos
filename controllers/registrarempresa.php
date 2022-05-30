<?php
    print_r($_POST);

    if($_POST["pass"] != $_POST["pass2"]){
        header('Location: ../empresacrear.php?mensaje=diferente');
        exit();
    }

    if(empty($_POST["oculto"]) || empty($_POST["nomempresa"])){
        header('Location: ../empresacrear.php?mensaje=falta');
        exit();
    }

    include '../config/conexion.php';
    $nomempresa = $_POST["nomempresa"];
    
    $sentencia = $bd->prepare("INSERT INTO activos.empresa(nombreempresa) VALUES (?);");
    $resultado = $sentencia->execute([$nomempresa]);

    if ($resultado === TRUE) {
        header('Location: ../empresas.php?mensaje=registrado');
    } else {
        header('Location: ../empresas.php?mensaje=error');
        exit();
    }
    
?>