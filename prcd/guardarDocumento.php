<?php
    session_start();
    $usr = $_SESSION['usr'];

    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');

    $fecha_registro = strftime("%Y-%m-%d,%H:%M:%S");

    include('qc/qc.php');
    include('QR/phpqrcode/qrlib.php'); 

    $fecha_entrega = strftime("%Y-%m-%d,%H:%M:%S");
    //$fecha_entrega2 = date("%Y-%m-%d,%H:%M:%S");

    $anio = strftime("%Y");
    $mes = strftime("%m");
    $dia = strftime("%d");
    $fechaQuery =  $anio.'-'.$mes.'-'.$dia;

    $curp = $_POST['curp'];
    $tipoDoc = $_POST['tipoDoc'];
    $numExp = $_POST['numExp'];

    if ($tipoDoc == 1){
        $tipo_dato = 37;
        $detalle = 4;
        $costo = 76;

        $sqlCheck = "SELECT * FROM solicitud WHERE DAY(entrega) = '$dia' AND MONTH(entrega) = '$mes' AND YEAR(entrega) = '$anio' AND curp = '$curp' AND tipo = '$detalle' AND folio_solicitud = '$numExp'";
        $resultadoSQLCheck = $conn->query($sqlCheck);
        $filas = $resultadoSQLCheck->num_rows;

        //echo $dia.'-'.$mes.'-'.$anio;
        //echo $fecha_entrega2;

        if ($filas == 0){
            $sqlInsertServicio = "INSERT INTO solicitud(
                folio_solicitud,
                curp,
                tipo,
                total_solicitud,
                fecha_solicitud,
                entrega,
                estatus,
                reimpresion
            ) VALUES (
                '$numExp',
                '$curp',
                '$detalle',
                '$costo',
                '$fecha_registro',
                '$fecha_entrega',
                1,
                0
            )";
            $resultadoServicios = $conn->query($sqlInsertServicio);
            
            $sqlinsertUsr= "INSERT INTO documentos(
                curp,
                numExpediente,
                tipoDoc,
                fecha_entrega,
                id_users
            ) 
            VALUES(
                '$curp',
                '$numExp',
                '$tipoDoc',
                '$fecha_entrega',
                '$usr'
            )";

            $resultadoUsr= $conn->query($sqlinsertUsr);

            if($resultadoUsr){
                $sqlInsertUsr = "INSERT INTO log_registro(
                    usr,
                    tipo_dato,
                    fecha)
                    VALUES(
                    '$usr',
                    '$tipo_dato',
                    '$fecha_entrega'
                    )";
                $resultadoUsr = $conn->query($sqlInsertUsr);

            }
            else{
                $error = $conn->error;
                echo json_encode(array('success'=>0,'error'=>$error));
            }
            
            echo json_encode(array(
                'success'=>1,
                'filas'=>$filas
            ));
        }

        else if ($filas >= 1) {

            $sqlinsertUsr= "UPDATE solicitud SET reimpresion = 1 WHERE curp = '$curp' AND folio_solicitud = '$numExp' AND tipoDoc = '$detalle' AND entrega = '$fecha_entrega'";

            $resultadoUsr= $conn->query($sqlinsertUsr);

            /* if($resultadoUsr){
                $sqlInsertUsr = "INSERT INTO log_registro(
                    usr,
                    tipo_dato,
                    fecha)
                    VALUES(
                    '$usr',
                    '$tipo_dato',
                    '$fecha_entrega'
                    )";
                $resultadoUsr = $conn->query($sqlInsertUsr); */
                
                /* $sqlInsertServicio = "INSERT INTO solicitud(
                    folio_solicitud,
                    curp,
                    tipo,
                    total_solicitud,
                    fecha_solicitud,
                    entrega,
                    estatus
                ) VALUES (
                    '$numExp',
                    '$curp',
                    '$detalle',
                    '$costo',
                    '$fecha_registro',
                    '$fecha_entrega',
                    1
                )";
                $resultadoServicios = $conn->query($sqlInsertServicio); */

                echo json_encode(array(
                    'success'=>2,
                    'filas'=>$filas
                ));
        }
            
    } //fin if

    else if ($tipoDoc == 2){
        $tipo_dato = 38;
        $detalle = 5;
        $costo = 120;

        $sqlInsertServicio = "INSERT INTO solicitud(
            folio_solicitud,
            curp,
            tipo,
            total_solicitud,
            fecha_solicitud,
            entrega,
            estatus,
            reimpresion
        ) VALUES (
            '$numExp',
            '$curp',
            '$detalle',
            '$costo',
            '$fecha_registro',
            '$fecha_entrega',
            1,
            0
        )";
        $resultadoServicios = $conn->query($sqlInsertServicio);
        
        $sqlinsertUsr= "INSERT INTO documentos(
            curp,
            numExpediente,
            tipoDoc,
            fecha_entrega,
            id_users
        ) 
        VALUES(
            '$curp',
            '$numExp',
            '$tipoDoc',
            '$fecha_entrega',
            '$usr'
        )";

        $resultadoUsr= $conn->query($sqlinsertUsr);

        if($resultadoUsr){
            $sqlInsertUsr = "INSERT INTO log_registro(
                usr,
                tipo_dato,
                fecha)
                VALUES(
                '$usr',
                '$tipo_dato',
                '$fecha_entrega'
                )";
            $resultadoUsr = $conn->query($sqlInsertUsr);

            echo json_encode(array('success'=>1));
        }
        else{
            
            $error = $conn->error;
            echo json_encode(array('success'=>0,'error'=>$error));
        }
    }

    /* $sqlCheck = "SELECT * FROM solicitud WHERE DAY(entrega) = '$dia' AND MONTH(entrega) = '$mes' AND YEAR($anio) AND curp = '$curp' AND tipoDoc = 1"; */
    
        /* echo json_encode(array(
            'success' => 2 
            )
        ); */


?>