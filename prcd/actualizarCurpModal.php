<?php
    include('../prcd/qc/qc.php');

    $curp = $_POST['curp'];
    $curp2 = $_POST['curp2'];

    $sql = "UPDATE datos_generales SET curp = '$curp2' WHERE curp = '$curp'";
    $resultadoSql = $conn->query($sql);
    if ($resultadoSql){
        echo json_encode(array(
            'success1'=>1
        ));

        $sql2 = "UPDATE datos_medicos SET curp = '$curp2' WHERE curp = '$curp'";
        $resultadoSql2 = $conn->query($sql2);
        
        if ($resultadoSql2){
            echo json_encode(array(
                'success2'=>1
            ));
        
            $sql3 = "UPDATE vivienda SET curp = '$curp2' WHERE curp = '$curp'";
            $resultadoSql3 = $conn->query($sql3);
        
            if ($resultadoSql3){
                echo json_encode(array(
                    'success3'=>1
                ));
                
                $sql4 = "UPDATE integracion SET curp = '$curp2' WHERE curp = '$curp'";
                $resultadoSql4 = $conn->query($sql4);
                
                if ($resultadoSql4){
                    echo json_encode(array(
                        'success4'=>1
                    ));
                } 
                
                
                $sql5 = "UPDATE referencias SET curp = '$curp2' WHERE curp = '$curp'";
                $resultadoSql5 = $conn->query($sql5);
                if ($resultadoSql5){
                    echo json_encode(array(
                        'success5'=>1
                    ));
                }
                

                $sql6 = "UPDATE documentos_list SET curp = '$curp2' WHERE curp = '$curp'";
                $resultadoSql6 = $conn->query($sql6);
                if ($resultadoSql6){
                    echo json_encode(array(
                        'success6'=>1
                    ));
                }
                
                $sql7 = "UPDATE solicitud SET curp = '$curp2' WHERE curp = '$curp'";
                $resultadoSql7 = $conn->query($sql7);
                if ($resultadoSql7){
                    echo json_encode(array(
                        'success7'=>1
                    ));
                }
                
                $sql8 = "UPDATE tarjetones SET curp = '$curp2' WHERE curp = '$curp'";
                $resultadoSql8 = $conn->query($sql8);
                if ($resultadoSql8){
                    echo json_encode(array(
                        'success8'=>1
                    ));
                }
                
                $sql9 = "UPDATE servicios SET curp = '$curp2' WHERE curp = '$curp'";
                $resultadoSql9 = $conn->query($sql9);
                if ($resultadoSql9){
                    echo json_encode(array(
                        'success9'=>1
                    ));
                }
                
            }
            
        }
        
    }
    
?>