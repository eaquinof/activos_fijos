<?php
include 'template/header.php';
include 'template/navbar.php';
include "config/conexion.php";

$sql = "SELECT (a.valor * tc.tasa) AS 'tasaCambio', a.idActivo, a.No_Serial, a.Descripcion, a.Valor, a.FechaCompra, a.empresa
  FROM moneda m, tasa_cambio tc, activo a 
  WHERE tc.codmoneda = m.codmoneda 
  group by a.valor;";

$valorMoneda = '';

if (isset($_POST['selectData'])) {
    $valorMoneda = $_POST['selectData'];
    $sql = "SELECT round((a.valor * tc.tasa),2) AS 'tasaCambio', a.idActivo, a.No_Serial, a.Descripcion, a.Valor, a.FechaCompra, a.empresa
            FROM moneda m, tasa_cambio tc, activo a 
            WHERE tc.codmoneda = m.codmoneda 
            AND m.codmoneda = '$valorMoneda'
            AND tc.fecha = (SELECT MAX(tcf.fecha)
                            FROM tasa_cambio tcf
                            where tcf.codmoneda = '$valorMoneda')";
}

$sentencia = $bd->query($sql);
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
                            <td>
                                <a class="text-success" href="activocrear.php"><i class="bi bi-plus-square-fill"></i></a>
                            </td>  
                            <div class="d-flex justify-content-end"> 
                                <td>
                                        <select class="input-select"
                                            style="background-color: #fff; border-radius: 0px 3px 3px 0px; color: #000; padding:5px;"
                                            id="moneda" name="moneda" required>
                                                <option value=""></option>
                                            <?php
                                                $record = $bd->query("SELECT m.* FROM activos.moneda m;");
                                                while($row = $record->fetch()) {
                                                    $selected= ""; 
                                                    if($row['codmoneda'] == $valorMoneda) {
                                                        $selected="selected";
                                                    } else {
                                                        $selected = "";
                                                    }
                                                    echo '<option value="'.$row['codmoneda'].'"'.$selected.'>'.$row['simbolo'].'</option>';
                                                }
                                            ?>
                                        </select>
                                </td>
                                </div>
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
                                            <td><?php 
                                                if($valorMoneda != '') {
                                                    echo $dato->tasaCambio;
                                                } else {
                                                    echo $dato->Valor;
                                                }
                                            ?></td>
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