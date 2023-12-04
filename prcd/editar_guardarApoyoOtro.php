<?php

    include('../prcd/qc/qc.php');

    $curp = $_POST['curp_exp'];
    $tipoSolicitud = $_POST['tipoSolicitud'];
    $fechaSolicitud = $_POST['fechaSolicitud'];
    $folioSolicitud = $_POST['folioSolicitud'];
    $otroSolicitud = $_POST['otroSolicitud'];
    $cantidadArt = $_POST['cantidadArt'];
    $unitario = $_POST['unitario'];
    $costoSolicitudOtro = $_POST['costoSolicitudOtro'];
    
    $QueryInsert = "UPDATE servicios SET
        curp = '$curp',
        folio_solicitud = '$folioSolicitud',
        fecha_solicitud = '$fechaSolicitud',
        tipo_solicitud = '$tipoSolicitud',
        detalle_solicitud = '$otroSolicitud',
        cantidad = '$cantidadArt',
        monto_unitario = '$unitario',
        monto_solicitud = '$costoSolicitudOtro'
    WHERE curp = '$curp'
    ";

    $resultado_QueryInsert = $conn->query($QueryInsert);

    if ($resultado_QueryInsert){
        echo json_encode(array('success'=>1));

    } else {
        $error = $conn->error;
        echo json_encode(array('success'=>0,'error'=>$error));
    }

    
?>