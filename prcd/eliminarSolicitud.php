<?php
    require('qc/qc.php');

    $folio = $_POST['folio'];
    $curp = $_POST['curp'];
    $tipo = $_POST['tipo'];

    $sqlDelete = "DELETE FROM servicios WHERE curp = '$curp' AND folio_solicitud = '$folio' AND tipo_solicitud = '$tipo'";
    $resultadoSQL = $conn->query($sqlDelete);

    if ($resultadoSQL){
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