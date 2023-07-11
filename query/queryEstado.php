<?php
include('../prcd/qc/qc.php');

$x = $_POST['x'];

$var = "SELECT * FROM catestados";
$resultadoVariable = $conn->query($var);

echo '
    <option value="Select">Selecciona...</option>
';
while ($rowEstado = $resultadoVariable->fetch_assoc()){
    echo '
        <option value="'.$rowEstado['claveEstado'].'">'.$rowEstado['nombreEstado'].'</option>
    ';
}
?>