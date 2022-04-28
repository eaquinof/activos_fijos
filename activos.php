<?php
include 'template/header.php';
include 'template/navbar.php';
include "config/conexion.php";
$sentencia = $bd->query("select * from Activo");
$Activo = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container-fluid" style="overflow:hidden; overflow-y:hidden">
    <div class="row flex-nowrap ">
        <?php include 'template/sidebar.php' ?>
        <div class="container mt-5">
            <div class="row ">
                <div class="col-md-7">
                    <!-- inicio alerta -->
                    <?php
                    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
                    ?>

                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Rellena todos los campos.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }
                    ?>


                    <?php
                    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
                    ?>

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Registrado!</strong> Se agregaron los datos.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    <?php
                    }
                    ?>

                    <?php
                    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
                    ?>

                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Vuelve a intentar.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    <?php
                    }
                    ?>



                    <?php
                    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
                    ?>

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Cambiado!</strong> Los datos fueron actualizados.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    <?php
                    }
                    ?>

                    <?php
                    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Eliminado!</strong> Los datos fueron borrados.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    <?php
                    }
                    ?>

                    <!-- fin alerta -->
                    <div class="card">
                        <div class="card-header">
                            Lista de Activos Fijos
                        </div>
                        <div class="p-4">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Id Activo</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col">Fecha Compra</th>
                                        <th scope="col" colspan="2">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($Activo as $dato) {
                                    ?>

                                        <tr>
                                            <td scope="row"><?php echo $dato->idActivo; ?></td>
                                            <td><?php echo $dato->Descripcion; ?></td>
                                            <td><?php echo $dato->Valor; ?></td>
                                            <td><?php echo $dato->FechaCompra; ?></td>
                                            <td><a class="text-success" href="frmcrearactivo.php"><i class="bi bi-plus-square-fill"></i></a></td>
                                            <td><a class="text-warning" href="editar.php?idActivo=<?php echo $dato->idActivo; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                            <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="controllers/eliminar.php?idActivo=<?php echo $dato->idActivo; ?>"><i class="bi bi-trash-fill"></i></a></td>
                                        </tr>

                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'template/footer.php' ?>