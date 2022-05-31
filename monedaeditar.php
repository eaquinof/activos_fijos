<?php
include 'template/header.php';
include 'template/navbar.php';
include "config/conexion.php";

    if(!isset($_GET['codmoneda'])){
        header('Location: empresas.php?mensaje=error');
        exit();
    }

    include_once 'config/conexion.php';
    $codmoneda = $_GET['codmoneda'];

    $sentencia = $bd->prepare("select * from activos.moneda where codmoneda = ?;");
    $sentencia->execute([$codmoneda]);
    $moneda = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>
<div class="container-fluid">
    <div class="row flex-nowrap ">
    <?php include 'template/sidebar.php' ?>
    
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar Moneda:
                </div>
                <form class="p-4" method="POST" action="controllers/editarmoneda.php">
                    <div class="mb-3">
                        <label class="form-label">Divisa: </label>
                        <input type="text" class="form-control" name="divisa" required 
                        value="<?php echo $moneda->divisa; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Simbolo: </label>
                        <input type="text" class="form-control" name="simbolo" required 
                        value="<?php echo $moneda->simbolo; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codmoneda" value="<?php echo $moneda->codmoneda; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>