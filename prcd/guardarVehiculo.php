<?php
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');


$curpTarjeton = $_POST['curpTarjeton'];
$numExpediente = $_POST['numExpediente'];
$tipoTarjeton = $_POST['tipoTarjeton'];
$folioTarjeton = $_POST['folioTarjeton'];
$fecha_entrega = strftime("%Y-%m-%d,%H:%M:%S");
$vigencia = $_POST['vigencia'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$annio = $_POST['annio'];
$numPlaca = $_POST['numPlaca'];
$serie = $_POST['serie'];
$autoSeguro = $_POST['autoSeguro'];

$sqlinsert= "INSERT INTO tarjetones (
    curp,
    nombre,
    numExpediente,
    tipo_tarjeton,
    folio_tarjeton,
    fecha_entrega,
    vigencia,
    vehiculo_marca,
    vehiculo_modelo,
    vehiculo_anyo,
    no_placa,
    no_serie,
    autoseguro_reg
    )
VALUES(
    '$curpTarjeton',
    '$numExpediente',
    '$tipoTarjeton',
    '$folioTarjeton',
    '$fecha_entrega',
    '$vigencia',
    '$marca',
    '$modelo',
    '$annio',
    '$numPlaca',
    '$serie',
    '$autoSeguro'
)";

$resultado= $conn->query($sqlinsert);

if ($resultado) {
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