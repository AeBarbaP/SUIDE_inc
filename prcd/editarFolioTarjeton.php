<?php
session_start();
$usr = $_SESSION['usr'];
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_registro = strftime("%Y-%m-%d,%H:%M:%S");
$curp = $_POST['curp'];
$folioD = $_POST['folioTTemp'];
$tipo_dato = 22;

$sql_show= "SELECT * FROM tarjetones WHERE folio_tarjeton = '$folioD' AND curp = '$curp'";
$resultado_sql_show = $conn->query($sql_show);

if ($resultado_sql_show){
    $row_sql_show = $resultado_sql_show->fetch_assoc();
    $vigencia = $row_sql_show['vigencia'];
    $sqlInsertUsr = "INSERT INTO log_registro(
        usr,
        tipo_dato,
        fecha)
        VALUES(
        '$usr',
        '$tipo_dato',
        '$fecha_registro')";
    $resultadoUsr = $conn->query($sqlInsertUsr);
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