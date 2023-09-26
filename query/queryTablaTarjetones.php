<?php

    include('../prcd/qc/qc.php');

    $curp = $_POST['curpTarjeton'];
    
    $Query = "SELECT * FROM tarjetones WHERE curp = '$curp'";
    $resultado_Query = $conn->query($Query);
    $fila = $resultado_Query->num_rows;
    
    if($fila > 0){
    $x = 0;

    while ($row_sql_Vehiculos = $resultado_Query->fetch_assoc()){
        $x++;
        $id = $row_sql_Vehiculos['id'];
        $folioD = $row_sql_Vehiculos['folio_tarjeton'];

        echo '
            
            <tr>
                <td>'.$x.'</td>
                <td>'.$row_sql_Vehiculos['vehiculo_marca'].'</td>
                <td>'.$row_sql_Vehiculos['vehiculo_modelo'].'</td>
                <td>'.$row_sql_Vehiculos['no_placa'].'</td>
                <td>'.$row_sql_Vehiculos['folio_tarjeton'].'</td>
                <td><a href="#" onclick="" data-bs-toggle="modal" data-bs-target="#editarVehiculo"><i class="bi bi-pencil-square"></i></a> <a href="#" class="link-danger" onclick="borrarVehiculo('.$id.','.$folioD.')"><i class="bi bi-trash"></i></a> <input type="text" id="idVehiculoT" value="'.$id.'" hidden>
                <input type="text" id="folioDT" value="'.$folioD.'" hidden></td>
                
                </tr>
                ';
                echo'
                <script>
                habilitarBtn();
        </script>
        ';
    }
}// fin if
else{
    echo '
    <script>
    deshabilitarBtn();
    </script>';
}
    
?>