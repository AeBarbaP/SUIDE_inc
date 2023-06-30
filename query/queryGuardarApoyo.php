<?php

    include('../prcd/qc/qc.php');

    $curp = $_POST['curp_exp'];
    $tipoSolicitud = $_POST['tipoSolicitud'];
    $fechaSolicitud = $_POST['fechaSolicitud'];
    $folioSolicitud = $_POST['folioSolicitud'];
    $detalleSolicitud = $_POST['detalleSolicitud'];
    $cantidadArt = $_POST['cantidadArt'];
    $unitario = $_POST['unitario'];
    $montoSolicitud = $_POST['monto_solicitud'];
    
    $QueryInsert = "INSERT INTO servicios (
        curp,
        folio_solicitud,
        fecha_solicitud,
        tipo_solicitud,
        detalle_solicitud,
        cantidad,
        monto_unitario,
        monto_solicitud
    )
    VALUES (
        '$curp',
        '$tipoSolicitud',
        '$fechaSolicitud',
        '$folioSolicitud',
        '$detalleSolicitud',
        '$cantidadArt',
        '$unitario',
        '$montoSolicitud'
    )
    ";

    $resultado_QueryInsert = $conn->query($QueryInsert);

    if ($resultado_QueryInsert){
        $Query = "SELECT * FROM servicios WHERE folio_solicitud = '$folioSolicitud'";
        $resultado_Query = $conn->query($Query);
        
        while ($row_sql_catalogo = $resultado_Query->fetch_assoc()){
            echo '
                <tr>
                    <td>'.$row_sql_catalogo['cantidad'].'</td>
                    <td>'.$row_sql_catalogo['detalle_solicitud'].'</td>
                    <td>'.$row_sql_catalogo['monto_unitario'].'</td>
                    <td>'.$row_sql_catalogo['monto_solicitud'].'</td>
                </tr>
            ';
        }
        echo "
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Se agregó nuevo apoyo extraordinario al catálogo',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
        ";
    } else {
        $error = $conn->error;
        echo $error;
    }

    
?>