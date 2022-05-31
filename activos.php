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
                    include "template/alerta.php";
                    ?>
                    <!-- fin alerta -->
                    <div class="card">
                        <div class="card-header">
                            <tr>
                            <td>Lista de Activos Fijos &nbsp;</td>
                            <td><a class="text-success" href="activocrear.php"><i class="bi bi-plus-square-fill"></i></a></td>
                            </tr>
                        </div>
                        <div class="p-4">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Id Activo</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Serial</th>
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
                                            <td><?php echo $dato->No_Serial; ?></td>
                                            <td><?php echo $dato->Valor; ?></td>
                                            <td><?php echo $dato->FechaCompra; ?></td>
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