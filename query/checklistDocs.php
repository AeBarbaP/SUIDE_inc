<?php
include('../prcd/qc/qc.php');

$curp = $_POST['curp'];


$var = "SELECT * FROM documentos_list WHERE id_ext = '$curp'";
$resultadoVariable = $conn->query($var);
$filaVar = $resultadoVariable->num_rows;

    if($filaVar > 0){

        $rowVar = $resultadoVariable->fetch_assoc();

        echo json_encode(
            array(
                'success'=> 1,
                )
            );
    }
    else {
        echo json_encode(
            array(
                'success'=> 0
                )
            );
    }

?>