<?php
    session_start();
    $usr = $_SESSION['usr'];
    include('../prcd/qc/qc.php');

    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');
    $fecha_registro = strftime("%Y-%m-%d,%H:%M:%S");

    $folio = $_POST['folioC'];
    $vigencia = $_POST['vigenciaC'];
    $noExpediente = $_POST['noExpediente'];
    $tipo_dato = 27;
    
    $sql="UPDATE tarjetones SET folio_tarjeton = '$folio', vigencia = '$vigencia' WHERE numExpediente = '$noExpediente'";
    $resultado_sqlInsert= $conn->query($sql);
    
    
    if ($resultado_sqlInsert) {
        $sqlInsertUsr = "INSERT INTO log_registro(
            usr,
            tipo_dato,
            fecha)
            VALUES(
            '$usr',
            '$tipo_dato',
            '$fecha_registro')";
        $resultadoUsr = $conn->query($sqlInsertUsr);
        echo json_encode(array(
            'success' => 1,
            'folio' => $folio
            )
        );
    } else {
        echo json_encode(array('success'=>0));

    }
?>