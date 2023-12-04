<?php
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_entrega = strftime("%Y-%m-%d,%H:%M:%S");

$curp_exp = $_POST['curp_exp'];
$nombreFamiliar = $_POST['nombreFamiliar'];
$parentescoFam = $_POST['parentescoFam'];
$edadFam = $_POST['edadFam'];
$escolaridadFam = $_POST['escolaridadFam'];
$profesionFam = $_POST['profesionFam'];
$discapacidadFam = $_POST['discapacidadFam'];
$ingresoFam = $_POST['ingresoFam'];
$telFam = $_POST['telFam'];
$emailFam = $_POST['emailFam'];

$sqlinsert= "UPDATE integracion SET
    curp ='$curp_exp',
    nombre = '$nombreFamiliar',
    parentesco = '$parentescoFam',
    edad = '$edadFam',
    escolaridad = '$escolaridadFam',
    profesion_oficio = '$profesionFam',
    discapacidad = '$discapacidadFam',
    ingreso = '$ingresoFam',
    telcel = '$telFam',
    correoe = '$emailFam'
WHERE curp = '$curp'
    
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