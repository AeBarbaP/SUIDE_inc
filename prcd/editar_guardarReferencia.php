<?php
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_entrega = strftime("%Y-%m-%d,%H:%M:%S");

$curp_exp = $_POST['curp_exp'];
$nombreReferencia = $_POST['nombreReferencia'];
$parentescoRef = $_POST['parentescoRef'];
$telRef = $_POST['telRef'];
$profesionRef = $_POST['profesionRef'];
$domicilioRef = $_POST['domicilioRef'];

$sqlinsert= "UPDATE referencias SET
    curp =  '$curp_exp',
    nombre = '$nombreReferencia',
    parentesco = '$parentescoRef',
    celular = '$telRef',
    profesion_oficio = '$profesionRef',
    direccion = '$domicilioRef'
WHERE curp = '$curp'
";

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