<?php
include('../prcd/qc/qc.php');

$x = $_POST['x'];

$var = "SELECT * FROM cattipovialidades";
$resultadoVariable = $conn->query($var);

echo '
    <option value="Select">Selecciona...</option>
';
while ($rowVialidad = $resultadoVariable->fetch_assoc()){
    echo '
        <option value="'.$rowVialidad['nombreVialidad'].'">'.$rowVialidad['nombreVialidad'].'</option>
    ';
}
?>