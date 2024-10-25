<?php
    include('../prcd/qc/qc.php');

    $curp = $_POST['curp'];
    $curp2 = $_POST['curp2'];

    $sql = "UPDATE datos_generales SET curp = '$curp2' WHERE curp = '$curp";
    $resultadoSql = $conn->query($sql);
    if ($resultadoSql){
        $sql2 = "UPDATE datos_medicos SET curp = '$curp2' WHERE curp = '$curp";
        $resultadoSql2 = $conn->query($sql2);
        if ($resultadoSql2){
            $sql3 = "UPDATE vivienda SET curp = '$curp2' WHERE curp = '$curp'";
            $resultadoSql3 = $conn->query($sql3);
            if ($resultadoSql3){
                $sql4 = "UPDATE integracion SET curp = '$curp2' WHERE curp = '$curp'";
                $resultadoSql4 = $conn->query($sql4);
                if ($resultadoSql4){
                    $sql5 = "UPDATE referencias SET curp = '$curp2' WHERE curp = '$curp'";
                    $resultadoSql5 = $conn->query($sql5);
                    if ($resultadoSql5){
                        echo "CURP actualizado correctamente.";
                    } else {
                        echo "Error al actualizar los datos de referencias: ". $conn->error;
                    }
                } else {
                    echo "Error al actualizar los datos de integración: ". $conn->error;
                }
            }

        }
    }
?>