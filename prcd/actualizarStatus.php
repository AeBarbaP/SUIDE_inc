<?php

    include('../prcd/qc/qc.php');

    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');

    $fecha_entrega = strftime("%Y-%m-%d,%H:%M:%S");
    
    $folioSolicitud = $_POST['folioSolicitud'];
    $montoEntrega = $_POST['montoEntrega'];
    
    $Query = "SELECT * FROM servicios WHERE folio_solicitud = '$folioSolicitud'";
    $resultado_Query = $conn->query($Query);
    
    while ($row_sql_catalogo = $resultado_Query->fetch_assoc()){
        $sql="UPDATE servicios SET estatus_s = 1, monto_entregado = '$montoEntrega', fecha_entrega = '$fecha_entrega' WHERE folio_solicitud ='$folioSolicitud'";
        $resultadoSql= $conn->query($sql);
    }

?>