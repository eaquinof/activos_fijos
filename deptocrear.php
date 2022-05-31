<?php
include 'template/header.php';
include 'template/navbar.php';
include "config/conexion.php";
?>


<div class="container-fluid">
    <div class="row flex-nowrap ">
    <?php include 'template/sidebar.php' ?>
        <div class="col-md-4 mt-4 mx-4">
            <div class="card">
                <div class="card-header">
                    Crear Departamento:
                </div>
                <form class="p-4" method="POST" action="controllers/registrardepto.php">
                    <div class="mb-3">
                        <label class="form-label">Departamento: </label>
                        <input type="text" class="form-control" name="descrip" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Grabar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'template/footer.php' ?>