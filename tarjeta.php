<?php

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
    $tarjeta = $sentencia->fetchAll(PDO::FETCH_OBJ);

    ob_start();  //Guardar en variable cache

?>

<!DOCTYPE html>
<html lang=”en”>
<head>
    <meta charset=”UTF-8″ />
    <title>Document</title>

    <title>REPORTE DE ACTIVOS FIJOS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  

</head>
    
                <div class="card">
                <div class="container-fluid bg-primary" style="text-align:center;" style="font-style: bolic;" style="color:white;">
                    REPORTE DE ACTIVOS FIJOS 
                    <br> </br>
                    <?php
                        $DateAndTime = date('m-d-Y');  
                        echo "Fecha de Generación: $DateAndTime.";
                     ?>
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
                                foreach($tarjeta as $dato){ 
                            ?>

                            <tr>
                                <td style="text-align: center; scope="row"><?php echo $dato->idactivo; ?></td>
                                <td style="text-align: center;"><?php echo $dato->No_Serial; ?></td>
                                <td style="text-align: center;"><?php echo $dato->descrip_activo; ?></td>
                                <td style="text-align: center;"><?php echo $dato->valor; ?></td>
                                <td style="text-align: center;"><?php echo $dato->fechacompra; ?></td>
                                <td style="text-align: center;"><?php echo $dato->FechaAsigna; ?></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                 </div>
                </div>
            </div>

            <div class="card-reader">
            <br> </br>
            <br> </br>
            <br> </br>
            <br> </br>
            <br> </br>
            <br> </br>
            <br> </br>
            <br> </br>
            <br> </br>
            <br> </br>
            <br> </br>
            <br> </br>
            <div class="card-reader" style="text-align: center;">
                    _______________________
                </div>
                <div class="card-reader" style="text-align: center;">
                    Firma de Aceptado
                </div>
            </div>

    </body>
</html>

<?php
    $html=ob_get_clean();
    //echo $html;

    require_once './libreria/dompdf/autoload.inc.php';

    use Dompdf\Dompdf;
    $dompdf = new Dompdf();

    $options = $dompdf->getOptions();
    $options->set(array('isRemoteEnabled' => true));
    $dompdf->setOptions($options);
    
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4','landscape');

    $dompdf->render();

    $dompdf->stream("Reporte de Activos Fijos.pdf",array("Attachment" => true));

?>

