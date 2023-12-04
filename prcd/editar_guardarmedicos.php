<?php
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_entrega = strftime("%Y-%m-%d,%H:%M:%S");

$curp_exp = $_POST['curp_exp'];
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

$sqlinsert= "UPDATE datos_medicos SET
    curp = '$curp_exp',
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
    medicamentos_cual = '$medicamentosFull'
WHERE curp = '$curp'
";

$resultado= $conn->query($sqlinsert);

if ($resultado) {
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