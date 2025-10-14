<?php
    session_start();
    include('../prcd/qc/qc.php');
    // $usr = $_SESSION['usr'];
    
    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');

    $fechaHoy = new DateTime();
    $mes = $fechaHoy->format('m');
    $anio = $fechaHoy->format('Y');

    $sql = "SELECT datos_generales.municipio, COUNT(tarjetones.folio_tarjeton) AS tarjetonesTotal FROM datos_generales 
    INNER JOIN tarjetones ON tarjetones.numExpediente = datos_generales.id
    WHERE (MONTH(tarjetones.fecha_entrega) = 08 AND YEAR(tarjetones.fecha_entrega) = YEAR(CURRENT_DATE())) AND tarjetones.tipo_tarjeton = 1 
    GROUP BY datos_generales.municipio"; 
    $resultado = $conn->query($sql);

    $municipiosTarjetones = array();

    while ($rowTarjetones = $resultado->fetch_assoc()){    
        $cveMunicipio = $rowTarjetones['municipio'];

        $sqlMun = "SELECT * FROM catmunicipios WHERE claveMunicipio = '$cveMunicipio'";
        $resultadoMun = $conn->query($sqlMun);
        $rowMun = $resultadoMun->fetch_assoc();

        $totalTarjetones = $rowTarjetones['tarjetonesTotal'];
        $municipiosTarjetones[] = array(
            'municipio' => $rowMun['nombreMunicipio'],
            'tarjetones' => (int)$rowTarjetones['tarjetonesTotal']
        );
    }

    $sql2 = "SELECT datos_generales.municipio, COUNT(solicitud.folio_solicitud) AS credencialesTotal FROM datos_generales 
    INNER JOIN solicitud ON solicitud.folio_solicitud = datos_generales.numExpediente
    WHERE MONTH(solicitud.fecha_solicitud) = 08 AND YEAR(solicitud.fecha_solicitud) = YEAR(CURRENT_DATE())  
    GROUP BY datos_generales.municipio"; 
    $resultado2 = $conn->query($sql2);

    $municipiosCredenciales = array();

    while ($rowCredenciales = $resultado2->fetch_assoc()){    
        $cveMunicipio = $rowCredenciales['municipio'];

        $sqlMun = "SELECT * FROM catmunicipios WHERE claveMunicipio = '$cveMunicipio'";
        $resultadoMun = $conn->query($sqlMun);
        $rowMun = $resultadoMun->fetch_assoc();

        $totalCredenciales = $rowCredenciales['credencialesTotal'];
        $municipiosCredenciales[] = array(
            'municipio' => $rowMun['nombreMunicipio'],
            'credenciales' => (int)$rowCredenciales['credencialesTotal']
        );
    }

    $sql3 = "SELECT datos_generales.municipio, COUNT(datos_generales.id) AS expedientesTotal FROM datos_generales
    WHERE MONTH(datos_generales.fecha_registro) = 08 AND YEAR(datos_generales.fecha_registro) = YEAR(CURRENT_DATE())  
    GROUP BY datos_generales.municipio"; 
    $resultado3 = $conn->query($sql3);

    $municipiosExpedientes = array();

    while ($rowExpedientes = $resultado3->fetch_assoc()){    
        $cveMunicipio = $rowExpedientes['municipio'];

        $sqlMun = "SELECT * FROM catmunicipios WHERE claveMunicipio = '$cveMunicipio'";
        $resultadoMun = $conn->query($sqlMun);
        $rowMun = $resultadoMun->fetch_assoc();

        $totalExpedientes = $rowExpedientes['expedientesTotal'];
        $municipiosExpedientes[] = array(
            'municipio' => $rowMun['nombreMunicipio'],
            'expedientes' => (int)$rowExpedientes['expedientesTotal']
        );
    }

    $sql4 = "SELECT datos_generales.municipio, COUNT(datos_generales.id) AS expedientesActualizados FROM datos_generales
    WHERE MONTH(datos_generales.fecha_actualizacion) = 08 AND YEAR(datos_generales.fecha_actualizacion) = YEAR(CURRENT_DATE())  
    GROUP BY datos_generales.municipio"; 
    $resultado4 = $conn->query($sql4);

    $municipiosExpedientesAct = array();

    while ($rowExpedientesAct = $resultado4->fetch_assoc()){    
        $cveMunicipioAct = $rowExpedientesAct['municipio'];

        $sqlMun = "SELECT * FROM catmunicipios WHERE claveMunicipio = '$cveMunicipioAct'";
        $resultadoMun = $conn->query($sqlMun);
        $rowMun = $resultadoMun->fetch_assoc();

        $totalExpedientes = $rowExpedientesAct['expedientesActualizados'];
        $municipiosExpedientesAct[] = array(
            'municipio' => $rowMun['nombreMunicipio'],
            'expedientesActualizados' => (int)$rowExpedientesAct['expedientesActualizados']
        );
    }

    $arrayCombinado = [
        $municipiosTarjetones,
        $municipiosCredenciales,
        $municipiosExpedientesAct,
        $municipiosExpedientes
    ];

    echo json_encode($arrayCombinado);

?>