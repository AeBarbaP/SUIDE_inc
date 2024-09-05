<?php
    include('../prcd/qc/qc.php');

    $id = $_POST['id'];
    $curp = $_POST['curp'];

    $sql = "UPDATE datos_generales SET curp='$curp' WHERE id= '$id'";
    $resultadoSql = $conn->query($sql);

    if ($resultadoSql){
        $sqlId = "SELECT * FROM datos_generales WHERE id = '$id'";
        $resultadoSqlId = $conn->query($sqlId);
        $row = $resultadoSqlId->fetch_assoc();

        $expediente = $row['numExpediente'];
        $lengthExp = strlen($expediente);
        $idExp = substr($expediente,7,$lengthExp);

        $sqlUpdateDMedicos = "UPDATE datos_medicos SET 
                curp = '$curp'
            WHERE id = '$id'";
        $resultadoDatosMedicos = $conn->query($sqlUpdateDMedicos);
        
        $sqlUpdateDVivienda = "UPDATE vivienda SET 
                curp = '$curp'
            WHERE expediente = '$expediente'";
        $resultadoDatosVivienda = $conn->query($sqlUpdateDVivienda);
        
        $sqlUpdateDReferencias = "UPDATE referencias SET 
                curp = '$curp'
            WHERE expediente = '$expediente'";
        $resultadoDatosReferencias = $conn->query($sqlUpdateDReferencias);

        $sqlUpdateDIntegracion = "UPDATE integracion SET
                curp = '$curp'
            WHERE expediente = '$expediente'";
        $resultadoDatosIntegracion = $conn->query($sqlUpdateDIntegracion);
        
        if($resultadoDatosMedicos){
            echo json_encode(array(
                "success" => 1,
                "curp" => $curp
            ));
        }
        else{
            $error21 = $conn2->error;

            echo json_encode(array(
                "success" => 0,
                "error1" => $error21
            ));
        }

    } // fin del if

?>