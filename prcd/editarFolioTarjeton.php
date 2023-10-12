<?php

include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$noExpediente = $_POST['noExpediente'];
$folioD = $_POST['folioTV'];

$sql_show= "SELECT * FROM tarjetones WHERE numExpediente = '$noExpediente' AND folio_tarjeton = '$folioD'";
$resultado_sql_show = $conn->query($sql_show);

if ($resultado_sql_show){
    $row_sql_show = $resultado_sql_show->fetch_assoc();
    $vigencia = $row_sql_show['vigencia'];

    echo json_encode(array(
        'success'=>1,
        'vigencia'=>$vigencia
    ));
}
else {
    $error = $conn->error;
    echo $error;
    echo json_encode(array(
        'success'=>2,
        'error'=>$error
    ));
}

?>