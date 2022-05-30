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
                    Registrar usuario
                </div>
                <form class="p-4" method="POST" action="controllers/registrarUsuario.php">
                    <div class="mb-3">
                        <label class="form-label">Usuario: </label>
                        <input type="text" class="form-control" name="codusr" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password: </label>
                        <input type="password" class="form-control" name="pass" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Repetir Password: </label>
                        <input type="password" class="form-control" name="pass2" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Rol: </label>
                        <select class="input-select"
                            style="background-color: #fff; border-radius: 0px 3px 3px 0px; color: #000; margin-bottom: 1em; padding:16px; width: 575px;"
                            id="rol" name="rol" required>
                            <option value="0"> Seleccione rol </option>
                            <?php
                                        $record = $bd->query("SELECT * FROM Activos.rol");
                                        while($row = $record->fetch()) {
                                            echo '<option value="'.$row['idRol'].'">'.$row['Descripcion'].'</option>';
                                        }
                                    ?>
                        </select>
                    </div>
                    <!--
                    <div class="mb-3">
                        <label class="form-label">Empresa: </label>
                        <select class="input-select"
                            style="background-color: #fff; border-radius: 0px 3px 3px 0px; color: #000; margin-bottom: 1em; padding:16px; width: 575px;"
                            id="empresa" name="empresa" required>
                            <option value="0"> Seleccione rol </option>
                            <?php
                                        /*
                                        $record = $bd->query("SELECT * FROM Activos.empresa");
                                        while($row = $record->fetch()) {
                                            echo '<option value="'.$row['idEmpresa'].'">'.$row['nombreempresa'].'</option>';
                                        }
                                        */
                                    ?>
                        </select>
                                        
                    </div>
                    -->
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