<?php
include('../prcd/qc/qc.php');

$cveLocalidad = $_POST['cveLocalidad'];

$var = "SELECT * FROM asentamientos WHERE localidad LIKE '%$cveLocalidad%'";
$resultadoVariable = $conn->query($var);
$filas = $resultadoVariable->num_rows;

if($filas > 1){

    while ($rowLocalidad = $resultadoVariable->fetch_assoc()){
        echo '
        <option value="'.$rowLocalidad['asentamiento'].'" aria-label="'.$rowLocalidad['idAsentamiento'].'">'.$rowLocalidad['asentamiento'].'</option>
        ';
    }
}
else{
    echo '
    <option value="Select">Selecciona...</option>
    <option value="Sin registro"></option>
    ';
}
?>