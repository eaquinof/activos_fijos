<?php
include 'template/header.php';
include 'template/navbar.php';
include "config/conexion.php";
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
                        <label class="form-label">Usuario: </label>
                        <select class="input-select"
                            style="background-color: #fff; border-radius: 0px 3px 3px 0px; color: #000; margin-bottom: 1em; padding:5px; width: 275px;"
                            id="empleado" name="empleado" required>
                            <option value="0"> Seleccione empleado </option>
                            <?php
                                        $record = $bd->query("SELECT e.idEmpleado,
                                                                     e.Nombre,
                                                                     e.Apellido,
                                                                     d.Descripcion depto
                                                               FROM activos.empleado e, activos.departamento d
                                                               WHERE e.departamento = d.iddepto
                                                               order by d.Descripcion;");
                                        while($row = $record->fetch()) {
                                            echo '<option value="'.$row['idEmpleado'].'">'.$row['depto']." - ".$row['Nombre']." ".$row['Apellido'].'</option>';
                                            //echo '<option value="'.$row['idempleado'].'">'.$row['Apellido'].'</option>';
                                        }
                                    ?>
                        </select>
                    </div>    
                        <div class="mb-3">
                            <label class="form-label">Activo: </label>
                            <select class="input-select"
                                style="background-color: #fff; border-radius: 0px 3px 3px 0px; color: #000; margin-bottom: 1em; padding:5px; width: 275px;"
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