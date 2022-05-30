<?php
include 'template/header.php';
include 'template/navbar.php';
include "config/conexion.php";
$sentencia = $bd->query("select codusr, r.Descripcion rol from activos.usuario u, activos.rol r where u.idRol = r.idRol");
$Usuario = $sentencia->fetchAll(PDO::FETCH_OBJ);
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
                            <td>Lista de Usuarios &nbsp;</td>
                            <td><a class="text-success" href="usuariocrear.php"><i class="bi bi-plus-square-fill"></i></a></td>
                            </tr>
                        </div>
                        <div class="p-4">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Rol</th>
                                        <th scope="col" colspan="2">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($Usuario as $dato) {
                                    ?>

                                        <tr>
                                            <td scope="row"><?php echo $dato->codusr; ?></td>
                                            <td><?php echo $dato->rol; ?></td>
                                            <td><a class="text-warning" href="usuarioeditar.php?codusr=<?php echo $dato->codusr; ?>"><i class="bi bi-pencil-square"></i></a></td>
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