<?php

    include('../prcd/qc/qc.php');

    $curp = $_POST['curpTarjeton'];
    
    $Query = "SELECT * FROM tarjetones WHERE curp = '$curp'";
    $resultado_Query = $conn->query($Query);
    
    $x = 0;

    while ($row_sql_Vehiculos = $resultado_Query->fetch_assoc()){
        $x++;

        echo '
            <tr>
                <td>'.$x.'</td>
                <td>'.$row_sql_Vehiculos['vehiculo_marca'].'</td>
                <td>'.$row_sql_Vehiculos['vehiculo_modelo'].'</td>
                <td>'.$row_sql_Vehiculos['no_placa'].'</td>
            </tr>
        ';
    }
    
?>