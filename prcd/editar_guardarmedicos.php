<?php
session_start();
$usr = $_SESSION['usr'];
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_entrega = strftime("%Y-%m-%d,%H:%M:%S");

$fecha_registro = strftime("%Y-%m-%d,%H:%M:%S");

$curp_exp = $_POST['curp_exp'];
$numExp = $_POST['numExp'];
$discapacidad = $_POST['discapacidad'];
$gradoDisc = $_POST['gradoDisc'];
$descDisc = $_POST['descDisc'];
$tipoDisc = $_POST['tipoDisc'];
$causaDisc = $_POST['causaDisc'];
$especifiqueD = $_POST['especifiqueD'];
$temporalidad = $_POST['temporalidad'];
$fuente = $_POST['fuente'];
$fechaValoracion = $_POST['fechaValoracion'];
$rehabilitacion = $_POST['rehabilitacion'];
$lugarRehab = $_POST['lugarRehab'];
$fechaIni = $_POST['fechaIni'];
$duracion = $_POST['duracion'];
$tipoSangre = $_POST['tipoSangre'];
$cirugia = $_POST['cirugia'];
$tipoCirugia = $_POST['tipoCirugia'];
$protesis = $_POST['protesis'];
$tipoProtesis = $_POST['tipoProtesis'];
$alergias = $_POST['alergias'];
$alergiasFull = $_POST['alergiasFull'];
$enfermedades = $_POST['enfermedades'];
$enfermedadesFull = $_POST['enfermedadesFull'];
$medicamentos = $_POST['medicamentos'];
$medicamentosFull = $_POST['medicamentosFull'];
$asistencia = $_POST['asistencia'];
$braile = $_POST['braile'];
$lsm = $_POST['lsm'];
$labiofacial = $_POST['labiofacial'];
$permanente = $_POST['permanente'];
$tipo_dato = 18;

$sqlinsert= "UPDATE datos_medicos SET
    expediente = '$numExp',
    discapacidad = '$discapacidad',
    grado_discapacidad = '$gradoDisc',
    tipo_discapacidad = '$tipoDisc',
    descripcionDiscapacidad = '$descDisc',
    causa = '$causaDisc',
    causa_otro = '$especifiqueD',
    temporalidad = '$temporalidad',
    valoracion = '$fuente',
    fecha_valoracion = '$fechaValoracion',
    rehabilitacion = '$rehabilitacion',
    rehabilitacion_donde = '$lugarRehab',
    rehabilitacion_inicio = '$fechaIni',
    rehabilitacion_duracion = '$duracion',
    tipo_sangre = '$tipoSangre',
    cirugias = '$cirugia',
    tipo_cirugias = '$tipoCirugia',
    protesis = '$protesis',
    protesis_tipo = '$tipoProtesis',
    alergias = '$alergias',
    alergias_cual = '$alergiasFull',
    enfermedades = '$enfermedades',
    enfermedades_cual = '$enfermedadesFull',
    medicamentos = '$medicamentos',
    medicamentos_cual = '$medicamentosFull',
    asistencia = '$asistencia',
    braile = '$braile',
    lsm = '$lsm',
    labiofacial = '$labiofacial',
    tiempo_asistencia = '$permanente'
WHERE curp = '$curp_exp'
";

$resultado= $conn->query($sqlinsert);

if ($resultado) {
    $rowUpdate = $conn->query("SELECT COUNT(*) AS filas FROM datos_generales WHERE curp = '$curp_exp' AND DATE(fecha_actualizacion) = DATE('$fecha_entrega')")->fetch_assoc();

    if ($rowUpdate['filas']=0){

        $sqlUpdateUsr="UPDATE datos_generales SET 
            usuario_actualiza = '$usr',
            fecha_actualizacion = '$fecha_entrega'
        WHERE 
            curp = '$curp_exp' 
        AND 
            numExpediente = '$numExp'
        ";
        $resultadoUpdateUsr= $conn->query($sqlUpdateUsr);
        
        if ($resultadoUpdateUsr){
            $sqlInsertUsr1 = "INSERT INTO log_registro(
                usr,
                tipo_dato,
                fecha)
                VALUES(
                '$usr',
                40,
                '$fecha_registro')
            ";
            $resultadoUsr1 = $conn->query($sqlInsertUsr1);
            
            $sqlInsertUsr = "INSERT INTO log_registro(
                                usr,
                                tipo_dato,
                                fecha
                            )
                            VALUES (
                                '$usr',
                                '$tipo_dato',
                                '$fecha_registro'
                            )";
            $resultadoUsr = $conn->query($sqlInsertUsr);

            echo json_encode(array(
                'success'=>2
            ));
        }
        else {
            $error = $conn->error;
            echo $error;
            echo json_encode(array(
                'success'=>3,
                'error'=>$error
            ));
        }
    } 
    else {
        $sqlInsertUsr = "INSERT INTO log_registro(
            usr,
            tipo_dato,
            fecha)
            VALUES(
            '$usr',
            '$tipo_dato',
            '$fecha_registro')";
        $resultadoUsr = $conn->query($sqlInsertUsr);
        
        echo json_encode(array(
            'success'=>1
        ));
    }

    
}
else {
    $error = $conn->error;
    echo $error;
    echo json_encode(array(
        'success'=>4,
        'error'=>$error
    ));

}

?>