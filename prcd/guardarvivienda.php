<?php
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_entrega = strftime("%Y-%m-%d,%H:%M:%S");

$curp_exp = $_POST['curp_exp'];
$discapacidad = $_POST['discapacidad'];
$gradoDisc = $_POST['gradoDisc'];
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

$sqlinsert= "INSERT INTO vivienda (
    curp,
    vivienda,
    vivienda_renta,
    vivienda_pagando,
    monto_pagando,
    caracteristicas,
    caracteristicas_otro,
    num_habitaciones,
    vivienda_cocia,
    vivienda_sala,
    vivienda_banio,
    vivienda_otros,
    techo,
    techo_otro,
    serv_basicos_agua,
    serv_basicos_luz,
    serv_basicos_drenaje,
    serv_basicos_cable,
    serv_basicos_internet,
    serv_basicos_celular,
    serv_basicos_carro,
    serv_basicos_gas,
    serv_basicos_telefono,
    electrodomesticos_tv,
    electrodomesticos_lavadora,
    electrodomesticos_estereo,
    electrodomesticos_microondas,
    electrodomesticos_computadora,
    electrodomesticos_licuadora,
    electrodomesticos_dvd,
    electrodomesticos_estufa,
    personas_dependen,
    deudas,
    deudas_cuanto
    )
VALUES(
    '$curp_exp',
    '$discapacidad',
    '$gradoDisc',
    '$tipoDisc',
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
    '$medicamentosFull'
)";

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