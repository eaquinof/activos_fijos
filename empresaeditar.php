<?php
include 'template/header.php';
include 'template/navbar.php';
include "config/conexion.php";

    if(!isset($_GET['idempresa'])){
        header('Location: empresas.php?mensaje=error');
        exit();
    }

    include_once 'config/conexion.php';
    $idempresa = $_GET['idempresa'];

    $sentencia = $bd->prepare("select * from activos.empresa where idempresa = ?;");
    $sentencia->execute([$idempresa]);
    $empresa = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>
<div class="container-fluid">
    <div class="row flex-nowrap ">
    <?php include 'template/sidebar.php' ?>
    
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar Empresa:
                </div>
                <form class="p-4" method="POST" action="controllers/editarempresa.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre Empresa: </label>
                        <input type="text" class="form-control" name="nomempresa" required 
                        value="<?php echo $empresa->nombreempresa; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="idempresa" value="<?php echo $empresa->idempresa; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>