<?php

include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$curp = $_POST['curp'];
$folioD = $_POST['folioTTemp'];

$sql_show= "SELECT * FROM tarjetones WHERE folio_tarjeton = '$folioD' AND curp = '$curp'";
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