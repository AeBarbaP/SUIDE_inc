<?php
    include('../prcd/qc/qc.php');

    $id = $_POST['id'];
    $curp = $_POST['curp'];
    $curp2 = $_POST['curp2'];

    $sql = "UPDATE datos_generales SET curp = '$curp2' WHERE curp = '$curp' AND id = '$id'";
    $resultadoSql = $conn->query($sql);
    if ($resultadoSql){
        $var1 = 1;

        $sql2 = "UPDATE datos_medicos SET curp = '$curp2' WHERE curp = '$curp' AND id = '$id'";
        $resultadoSql2 = $conn->query($sql2);
        
        if ($resultadoSql2){
            $var2 = 1;
        
            $sql3 = "UPDATE vivienda SET curp = '$curp2' WHERE curp = '$curp' AND id = '$id'";
            $resultadoSql3 = $conn->query($sql3);
        
            if ($resultadoSql3){
                $var3 = 1;
                
                $sql4 = "UPDATE integracion SET curp = '$curp2' WHERE curp = '$curp'";
                $resultadoSql4 = $conn->query($sql4);
                
                if ($resultadoSql4){
                    $var4 = 1;
                }
                else {
                    $var4 = 0;
                } 

                $sql5 = "UPDATE referencias SET curp = '$curp2' WHERE curp = '$curp'";
                $resultadoSql5 = $conn->query($sql5);
                if ($resultadoSql5){
                    $var5 = 1;
                }
                else {
                    $var5 = 0;
                }

                $sql6 = "UPDATE documentos_list SET curp = '$curp2' WHERE curp = '$curp'";
                $resultadoSql6 = $conn->query($sql6);
                if ($resultadoSql6){
                    $var6 = 1;
                }
                else {
                    $var6 = 0;
                }
                
                $sql7 = "UPDATE solicitud SET curp = '$curp2' WHERE curp = '$curp'";
                $resultadoSql7 = $conn->query($sql7);
                if ($resultadoSql7){
                    $var7 = 1;
                }
                else {
                    $var7 = 0;
                }
                
                $sql8 = "UPDATE tarjetones SET curp = '$curp2' WHERE curp = '$curp'";
                $resultadoSql8 = $conn->query($sql8);
                if ($resultadoSql8){
                    $var8 = 1;
                }
                else {
                    $var8 = 0;
                }
                
                $sql9 = "UPDATE servicios SET curp = '$curp2' WHERE curp = '$curp'";
                $resultadoSql9 = $conn->query($sql9);
                if ($resultadoSql9){
                    $var9 = 1;
                }
                else {
                    $var9 = 0;
                }
                
            }
            else {
                $var3 = 0;
            }
            
        } 
        else {
            $var2 = 0;
        }
    }
    else {
        $var1 = 0;
    }
    echo json_encode(array(
        'success1' => $var1,
        'success2' => $var2,
        'success3' => $var3,
        'success4' => $var4,
        'success5' => $var5,
        'success6' => $var6,
        'success7' => $var7,
        'success8' => $var8,
        'success9' => $var9
    ));
    
?>