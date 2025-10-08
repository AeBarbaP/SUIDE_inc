<?php
    session_start();
    include('../prcd/qc/qc.php');
    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');
    
    $fecha_actual = strftime("%Y-%m-%d,%H:%M:%S");
    // $usr = $_SESSION['usr'];
    $usr = 1;
    $mes = date('m', strtotime($fecha_actual));
    $year = date('Y', strtotime($fecha_actual));

    $sql = "SELECT * FROM log_registro WHERE tipo_dato = 39 AND MONTH(fecha) = MONTH(CURRENT_DATE()) AND YEAR(fecha) =  YEAR(CURRENT_DATE())";
    $resultado = $conn->query($sql);
    $fila = $resultado->num_rows;

    $sqlExpedientes = "SELECT * FROM log_registro WHERE tipo_dato = 37 AND MONTH(fecha) = MONTH(CURRENT_DATE()) AND YEAR(fecha) =  YEAR(CURRENT_DATE())";
    $resultadoExp = $conn->query($sqlExpedientes);
    $filaExp = $resultadoExp->num_rows;

    $sqlCredenciales = "SELECT * FROM log_registro WHERE tipo_dato = 37";
    $resultadoCred = $conn->query($sqlCredenciales);
    $credenciales = $resultadoCred->num_rows;

    $sqlTarjetones = "SELECT * FROM log_registro WHERE tipo_dato = 38 AND MONTH(fecha) = MONTH(CURRENT_DATE()) AND YEAR(fecha) =  YEAR(CURRENT_DATE())";
    $resultadoTar = $conn->query($sqlTarjetones);
    $filaTar = $resultadoTar->num_rows;

    $sqlTarjetones1 = "SELECT * FROM tarjetones GROUP BY folio_tarjeton";
    $resultadoTar1 = $conn->query($sqlTarjetones1);
    $tarjetones = $resultadoTar1->num_rows;

    $sqlActualizar = "SELECT * FROM log_registro WHERE tipo_dato = 40 AND MONTH(fecha) = MONTH(CURRENT_DATE()) AND YEAR(fecha) =  YEAR(CURRENT_DATE())";
    $resultadoAct = $conn->query($sqlActualizar);
    $filaAct = $resultadoAct->num_rows;

    $sqlTotal = "SELECT COUNT(*) AS conteoTotal FROM datos_generales";
    $resultadoTotal = $conn->query($sqlTotal);
    $rowTotal = $resultadoTotal->fetch_assoc();
    $total = $rowTotal['conteoTotal'];

    $sqlHombres = "SELECT COUNT(*) AS hombresTotal FROM datos_generales WHERE (genero = 'MASCULINO' OR genero = 'Masculino')";
    $resultadoHombres = $conn->query($sqlHombres);
    $rowHombres = $resultadoHombres->fetch_assoc();
    $hombres = $rowHombres['hombresTotal'];

    $sqlMujeres = "SELECT COUNT(*) AS mujeresTotal FROM datos_generales WHERE (genero = 'FEMENINO' OR genero = 'Femenino')";
    $resultadoMujeres = $conn->query($sqlMujeres);
    $rowMujeres = $resultadoMujeres->fetch_assoc();
    $mujeres = $rowMujeres['mujeresTotal'];


    echo json_encode(array(
        'estatus'=> 1,
        'filas'=>$fila,
        'filasExp'=>$filaExp,
        'filasTar'=>$filaTar,
        'mesActual'=>$mes,
        'anioActual'=>$year,
        'filasAct'=>$filaAct,
        'conteoTotal'=>$total,
        'mujeresTotal'=>$mujeres,
        'hombresTotal'=>$hombres,
        'credenciales'=>$credenciales,
        'tarjetones'=>$tarjetones
    ));

?>