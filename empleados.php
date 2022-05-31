<?php
include 'template/header.php';
include 'template/navbar.php';
include "config/conexion.php";
$sentencia = $bd->query("SELECT e.idEmpleado, e.nombre, e.apellido, d.Descripcion depto
                         FROM activos.empleado e, activos.departamento d
                         WHERE e.departamento = d.iddepto;");
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
                                <td>Empleados &nbsp;</td>
                                <td><a class="text-success" href="empleadocrear.php"><i
                                            class="bi bi-plus-square-fill"></i></a></td>
                            </tr>
                        </div>
                        <div class="p-4">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Empleado</th>
                                        <th scope="col">Departamento</th>
                                        <th scope="col" colspan="2">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($empleado as $dato) {
                                    ?>

                                    <tr>
                                        <td scope="row"><?php echo $dato->idEmpleado; ?></td>
                                        <td><?php echo $dato->nombre." ". $dato->apellido; ?></td>
                                        <td><?php echo $dato->depto; ?></td>
                                        <td><a class="text-warning" href="empleadoeditar.php?idEmpleado=<?php echo $dato->idEmpleado; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                        <td><a onclick="return confirm('Estas seguro de eliminar?');"
                                                class="text-danger"
                                                href="controllers/eliminarempleado.php?idEmpleado=<?php echo $dato->idEmpleado; ?>"><i class="bi bi-trash-fill"></i></a></td>
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