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

if ($cveDiscapacidad <= 9){
    $discCve = '0'.$cveDiscapacidad;
}
else {
    $discCve = $cveDiscapacidad;
}

$numExpediente = 'C-'.$numMpio.$discCve.'-'.$idExp;

$sql = "UPDATE datos_generales SET numExpediente = '$numExpediente' WHERE id = '$idExp'";
$resultadoSql = $conn->query($sql);
/* $rowSql = $resultadoSql->fetch_assoc(); */

echo '
    <label>'.$numExpediente.'</label>
';

?>