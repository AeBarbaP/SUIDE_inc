<?php

include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$id = $_POST['idV'];
$folioD = $_POST['folioDV'];

$sql_show= "SELECT * FROM tarjetones WHERE id = '$id' AND folio_tarjeton = '$folioD'";
$resultado_sql_show = $conn->query($sql_show);

if ($resultado_sql_show){
    $row_sql_show = $resultado_sql_show->fetch_assoc();
    $marca = $row_sql_show['vehiculo_marca'];
    $modelo = $row_sql_show['vehiculo_modelo'];
    $placa = $row_sql_show['no_placa'];
    $serie = $row_sql_show['no_serie'];
    $annio = $row_sql_show['vehiculo_anyo'];
    $autoSeguro = $row_sql_show['autoseguro_reg'];

    echo json_encode(array(
        'success'=>1,
        'marca'=>$marca,
        'modelo'=>$modelo,
        'placa'=>$placa,
        'serie'=>$serie,
        'annio'=>$annio,
        'autoSeguro'=>$autoSeguro,
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