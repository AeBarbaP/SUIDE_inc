<?php
include('../prcd/qc/qc.php');


$var = "SELECT * FROM catestados";
$resultadoVariable = $conn->query($var);
    
while ($rowEstado = $resultadoVariable->fetch_assoc()){
    echo '
        <option value="'.$rowEstado['claveEstado'].'">'.$rowEstado['nombreEstado'].'</option>
    ';
}
?>