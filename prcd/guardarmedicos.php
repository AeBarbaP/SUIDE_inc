<?php
session_start();
$usr = $_SESSION['usr'];
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_registro = strftime("%Y-%m-%d,%H:%M:%S");

$fecha_entrega = strftime("%Y-%m-%d,%H:%M:%S");

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
$tipo_dato = 6;

$sqlinsert= "INSERT INTO datos_medicos (
    curp,
    expediente,
    discapacidad,
    grado_discapacidad,
    tipo_discapacidad,
    descripcionDiscapacidad,
    causa,
    causa_otro,
    temporalidad,
    valoracion,
    fecha_valoracion,
    rehabilitacion,
    rehabilitacion_donde,
    rehabilitacion_inicio,
    rehabilitacion_duracion,
    tipo_sangre,
    cirugias,
    tipo_cirugias,
    protesis,
    protesis_tipo,
    alergias,
    alergias_cual,
    enfermedades,
    enfermedades_cual,
    medicamentos,
    medicamentos_cual,
    asistencia,
    braile,
    lsm,
    labiofacial
    )
VALUES(
    '$curp_exp',
    '$numExp',
    '$discapacidad',
    '$gradoDisc',
    '$tipoDisc',
    '$descDisc',
    '$causaDisc',
    '$especifiqueD',
    '$temporalidad',
    '$fuente',
    '$fechaValoracion',
    '$rehabilitacion',
    '$lugarRehab',
    '$fechaIni',
    '$duracion',
    '$tipoSangre',
    '$cirugia',
    '$tipoCirugia',
    '$protesis',
    '$tipoProtesis',
    '$alergias',
    '$alergiasFull',
    '$enfermedades',
    '$enfermedadesFull',
    '$medicamentos',
    '$medicamentosFull',
    '$asistencia',
    '$braile',
    '$lsm',
    '$labiofacial'
)";

$resultado= $conn->query($sqlinsert);

$sql = "UPDATE datos_generales SET estatus = 4 WHERE numExpediente = '$numExp'";
$resultadoSql = $conn->query($sql);

if ($resultado) {
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
else {
    $error = $conn->error;
    echo $error;
    echo json_encode(array(
        'success'=>2,
        'error'=>$error
    ));

}

?>