<?php
include('../prcd/qc/qc.php');

$cveLocalidad = $_POST['cveLocalidad'];

$var = "SELECT * FROM asentamientos WHERE idAsentamiento = '$cveLocalidad%'";
$resultadoVariable = $conn->query($var);

echo '
<option value="Select">Selecciona...</option>
';
while ($rowLocalidad = $resultadoVariable->fetch_assoc()){
    echo '
    <option value="'.$rowLocalidad['asentamiento'].'" aria-label="'.$rowLocalidad['idAsentamiento'].'">'.$rowLocalidad['asentamiento'].'</option>
    ';
}
?>