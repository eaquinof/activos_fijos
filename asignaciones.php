<?php
include 'template/header.php';
include 'template/navbar.php';
include "config/conexion.php";
$sentencia = $bd->query("SELECT e.idempleado,
                                e.nombre,
                                e.apellido,
                                d.descripcion depto,
                                a.idactivo,
                                a.No_Serial,
                                a.Descripcion descrip_activo,
                                a.valor,
                                a.fechacompra,
                                aa.FechaAsigna
                        FROM activos.empleado e,
                            activos.departamento d,
                            activos.activo a,
                            activos.asignacion aa
                        WHERE     e.Departamento = d.idDepto
                        AND e.idEmpleado = aa.idEmpleado
                        AND a.idActivo = aa.idActivo
                        AND e.idEmpleado = 1;");
$empleado = $sentencia->fetchAll(PDO::FETCH_OBJ);
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
                            </tr>
                        </div>
                        <div class="p-4">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">IdActivo</th>
                                        <th scope="col">Serial</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col">Fecha de Compra</th>
                                        <th scope="col">Fecha de Asignacion</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($empleado as $dato) {
                                    ?>

                                    <tr>
                                        <td scope="row"><?php echo $dato->idactivo; ?></td>
                                        <td><?php echo $dato->No_Serial; ?></td>
                                        <td><?php echo $dato->descrip_activo; ?></td>
                                        <td><?php echo $dato->valor; ?></td>
                                        <td><?php echo $dato->fechacompra; ?></td>
                                        <td><?php echo $dato->FechaAsigna; ?></td>
                                    </tr>

                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>

                        </div>
                        <a href="tarjeta.php" class="btn btn-primary">Generar PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'template/footer.php' ?>