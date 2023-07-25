<?php

    include('../prcd/qc/qc.php');

    $folio = $_POST['folioTarjeton'];
    $curp = $_POST['curpTarjeton'];
    $expediente = $_POST['numExpediente'];
    
    $Query = "SELECT * FROM tarjetones WHERE folio_tarjeton = '$folioTarjeton'";
    $resultado_Query = $conn->query($Query);
    
    $x = 0;

    while ($row_sql_Vehiculos = $resultado_Query->fetch_assoc()){
        $x++;
        /* $descripcion = $row_sql_catalogo['detalle_solicitud'];
        $sqlDetalles = "SELECT * FROM funcionales WHERE id='$descripcion'";
        $resultadoDetalles = $conn->query($sqlDetalles);
        $rowDetalles = $resultadoDetalles->fetch_assoc(); */

        echo '
            <tr>
                <td>'.$x.'</td>
                <td>'.$row_sql_Vehiculos['vehiculo_marca'].'</td>
                <td>'.$row_sql_Vehiculos['vehiculo_modelo'].'</td>
                <td>'.$row_sql_Vehiculos['no_placa'].'</td>
            </tr>
        ';
    }
    /* $Query = "SELECT * FROM servicios WHERE folio_solicitud = '$folioSolicitud'";
    $resultado_Query = $conn->query($Query);
    
    $x = 0;

    while ($row_sql_catalogo = $resultado_Query->fetch_assoc()){
        $x++;
        $descripcion = $row_sql_catalogo['detalle_solicitud'];
        $sqlDetalles = "SELECT * FROM extraordinarios WHERE id='$descripcion'";
        $resultadoDetalles = $conn->query($sqlDetalles);
        $rowDetalles = $resultadoDetalles->fetch_assoc();

        echo '
            <tr>
                <td>'.$x.'</td>
                <td>'.$row_sql_catalogo['cantidad'].'</td>
                <td>'.$rowDetalles['nombre'].'</td>
                <td>'.$row_sql_catalogo['monto_unitario'].'</td>
                <td>'.$row_sql_catalogo['monto_solicitud'].'</td>
            </tr>
        ';
    }

    $Query = "SELECT * FROM servicios WHERE folio_solicitud = '$folioSolicitud'";
    $resultado_Query = $conn->query($Query);
    
    $x = 0;

    while ($row_sql_catalogo = $resultado_Query->fetch_assoc()){
        $x++;
        $descripcion = $row_sql_catalogo['detalle_solicitud'];
        $sqlDetalles = "SELECT * FROM otros_apoyos WHERE id='$descripcion'";
        $resultadoDetalles = $conn->query($sqlDetalles);
        $rowDetalles = $resultadoDetalles->fetch_assoc();

        echo '
            <tr>
                <td>'.$x.'</td>
                <td>'.$row_sql_catalogo['cantidad'].'</td>
                <td>'.$rowDetalles['nombre'].'</td>
                <td>'.$row_sql_catalogo['monto_unitario'].'</td>
                <td>'.$row_sql_catalogo['monto_solicitud'].'</td>
            </tr>
        ';
    } */
    
?>