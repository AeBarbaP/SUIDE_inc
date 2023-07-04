<?php

    include('../prcd/qc/qc.php');

    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');

    $fecha_entrega = strftime("%Y-%m-%d,%H:%M:%S");
    $curp = $_POST['curp_exp'];
    $folioSolicitud = $_POST['folioSolicitud'];
    $tipo = $_POST['tipo'];
    
    $Query = "SELECT * FROM servicios WHERE folio_solicitud = '$folioSolicitud'";
    $resultado_Query = $conn->query($Query);
    
    while ($row_sql_catalogo = $resultado_Query->fetch_assoc()){
        $sql="UPDATE servicios SET estatus_s = '1', fecha_entrega = '$fecha_entrega' WHERE folio_solicitud ='$folioSolicitud'";
        $resultadoSql= $conn->query($sql);
        $monto = $row_sql_catalogo['monto_entregado'];
        $totalSolicitud = $totalSolicitud + $monto;
    }

    $sqlInsert = "INSERT INTO solicitud (
        folio_solicitud,
        curp,
        tipo,
        total_solicitud,
        fecha_solicitud,
        entrega,
        estatus
    ) VALUES (
        '$folioSolicitud',
        '$curp',
        '$tipo',
        '$totalSolicitud',
        '$fecha_entrega',
        '$estatus',
    )";

    $resultado_sqlInsert = $conn->query($sqlInsert);
    if ($resultado_sqlInsert) {
        echo json_encode(array('success'=>1));
    } else {
        echo json_encode(array('success'=>0));
    }
?>