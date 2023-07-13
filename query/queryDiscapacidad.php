
<?php
include('../prcd/qc/qc.php');

$disc = $_POST['disc'];

$var = "SELECT * FROM discapacidades WHERE tipo = '$disc' ORDER BY nombre ASC";
$resultadoVariable = $conn->query($var);
$filas = $resultadoVariable->num_rows;

if($filas > 1){
    while ($rowDiscapacidad = $resultadoVariable->fetch_assoc()){
        echo '
        <option value="'.$rowDiscapacidad['id'].'-'.$rowDiscapacidad['nombre'].'" aria-label="'.$rowDiscapacidad['id'].'">'.$rowDiscapacidad['id'].' - '.$rowDiscapacidad['nombre'].' ('.$rowDiscapacidad['tipo'].')</option>
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