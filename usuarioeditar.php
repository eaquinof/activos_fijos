<?php
include 'template/header.php';
include 'template/navbar.php';
include "config/conexion.php";

    if(!isset($_GET['codusr'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'config/conexion.php';
    $codusr = $_GET['codusr'];
    $sentencia = $bd->prepare("select * from activos.usuario where codusr = ?;");
    $sentencia->execute([$codusr]);
    $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($usuario);
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
                        <label class="form-label">Usuario: </label>
                        <input type="text" class="form-control" name="codusr"  disabled="disabled" autofocus required
                            value="<?php echo $usuario->CodUsr; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password: </label>
                        <input type="password" class="form-control" name="pass" autofocus required
                            value="<?php echo $usuario->Password; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Repetir Password: </label>
                        <input type="password" class="form-control" name="pass2" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Rol: </label>
                        <select class="input-select"
                            style="background-color: #fff; border-radius: 0px 3px 3px 0px; color: #000; margin-bottom: 1em; padding:5px; width: 100%;"
                            id="rol" name="rol" required>
                            <option value="0"> Seleccione rol </option>
                            <?php
                                $record = $bd->query("SELECT * FROM activos.rol");
                                while($row = $record->fetch()) {
                                    $selected = "";
                                    if($row['idRol'] == $usuario->idRol) {
                                        $selected = "selected";
                                    } else {
                                        $selected = "";
                                    }
                                    //echo '<option value="'.$row['idRol'].'">'.$row['Descripcion'].'</option>';
                                    echo '<option value="'.$row['idRol'].'"'.$selected.'>'.$row['Descripcion'].'</option>';
                                }
                            ?>

                        </select>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codusr" value="<?php echo $usuario->codusr; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>