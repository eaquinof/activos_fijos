<?php
include 'template/header.php';
include 'template/navbar.php';
include "config/conexion.php";

$iddepto = '';
if (isset($_POST['iddep'])) {
    $iddepto = $_POST['iddep'];
}

?>
<div class="container-fluid">
    <div class="row flex-nowrap ">
        <?php include 'template/sidebar.php' ?>
        <div class="col-md-4 mt-4 mx-4">
            <!-- inicio alerta -->
            <?php
                    include "template/alerta.php";
                    ?>
            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Asignar Activos
                </div>
                <form class="p-4" method="POST" action="controllers/registrarasignacion.php">
                <div class="mb-3">
                        <label class="form-label">Departamento: </label>
                        <select class="input-select"
                            style="background-color: #fff; border-radius: 0px 3px 3px 0px; color: #000; margin-bottom: 1em; padding:5px; width: 100%;"
                            id="departamento" name="departamento" required>
                            <option value="0"> Seleccione deparamento </option>
                            <?php    
                                $record = $bd->query("SELECT d.Descripcion depto , d.idDepto FROM activos.departamento d order by d.Descripcion;");
                                while($row = $record->fetch()) {
                                    $selected = "";
                                    if($row['idDepto'] == $iddepto) {
                                        $selected = "selected";
                                    }
                                    echo '<option value="'.$row['idDepto'].'"'.$selected.'>'.$row['depto'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                     <div class="mb-3">
                            <label class="form-label">Empleado: </label>
                            <?php 
                                $disabled = "disabled";
                                if($iddepto != "") {
                                    $disabled = "";
                                }
                                echo '<select class="input-select" style="background-color: #fff; border-radius: 0px 3px 3px 0px; color: #000; margin-bottom: 1em; padding:5px; width: 100%;"
                                id="empleado" name="empleado"'.$disabled.' required>';
                                ?>

                                <option value="0"> Seleccione empleado </option>
                                <?php
                                       if($iddepto != "") {
                                        $record = $bd->query("SELECT e.idEmpleado, e.Nombre 
                                                              FROM activos.empleado e 
                                                              WHERE e.Departamento = ".$iddepto."");
                                        while($row = $record->fetch()) {
                                            echo '<option value="'.$row['idEmpleado'].'">'.$row['Nombre'].'</option>';
                                        }
                                       } 
                                    ?>
                            </select>
                        </div> 

                        <div class="mb-3">
                            <label class="form-label">Activo: </label>
                            <select class="input-select"
                                style="background-color: #fff; border-radius: 0px 3px 3px 0px; color: #000; margin-bottom: 1em; padding:5px; width: 100%;"
                                id="activo" name="activo" required>
                                <option value="0"> Seleccione Activo </option>
                                <?php
                                        $record = $bd->query("SELECT * FROM activos.activo a 
                                                              WHERE NOT EXISTS (SELECT 1 
                                                                                FROM activos.asignacion aa 
                                                                                WHERE a.idactivo = aa.idactivo);");
                                        while($row = $record->fetch()) {
                                            echo '<option value="'.$row['idActivo'].'">'.$row['Descripcion'].'</option>';
                                        }
                                    ?>
                            </select>
                        </div>
                        <div class="d-grid">
                            <input type="hidden" name="oculto" value="1">
                            <input type="submit" class="btn btn-primary" value="Asignar">
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'template/footer.php' ?>