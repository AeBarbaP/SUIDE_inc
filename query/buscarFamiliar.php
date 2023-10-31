<?php
include('../prcd/qc/qc.php');

$id = $_POST['idF'];


$var = "SELECT * FROM integracion WHERE id = '$id'";
$resultadoVariable = $conn->query($var);
$filaVar = $resultadoVariable->num_rows;

    if($filaVar != 0){

        $rowVar = $resultadoVariable->fetch_assoc();

        $nombre = $rowVar['nombre'];
        $parentesco = $rowVar['parentesco'];
        $edad = $rowVar['edad'];
        $escolaridad = $rowVar['escolaridad'];
        $profesion = $rowVar['profesion_oficio'];
        $discapacidad = $rowVar['discapacidad'];
        $telefono = $rowVar['telcel'];
        $ingreso = $rowVar['ingreso'];
        $correo = $rowVar['correoe'];

        if($discapacidad != null | $discapacidad != ""){
            $discapacidadSel = 1;
        }
        else{
            $discapacidadSel = 2;
        }

        echo json_encode(
            array(
                'success'=> 1,
                'nombre' => $nombre,
                'parentesco' => $parentesco,
                'edad' => $edad,
                'escolaridad' => $escolaridad,
                'profesion' => $profesion,
                'discapacidad' => $discapacidad,
                'discapacidadSel' => $discapacidadSel,
                'telefono' => $telefono,
                'ingreso' => $ingreso,
                'correo' => $correo
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