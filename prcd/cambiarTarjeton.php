<?php

    include('../prcd/qc/qc.php');

    /* date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8'); */
    
    $folio = $_POST['folioC'];
    $vigencia = $_POST['vigenciaC'];
    $noExpediente = $_POST['noExpediente'];
    
    $sql="UPDATE tarjetones SET folio_tarjeton = '$folio', vigencia = '$vigencia' WHERE numExpediente = '$noExpediente'";
    $resultado_sqlInsert= $conn->query($sql);
    
    
    if ($resultado_sqlInsert) {
        echo json_encode(array(
            'success' => 1,
            )
        );
    } else {
        echo json_encode(array('success'=>0));

    }
?>