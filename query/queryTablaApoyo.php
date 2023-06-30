<?php

    include('../prcd/qc/qc.php');

    $folioSolicitud = $_POST['folioSolicitud'];
    
    $Query = "SELECT * FROM servicios WHERE folio_solicitud = '$folioSolicitud'";
    $resultado_Query = $conn->query($Query);
    
    $x = 0;

    while ($row_sql_catalogo = $resultado_Query->fetch_assoc()){
        $x++;
        $descripcion = $row_sql_catalogo['detalle_solicitud'];
        $sqlDetalles = "SELECT * FROM funcionales WHERE id='$descripcion'";
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

    
?>