<?php
    print_r($_POST);

    if($_POST["pass"] != $_POST["pass2"]){
        header('Location: ../usuariocrear.php?mensaje=diferente');
        exit();
    }

    if(empty($_POST["oculto"]) || empty($_POST["codurs"]) || empty($_POST["pass"]) || ($_POST["rol"] != "0")){
        header('Location: ../usuariocrear.php?mensaje=falta');
        exit();
    }

    include '../config/conexion.php';
    $CodUsr = $_POST["codusr"];
    $Password = $_POST["pass"];
    $idRol = $_POST["rol"];
    
    $sentencia = $bd->prepare("INSERT INTO activos.usuario(CodUsr,Password,idRol) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$CodUsr,$Password,$idRol]);

    if ($resultado === TRUE) {
        header('Location: ../usuarios.php?mensaje=registrado');
    } else {
        header('Location: ../usuarios.php?mensaje=error');
        exit();
    }
    
?>