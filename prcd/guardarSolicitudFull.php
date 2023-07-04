<?php

    include('../prcd/qc/qc.php');

    $curp = $_POST['curp_exp'];
    $tipoSolicitud = $_POST['tipoSolicitud'];
    $fechaSolicitud = $_POST['fechaSolicitud'];
    $folioSolicitud = $_POST['folioSolicitud'];
    $fechaEntrega = $_POST['fechaEntrega'];
    
    $QueryInsert = "INSERT INTO solicitudes (
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
        '$folioSolicitud',
        '$fechaSolicitud',
        '$tipoSolicitud',
        '$otroSolicitud',
        '$cantidadArt',
        '$unitario',
        '$costoSolicitudOtro'
    )
    ";

    $resultado_QueryInsert = $conn->query($QueryInsert);

    if ($resultado_QueryInsert){
        echo json_encode(array('success'=>1));

    } else {
        $error = $conn->error;
        echo json_encode(array('success'=>0,'error'=>$error));
    }

    
?>