<?php
include 'template/header.php';
include 'template/navbar.php';
include "config/conexion.php";

    if(!isset($_GET['idActivo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'config/conexion.php';
    $idActivo = $_GET['idActivo'];

    $sentencia = $bd->prepare("select * from activos.activo where idActivo = ?;");
    $sentencia->execute([$idActivo]);
    $activo = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>
<div class="container-fluid">
    <div class="row flex-nowrap ">
    <?php include 'template/sidebar.php' ?>
    
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar Activos:
                </div>
                <form class="p-4" method="POST" action="controllers/editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Descripcion: </label>
                        <input type="text" class="form-control" name="txtDescripcion" required 
                        value="<?php echo $activo->Descripcion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Serial: </label>
                        <input type="text" class="form-control" name="txtSerial" required 
                        value="<?php echo $activo->No_Serial; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Valor: </label>
                        <input type="number" class="form-control" name="txtValor" autofocus required
                        value="<?php echo $activo->Valor; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha Compra: </label>
                        <input type="text" class="form-control" name="txtFechaCompra" autofocus required
                        value="<?php echo $activo->FechaCompra; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="idActivo" value="<?php echo $activo->idActivo; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>