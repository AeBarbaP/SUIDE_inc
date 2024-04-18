<?php
include('../prcd/qc/qc.php');


$var = "SELECT * FROM datos_generales LIMIT 25";
$resultadoVariable = $conn->query($var);

while ($rowVariable = $$resultadoVariable->fetch_assoc()){
    
}

?>