<?php

include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$id = $_POST['idV'];
$folioD = $_POST['folioDV'];

$sql_select="SELECT * FROM tarjetones WHERE folio_tarjeton = '$folioD'";
$resultado_SQLSelect = $conn->query($sql_select);
$filas = $resultado_SQLSelect->num_rows;

if ($filas == 1){
    echo json_encode(array(
        'success'=>1
    ));
}
else if ($filas > 1){
    echo json_encode(array(
        'success'=>2
    ));
}

?>