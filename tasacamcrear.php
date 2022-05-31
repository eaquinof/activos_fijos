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
                    Registarar Tasa de Cambio:
                </div>
                <form class="p-4" method="POST" action="controllers/registrartasacam.php">
                <div class="mb-3">
                        <label class="form-label">Moneda: </label>
                        <select class="input-select"
                            style="background-color: #fff; border-radius: 0px 3px 3px 0px; color: #000; margin-bottom: 1em; padding:16px; width: 575px;"
                            id="rol" name="codmoneda" required>
                            <option value="0"> Seleccione Moneda </option>
                            <?php
                                        $record = $bd->query("SELECT * FROM activos.moneda");
                                        while($row = $record->fetch()) {
                                            echo '<option value="'.$row['codmoneda'].'">'.$row['simbolo']." - ".$row['divisa'].'</option>';
                                        }
                                    ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tasa: </label>
                        <input type="number" class="form-control" name="tasa" autofocus required>
                    </div>                    
                    <div class="mb-3">
                        <label class="form-label">Fecha: </label>
                        <input type="date" class="form-control" name="fecha" autofocus required>
                    </div>                    
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'template/footer.php' ?>