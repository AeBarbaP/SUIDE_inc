<?php
include('../prcd/qc/qc.php');

$cveDiscapacidad = $_POST['cveDiscapacidad'];
$curp = $_POST['curp'];

$var = "SELECT * FROM datos_generales WHERE curp = '$curp'";
$resultadoVariable = $conn->query($var);
$rowVariable = $resultadoVariable->fetch_assoc();

$numMpioV = $rowVariable['municipio'];
$numMpio = substr($numMpioV,3,2);
$idExp = $rowVariable['id'];
$discCve = $cveDiscapacidad;

/* if ($cveDiscapacidad <= 9){
    $discCve = '0'.$cveDiscapacidad;
}
else {
} */
if(strlen($idExp) == 1){
    $idExp = '000'.$idExp;
}

else if(strlen($idExp) == 2){
    $idExp = '00'.$idExp;
}

else if(strlen($idExp) == 3){
    $idExp = '0'.$idExp;
}

$numExpediente = 'C-'.$numMpio.$discCve.'-'.$idExp;
//$numExpediente = rtrim($numExpediente1);

$sql = "UPDATE datos_generales SET numExpediente = '$numExpediente' WHERE id = '$idExp'";
$resultadoSql = $conn->query($sql);
$sql = "UPDATE datos_medicos SET expediente = '$numExpediente' WHERE id = '$idExp'";
$resultadoSql = $conn->query($sql);
$sql = "UPDATE vivienda SET expediente = '$numExpediente' WHERE id = '$idExp'";
$resultadoSql = $conn->query($sql);
$sql = "UPDATE solicitud SET folio_solicitud = '$numExpediente' WHERE curp = '$curp'";
$resultadoSql = $conn->query($sql);
$sql = "UPDATE integracion SET expediente = '$numExpediente' WHERE curp = '$curp'";
$resultadoSql = $conn->query($sql);
$sql = "UPDATE referencias SET expediente = '$numExpediente' WHERE curp = '$curp'";
$resultadoSql = $conn->query($sql);
/* $rowSql = $resultadoSql->fetch_assoc(); */

echo $numExpediente;

?>