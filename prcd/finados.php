<?php
    include('qc/qc.php');
    echo "Iniciando procedimiento... <br>";
    $sql = "SELECT * FROM finados";
    $resultadosql = $conn->query($sql);
    while($row = $resultadosql->fetch_assoc()){
        $expediente = $row['expediente'];
        if (strlen($expediente) == 3){
            $expediente = "0".$expediente;
        }
        else if (strlen($expediente) == 2){
            $expediente = "00".$expediente;
        }
        else if (strlen($expediente) == 1){
            $expediente = "000".$expediente;
        }
        else {
            echo "Expediente ".$expediente." encontrado.<br>";
        }

        $sqlGenerales = "SELECT * FROM datos_generales WHERE numExpediente LIKE '%-$expediente'";
        $resultadosqlGenerales = $conn->query($sqlGenerales);
        $filas = $resultadosqlGenerales->num_rows;
        if($filas == 1){

            $actualiza = "UPDATE datos_generales SET estatus = 2 WHERE numExpediente LIKE '%-$expediente'";
            $actualizaSql = $conn->query($actualiza);
            if ($actualizaSql){
                echo "Expediente ".$expediente." actualizado correctamente.<br>";
            }
            else {
                echo "Error al actualizar el expediente ".$expediente.".<br>";
            }
        }
        else {
            echo "Expediente ".$expediente." no encontrado.<br>";
        }
    }

?>