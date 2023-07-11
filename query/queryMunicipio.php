<?php
include('../prcd/qc/qc.php');

$estado = $_POST['cveEstado'];

$var = "SELECT * FROM catmunicipios WHERE idCatEstado = '$estado' ORDER BY nombreMunicipio ASC";
$resultadoVariable = $conn->query($var);

echo '
    <option value="Select">Selecciona...</option>
';
while ($rowEstado = $resultadoVariable->fetch_assoc()){
    echo '
        <option value="'.$rowEstado['claveMunicipio'].'">'.$rowEstado['nombreMunicipio'].'</option>
    ';
}
?>