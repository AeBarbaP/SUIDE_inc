<?php
include('../prcd/qc/qc.php');

$id = $_POST['idR'];


$var = "SELECT * FROM referencias WHERE id = '$id'";
$resultadoVariable = $conn->query($var);
$filaVar = $resultadoVariable->num_rows;

    if($filaVar != 0){

        $rowVar = $resultadoVariable->fetch_assoc();

        $nombre = $rowVar['nombre'];
        $parentesco = $rowVar['parentesco'];
        $profesion = $rowVar['profesion_oficio'];
        $telefono = $rowVar['celular'];
        $domicilio = $rowVar['direccion'];

        echo json_encode(
            array(
                'success'=> 1,
                'nombre' => $nombre,
                'parentesco' => $parentesco,
                'profesion' => $profesion,
                'telefono' => $telefono,
                'domicilio' => $domicilio,
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