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
        monto_solicitud,
        monto_entregado
    )
    VALUES (
        '$curp',
        '$folioSolicitud',
        '$fechaSolicitud',
        '$tipoSolicitud',
        '$detalleSolicitud',
        '$cantidadArt',
        '$unitario',
        '$montoSolicitud',
        '$montoSolicitud'
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