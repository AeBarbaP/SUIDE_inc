<?php
    include('../prcd/qc/qc.php');
    echo "Iniciando procedimiento... <br>";
    
    $sqlGenerales = "SELECT * FROM datos_generales";
    $resultadosqlGenerales = $conn->query($sqlGenerales);
    /* $filas = $resultadosqlGenerales->num_rows; */
    
    /* $sql = "SELECT * FROM finados";
    $resultadosql = $conn->query($sql); */

    while($row = $resultadosqlGenerales->fetch_assoc()){
        $expediente = $row['numExpediente'];
        $estatus = $row['estatus'];

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

        if($estatus == 3){

            $actualiza = "UPDATE datos_generales SET estatus = 1 WHERE numExpediente LIKE '$expediente'";
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