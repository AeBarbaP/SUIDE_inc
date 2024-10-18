<?php
    include('../prcd/qc/qc.php');
    include('../prcd/qc/qc2.php');

    $db1 = "SELECT * FROM Expedientes ORDER BY ordenExpediente ASC";
    //$db1 = "SELECT * FROM Expedientes ORDER BY RAND() LIMIT 1, 15";
    $resultadoDB1 = $conn2->query($db1);

    while($rowDB = $resultadoDB1->fetch_assoc()){
        $id = $rowDB['id']; // con este se concatena para datos_generales
        $ordenExpediente = $rowDB['ordenExpediente'];
        echo $ordenExpediente;

        if (strlen($ordenExpediente) == 3){
            $ordenExpediente = "0".$ordenExpediente;
        }
        else if (strlen($ordenExpediente) == 2){
            $ordenExpediente = "00".$ordenExpediente;
        }
        else if (strlen($ordenExpediente) == 1){
            $ordenExpediente = "000".$ordenExpediente;
        }
        else {
            echo "Expediente ".$ordenExpediente." encontrado.<br>";
        }

        if ($ordenExpediente == 0000){
            echo "Num 0000 no agregado";
        }
        else{

            $db2 = "SELECT * FROM DetalleExpedientes WHERE idExpediente = '$id'";
            $resultadoDB2 = $conn2->query($db2);
            $rowDB2 = $resultadoDB2->fetch_assoc();


            $idCatEstadoCivil = $rowDB2['idCatEstadoCivil']; // se relaciona con idExpediente

            $dbEstadoCivil = "SELECT * FROM CatEstadoCiviles WHERE id = '$idCatEstadoCivil'";
            $resultadodbEstadoCivil = $conn2->query($dbEstadoCivil);

            if ($rowdbEstadoCivil = $resultadodbEstadoCivil->fetch_assoc()){
                $estadocivil = $rowdbEstadoCivil['nombreEstadoCivil'];
            }
            else {
                $estadocivil = "";
            }

            $sqlUpdate = "UPDATE datos_generales SET edo_civil = '$estadocivil' WHERE numExpediente LIKE '%-$ordenExpediente'";
            $resultadoUpdate = $conn->query($sqlUpdate);
            if ($resultadoUpdate){
                echo "Expediente: ".$ordenExpediente." - Estado Civil: ".$estadocivil."<br>";
                $error = $conn->error;
                echo "Error: ".$error."<br>";
            }
            else{
                echo "Expediente: ".$ordenExpediente." - No se pudo actualizar estado civil.<br>";
            }
        }
    }
?>