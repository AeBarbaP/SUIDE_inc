<?php

    include('../prcd/qc/qc.php');
    include('../prcd/qc/qc2.php');


    $id = $_POST['id'];
    $estatus = $_POST['estatus'];


    $consulta = "SELECT * FROM datos_generales WHERE id = '$id'";
    $resultadoConsulta = $conn->query($consulta);
    $rowConsulta = $resultadoConsulta->fetch_assoc();

    $estatusActual = $rowConsulta['estatus'];
    $curp = $rowConsulta['curp'];

    if ($estatusActual == 1){
        $sql = "UPDATE datos_generales SET estatus = 2 WHERE curp = '$curp' AND id = '$id'";
        $resultadoSql = $conn->query($sql);
        if ($resultadoSql){
            echo json_encode(array(
                "success" => 1
            ));
        }
        else{
            $error1 = $conn->error;
    
            echo json_encode(array(
                "success" => 0,
                "error1" => $error1,
                "cadena" => $curp,
            ));
        }
    }
    else if ($estatusActual == 2){
        $sql = "UPDATE datos_generales SET estatus = 5 WHERE curp = '$curp' AND id = '$id'";
        $resultadoSql = $conn->query($sql);
        if ($resultadoSql){
            echo json_encode(array(
                "success" => 2
            ));
        }
        else{
            $error1 = $conn->error;
    
            echo json_encode(array(
                "success" => 0,
                "error1" => $error1,
                "cadena" => $curp,
            ));
        }
    }
    else if($estatusActual == 5){
        $sql = "UPDATE datos_generales SET estatus = 1 WHERE curp = '$curp' AND id = '$id'";
        $resultadoSql = $conn->query($sql);
        if ($resultadoSql){
            echo json_encode(array(
                "success" => 5
            ));
        }
        else{
            $error1 = $conn->error;
    
            echo json_encode(array(
                "success" => 0,
                "error1" => $error1,
                "cadena" => $curp,
            ));
        }
    }

?>