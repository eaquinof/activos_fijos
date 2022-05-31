<?php
include 'template/header.php';
include 'template/navbar.php';
include "config/conexion.php";

    if(!isset($_GET['idEmpleado'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'config/conexion.php';
    $idEmpleado = $_GET['idEmpleado'];

    $sentencia = $bd->prepare("select * from activos.empleado where idEmpleado = ?;");
    $sentencia->execute([$idEmpleado]);
    $empleado = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($empleado);
?>
<div class="container-fluid">
    <div class="row flex-nowrap ">
    <?php include 'template/sidebar.php' ?>
    
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar Empleado:
                </div>
                <form class="p-4" method="POST" action="controllers/editarempleado.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="nombre" required 
                        value="<?php echo $empleado->Nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido: </label>
                        <input type="text" class="form-control" name="txtValor" autofocus required
                        value="<?php echo $empleado->Apellido; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Departamento: </label>
                        <select class="input-select"
                            style="background-color: #fff; border-radius: 0px 3px 3px 0px; color: #000; margin-bottom: 1em; padding:5px; width: 100%;"
                            id="rol" name="rol" required>
                            <option value="0"> Seleccione Departamento </option>
                            <?php
                                $record = $bd->query("SELECT * FROM activos.departamento");
                                while($row = $record->fetch()) {
                                    $selected = "";
                                    if($row['idDepto'] == $empleado->Departamento) {
                                        $selected = "selected";
                                    } else {
                                        $selected = "";
                                    }
                                    echo '<option value="'.$row['idDepto'].'"'.$selected.'>'.$row['Descripcion'].'</option>';
                                }
                            ?>

                        </select>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="idEmpleado" value="<?php echo $empleado->idEmpleado; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>