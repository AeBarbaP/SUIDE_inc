<?php
    session_start();
    $usr = $_SESSION['usr'];

    include('../prcd/qc/qc.php');

    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');

    $fecha_entrega = strftime("%Y-%m-%d,%H:%M:%S");
    $curp = $_POST['curp_exp'];
    $expediente = $_POST['expediente'];
    $folioSolicitud = $_POST['folioSolicitud'];
    $tipo = $_POST['tipo'];
    $estatus = 1;

    
    
    $Query = "SELECT * FROM servicios WHERE folio_solicitud = '$folioSolicitud'";
    $resultado_Query = $conn->query($Query);
    
    
    while ($row_sql_catalogo = $resultado_Query->fetch_assoc()){
        $sql="UPDATE servicios SET estatus_s = '1', fecha_entrega = '$fecha_entrega' WHERE folio_solicitud ='$folioSolicitud'";
        $resultadoSql= $conn->query($sql);
        /* $monto = $row_sql_catalogo['monto_entregado'];
        $totalSolicitud = $totalSolicitud + $monto; */
        $fechaSolicitud = $row_sql_catalogo['fecha_solicitud'];
    }
    
    $monto = "SELECT SUM(monto_entregado) AS monto FROM servicios WHERE folio_solicitud = '$folioSolicitud';";
    $resultadoMonto = $conn->query($monto);
    $rowMonto = $resultadoMonto->fetch_assoc();
    $montoTotal = $rowMonto['monto'];
    $fechaSolicitud = $fechaSolicitud;
    $tipo_dato = 28;
   /*  $totalSolicitud = $totalSolicitud + $monto; */

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
        '$montoTotal',
        '$fechaSolicitud',
        '$fecha_entrega',
        '$estatus'
    )";
    $fecha_registro = strftime("%Y-%m-%d,%H:%M:%S");
    $resultado_sqlInsert = $conn->query($sqlInsert);
    if ($resultado_sqlInsert) {
        $sqlInsertUsr = "INSERT INTO log_registro(
            usr,
            tipo_dato,
            expediente,
            fecha)
            VALUES(
            '$usr',
            '$tipo_dato',
            '$curp',
            '$fecha_registro')";
        $resultadoUsr = $conn->query($sqlInsertUsr);
        echo json_encode(array(
            'success' => 1,
            'monto' => $montoTotal
            )
        );
    } else {
        echo json_encode(array('success'=>0));
        /* $error = $conn->error;
        echo $error; */
    }
?>