<?php

    include('../prcd/qc/qc.php');
    $curp = $_POST['curp'];

    $sql = "SELECT * FROM solicitud WHERE curp = '$curp'";
    $resultadoSQL = $conn->query($sql);
    $filas = $resultadoSQL->num_rows;

    if($filas > 0){
        while($rowSQL=$resultadoSQL->fetch_assoc()){
            $idrow1 = $rowSQL['id'];
            echo'
                <tr>
                    <td>'.$rowSQL['folio_solicitud'].'</td>
                    <td>'.$rowSQL['fecha_solicitud'].'</td>';
                    $tipoNombre = $rowSQL['tipo'];

                    if ($tipoNombre == 4){
                        echo '
                            <td>Credencial</td>
                            <td>Credencial</td>
                            <td>Entregado</td>
                            <td>'.$rowSQL['entrega'].'</td>
                            <td><a href="prcd/actaER_PDF.php?curp='.$curp.'&id='.$idrow1.'&flag=1"><i class="bi bi-file-earmark-text-fill"></i> Acta de entrega</a></td>
                            <td><button class="btn btn-primary" type="button"><i class="bi bi-arrow-repeat"></i></button></td>
                        ';
                    } 
                    else if ($tipoNombre == 5){
                        echo '
                            <td>Tarjetón</td>
                            <td>Tarjetón</td>
                            <td>Entregado</td>
                            <td>'.$rowSQL['entrega'].'</td>
                            <td><a href="prcd/actaER_PDF.php?curp='.$curp.'&id='.$idrow1.'&flag=1"><i class="bi bi-file-earmark-text-fill"></i> Acta de entrega</a></td>
                            <td><button class="btn btn-primary" type="button"><i class="bi bi-arrow-repeat"></i></button></td>
                        ';
                    } 
                    
                    echo '
                    
                </tr>
            ';
        }
    }else{
        echo'
        <tr>
            <td colspan="8" class="bg-danger text-light">Sin datos de Servicios</td>
        </tr>
        ';
    }

    $sqlSolicitud = "SELECT * FROM servicios WHERE curp = '$curp'";
    $resultadosqlServicios = $conn->query($sqlSolicitud);
    
    $filas = $resultadosqlServicios->num_rows;
    
    if ($filas >= 1) {
        
        
        while ($rowSqlServicios = $resultadosqlServicios->fetch_assoc()){
            $detalle = $rowSqlServicios['detalle_solicitud'];
            $idrow = $rowSqlServicios['id'];

            $sqlServicios = "SELECT * FROM funcionales WHERE id = '$detalle'";
            $resultadoServicios = $conn->query($sqlServicios);
            $rowServicios = $resultadoServicios->fetch_assoc();
            
            $folio = $rowSqlServicios['folio_solicitud']; 
            $fecha = $rowSqlServicios['fecha_solicitud'];
            $tipo_sol = $rowSqlServicios['tipo_solicitud'];
            $nombre = $rowServicios['nombre'];
            $estatusN = $rowSqlServicios['estatus_s'];
            
            if ($tipo_sol == 1){
                $tipo = "Funcional";
            }
            else if ($tipo_sol == 2){
                $tipo = "Extraordinario";
            }
            else if ($tipo_sol == 3){
                $tipo = "Otro";
            }

            /* if ($tipoNombre == 1){ */
            echo '
            <tr>
                <td>'.$folio.'</td>
                <td>'.$fecha.'</td>
                <td>'.$tipo.'</td>
                <td>'.$nombre.'</td>
            ';
            $fechaentrega = $rowSqlServicios['fecha_entrega'];
            if ($fechaentrega == null){
                $entrega = "";
            }
            else {
                $entrega = $rowSqlServicios['fecha_entrega'];
            }

            if ($estatusN == 1){
                echo '
                    <td>Entregado</td>
                    <td>'.$entrega.'</td>
                    <td><a href="prcd/actaER_PDF.php?curp='.$curp.'&id='.$idrow.'&flag=2"><i class="bi bi-file-earmark-text-fill"></i> Acta de entrega</a></td>
                    <td><button class="btn btn-primary" type="button"><i class="bi bi-arrow-repeat"></i></button></td>
                ';
            } 
            else {
                echo '
                    <td>Lista de Espera</td>
                    <td>'.$entrega.'</td>
                    <td></td>
                    <td><button class="btn btn-primary" type="button"><i class="bi bi-arrow-repeat"></i></button></td>
                ';
            } 
        }
    } 
    else {
        echo'
            <tr>
                <td colspan="8" class="bg-danger text-light">Sin datos de Servicios</td>
            </tr>
        ';
    }
?>