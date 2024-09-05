<?php

    include('../prcd/qc/qc.php');

    $folioTarjeton = $_POST['folioTarjeton'];

    if ($folioTarjeton == "" || $folioTarjeton == null){
        echo json_encode(
            array(
                'success'=> 3
            )
        );
    }
    else {
    
        $Query = "SELECT * FROM tarjetones WHERE folio_tarjeton = '$folioTarjeton'";
        $resultado_Query = $conn->query($Query);
        $fila = $resultado_Query->num_rows;
        
        if($fila > 0){
            echo json_encode(
                array(
                    'success'=> 0
                )
            );
        }
        else{
            echo json_encode(
                array(
                    'success'=> 1
                )
            );
        }
    }
    
?>