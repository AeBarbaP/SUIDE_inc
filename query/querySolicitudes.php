<?php

    include('../prcd/qc/qc.php');
    $curp = $_POST['curp'];

    $sql = "SELECT * FROM solicitud WHERE curp = '$curp'";
    $resultadoSQL = $conn->query($sql);
    $filas = $resultadoSQL->num_rows;

    if($filas > 0){
        while($rowSQL=$resultadoSQL->fetch_assoc()){
            
            echo'
                <tr>
                    <td>'.$rowSQL['folio_solicitud'].'</td>
                    <td>'.$rowSQL['fecha_solicitud'].'</td>';
                    $tipoNombre = $rowSQL['tipo'];
                    if ($tipoNombre == 1){
                        echo '
                            <td>Funcionales</td>
                        ';
                    } 
                    else if ($tipoNombre == 2){
                        echo '
                            <td>Extraordinarios</td>
                        ';
                    } 
                    else if ($tipoNombre == 3){
                        echo '
                            <td>Otros</td>
                        ';
                    } 
                    echo '
                    <td>'.$rowSQL['total_solicitud'].'</td>
                    ';
                    $estatusN = $rowSQL['estatus'];
                    if ($estatusN == 1){
                        echo '
                            <td>Entregado</td>
                        ';
                    } 
                    else {
                        echo '
                            <td>Lista de Espera</td>
                        ';
                    } 
                    echo '
                    <td>'.$rowSQL['entrega'].'</td>
                    <td><a href=""><i class="bi bi-file-earmark-text-fill"></i> Acta de entrega</a></td>
                </tr>
            ';
        }
    }else{
        echo'
        <tr>
            <td colspan="8" class="bg-danger text-light">Sin datos</td>
        </tr>
        ';
    }
?>