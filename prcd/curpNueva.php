<?php

    include('../prcd/qc/qc.php');
    include('../prcd/qc/qc2.php');


    $id = $_POST['id'];
    $curp = $_POST['curp'];

    $sql = "UPDATE datos_generales SET curp='$curp' WHERE id= '$id'";
    $resultadoSql = $conn->query($sql);

    if ($resultadoSql){
        $sqlId = "SELECT * FROM datos_generales WHERE id = '$id'";
        $resultadoSqlId = $conn->query($sqlId);
        $row = $resultadoSqlId->fetch_assoc();

        $expediente = $row['numExpediente'];

        $sqlUpdateDMedicos = "UPDATE datos_medicos SET curp = '$curp' WHERE id = '$id'";
        $resultadoDatosMedicos = $conn->query($sqlUpdateDMedicos);
        
        $sqlUpdateVivienda = "UPDATE vivienda SET curp = '$curp' WHERE expediente = '$expediente'";
        $resultadoVivienda = $conn->query($sqlUpdateVivienda);

        $sqlUpdateIntegracion = "UPDATE integracion SET curp = '$curp' WHERE expediente = '$expediente'";
        $resultadoIntegracion = $conn->query($sqlUpdateIntegracion);

        $sqlUpdateReferencias = "UPDATE referencias SET curp = '$curp' WHERE expediente = '$expediente'";
        $resultadoReferencias = $conn->query($sqlUpdateReferencias);
        
        if($resultadoDatosMedicos && $resultadoVivienda){
            echo json_encode(array(
                "success" => 1
            ));
        }
        else{

            $error1 = $conn->error;

            echo json_encode(array(
                "success" => 0,
                "error1" => $error1,
                "cadena" => $expediente,
            ));
        }

    } // fin del if

?>