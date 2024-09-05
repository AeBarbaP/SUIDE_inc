<?php
    session_start();
    $usr = $_SESSION['usr'];
    include('../prcd/qc/qc.php');

    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');

    $fecha_registro = strftime("%Y-%m-%d,%H:%M:%S");

    $curp = $_POST['curp_exp'];
    $tipoSolicitud = $_POST['tipoSolicitud'];
    $fechaSolicitud = $_POST['fechaSolicitud'];
    $folioSolicitud = $_POST['folioSolicitud'];
    $otroSolicitud = $_POST['otroSolicitud'];
    $cantidadArt = $_POST['cantidadArt'];
    $unitario = $_POST['unitario'];
    $costoSolicitudOtro = $_POST['costoSolicitudOtro'];
    $tipo_dato = 16;
    
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
        $sqlInsertUsr = "INSERT INTO log_registro(
            usr,
            tipo_dato,
            fecha)
            VALUES(
            '$usr',
            '$tipo_dato',
            '$fecha_registro')";
        $resultadoUsr = $conn->query($sqlInsertUsr);
        echo json_encode(array('success'=>1));

    } else {
        $error = $conn->error;
        echo json_encode(array('success'=>0,'error'=>$error));
    }

    
?>