<?php

include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$id = $_POST['idV'];
$folioD = $_POST['folioDV'];

$sql_delete= "DELETE FROM tarjetones WHERE id = '$id' AND folio_tarjeton = '$folioD'";
$resultado_sql_delete = $conn->query($sql_delete);

if ($resultado_sql_delete){
    echo json_encode(array(
        'success'=>1
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