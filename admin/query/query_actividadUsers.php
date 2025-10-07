<?php
session_start();
include ("../prcd/qc/qc.php");

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');
$fecha_actual = strftime("%Y-%m-%d,%H:%M:%S");

$credencial = 0;
$tarjeton = 0;
$expediente = 0;


//for ($meses = 1; $meses <= 12; $meses++) {

    $sqlUsers = "SELECT * FROM users WHERE estatus = 1 ORDER BY id ASC";
    $resultadoUsers = $conn->query($sqlUsers);
    while($rowUsers = $resultadoUsers->fetch_assoc()){

        $user = $rowUsers['username'];

        $sqlExpedientesCompletos = "SELECT COUNT(*) AS conteo FROM log_registro WHERE MONTH(fecha) = MONTH(CURRENT_DATE()) AND YEAR(fecha) = YEAR(CURRENT_DATE()) AND tipo_dato = 37 AND usr = '$user'";
        $resultadoExpCompletos = $conn->query($sqlExpedientesCompletos);
        $rowResultado1 = $resultadoExpCompletos->fetch_assoc();
        $credencial = $rowResultado1['conteo'];

        $sqlExpedientesCompletos2 = "SELECT * FROM tarjetones WHERE MONTH(fecha_entrega) = MONTH(CURRENT_DATE()) AND YEAR(fecha_entrega) = YEAR(CURRENT_DATE()) AND user = '$user' GROUP BY folio_tarjeton";
        $resultadoExpCompletos2 = $conn->query($sqlExpedientesCompletos2);
        $tarjeton = $resultadoExpCompletos2->num_rows;
        
        $sqlExpedientesCompletos3 = "SELECT COUNT(*) AS conteo FROM log_registro WHERE MONTH(fecha) = MONTH(CURRENT_DATE()) AND YEAR(fecha) = YEAR(CURRENT_DATE()) AND tipo_dato = 39 AND usr = '$user'";
        $resultadoExpCompletos3 = $conn->query($sqlExpedientesCompletos3);
        $rowResultado3 = $resultadoExpCompletos3->fetch_assoc();
        $expediente = $rowResultado3['conteo'];
        
        $sqlExpedientesCompletos4 = "SELECT COUNT(*) AS conteo FROM log_registro WHERE MONTH(fecha) = MONTH(CURRENT_DATE()) AND YEAR(fecha) = YEAR(CURRENT_DATE()) AND tipo_dato = 41 AND usr = '$user'";
        $resultadoExpCompletos4 = $conn->query($sqlExpedientesCompletos4);
        $rowResultado4 = $resultadoExpCompletos4->fetch_assoc();
        $expedienteActualizado = $rowResultado4['conteo'];
        /* while($rowExp = $resultadoExpCompletos->fetch_assoc()){
            $tipoDato = $rowExp['tipo_dato'];
            if($tipoDato == 37){
                $credencial++;
            }
            elseif($tipoDato == 38){
                $tarjeton++;
            }
            elseif($tipoDato == 39){
                $expediente++;
            }
        } */
        
        $datos[] = array(
                    'usuario' => $user,
                    'credencial' => $credencial,
                    'tarjeton' => $tarjeton,
                    'expediente' => $expediente,
                    'expedienteUpdate' => $expedienteActualizado,
        );
    }

//} //for meses 12

echo json_encode($datos);

// echo var_dump($datos);

?>