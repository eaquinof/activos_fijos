<?php
include 'template/header.php';
include 'template/navbar.php';
include "config/conexion.php";

    if(!isset($_GET['idDepto'])){
        header('Location: Departamentos.php?mensaje=error');
        exit();
    }

    include_once 'config/conexion.php';
    $idDepto = $_GET['idDepto'];

    $sentencia = $bd->prepare("select * from activos.Departamento where idDepto = ?;");
    $sentencia->execute([$idDepto]);
    $depto = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>
<div class="container-fluid">
    <div class="row flex-nowrap ">
    <?php include 'template/sidebar.php' ?>
    
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar Departamento:
                </div>
                <form class="p-4" method="POST" action="controllers/editardepto.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre Departamento: </label>
                        <input type="text" class="form-control" name="descrip" required 
                        value="<?php echo $depto->Descripcion; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="idDepto" value="<?php echo $depto->idDepto; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>