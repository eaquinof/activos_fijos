<?php
include 'template/header.php';
include 'template/navbar.php';
include "config/conexion.php";
$sentencia = $bd->query("select m.codmoneda, m.divisa, m.simbolo, t.tasa, t.fecha from activos.tasa_cambio t, activos.moneda m where t.codmoneda = m.codmoneda;");
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
                            <td>Tasas de Cambio &nbsp;</td>
                            <td><a class="text-success" href="#"><i class="bi bi-plus-square-fill"></i></a></td>
                        </tr>    
                        </div>
                        <div class="p-4">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Codigo Moneda</th>
                                        <th scope="col">Divisa</th>
                                        <th scope="col">Simbolo</th>
                                        <th scope="col">Tasa</th>
                                        <th scope="col">Fecha</th>
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
                                            <td><?php echo $dato->tasa; ?></td>
                                            <td><?php echo $dato->fecha; ?></td>
                                            <td><a class="text-warning" href="home.php?fecha=<?php echo $dato->fecha; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                            <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="home.php?fecha=<?php echo $dato->fecha; ?>"><i class="bi bi-trash-fill"></i></a></td>
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