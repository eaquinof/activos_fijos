<?php
include 'template/header.php';
include 'template/navbar.php';
include "config/conexion.php";
$sentencia = $bd->query("select * from activos.moneda;");
$tasa = $sentencia->fetchAll(PDO::FETCH_OBJ);
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
                            <td>Monedas &nbsp;</td>
                            <td><a class="text-success" href="monedacrear.php"><i class="bi bi-plus-square-fill"></i></a></td>
                        </tr>    
                        </div>
                        <div class="p-4">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Codigo Moneda</th>
                                        <th scope="col">Divisa</th>
                                        <th scope="col">Simbolo</th>
                                        <th scope="col" colspan="2">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($tasa as $dato) {
                                    ?>

                                        <tr>
                                            <td scope="row"><?php echo $dato->codmoneda; ?></td>
                                            <td><?php echo $dato->divisa; ?></td>
                                            <td><?php echo $dato->simbolo; ?></td>
                                            <td><a class="text-warning" href="monedaeditar.php?codmoneda=<?php echo $dato->codmoneda; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                            <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="controllers/eliminarmoneda.php?codmoneda=<?php echo $dato->codmoneda; ?>"><i class="bi bi-trash-fill"></i></a></td>
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