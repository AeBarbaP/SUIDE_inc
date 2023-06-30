<?php

    include('../prcd/qc/qc.php');

    $folioSolicitud = $_POST['folioSolicitud'];
    
    $Query = "SELECT * FROM servicios WHERE folio_solicitud = '$folioSolicitud'";
    $resultado_Query = $conn->query($Query);
    
    while ($row_sql_catalogo = $resultado_Query->fetch_assoc()){
        $sql="UPDATE servicios SET estatus_s = 1 WHERE folio_solicitud ='$folioSolicitud'";
        $resultadoSql= $conn->query($sql);
    }

    
?>