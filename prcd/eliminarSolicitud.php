<?php
    session_start();
    $usr = $_SESSION['usr'];
    require('qc/qc.php');

    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');

    $fecha_registro = strftime("%Y-%m-%d,%H:%M:%S");
    
    $folio = $_POST['folio'];
    $curp = $_POST['curp'];
    $tipo = $_POST['tipo'];
    $tipo_dato = 32;

    $sqlDelete = "DELETE FROM servicios WHERE curp = '$curp' AND folio_solicitud = '$folio' AND tipo_solicitud = '$tipo'";
    $resultadoSQL = $conn->query($sqlDelete);

    if ($resultadoSQL){
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
            'success'=>1
        ));
    }
    else {
        echo json_encode(array(
            'success'=>0
        ));
    }

?>