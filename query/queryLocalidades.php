<?php
include('../prcd/qc/qc.php');

$municipio = $_POST['cveMunicipio'];

$var = "SELECT * FROM catlocalidades WHERE claveLocalidad LIKE '$municipio%' ORDER BY nombreLocalidad ASC";
$resultadoVariable = $conn->query($var);
$filas = $resultadoVariable->num_rows;

if($fila > 1){

    echo '
    <option value="Select">Selecciona...</option>
    ';
    while ($rowLocalidad = $resultadoVariable->fetch_assoc()){
        echo '
        <option value="'.$rowLocalidad['nombreLocalidad'].'" aria-label="'.$rowLocalidad['claveLocalidad'].'">'.$rowLocalidad['nombreLocalidad'].'</option>
        ';
    }
}
else{
    echo '
    <option value="Select">Selecciona...</option>
    <option value="Sin registro">Sin registro</option>
    ';
}
?>