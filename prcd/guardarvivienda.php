<?php
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_entrega = strftime("%Y-%m-%d,%H:%M:%S");

$curp_exp = $_POST['curp_exp'];
$vivienda = $POST['vivienda'];
$montoRenta = $POST['montoRenta'];
$viviendaDebe = $POST['viviendaDebe'];
$costoVivienda = $POST['costoVivienda'];
$tipoVivienda = $POST['tipoVivienda'];
$viviendaOtro = $POST['viviendaOtro'];
$numHabitaciones = $POST['numHabitaciones'];
$cocinav = $POST['cocinav'];
$salav = $POST['salav'];
$bathv = $POST['bathv'];
$otroRoomv = $POST['otroRoomv'];
$otroRoomInput = $POST['otroRoomInput'];
$techo = $POST['techo'];
$otroTechoInput = $POST['otroTechoInput'];
$pared = $POST['pared'];
$otroParedInput = $POST['otroParedInput'];
$aguac = $POST['aguac'];
$luzc = $POST['luzc'];
$drenajec = $POST['drenajec'];
$cablec = $POST['cablec'];
$internetc = $POST['internetc'];
$celularc = $POST['celularc'];
$carroc = $POST['carroc'];
$gasc = $POST['gasc'];
$telefonoc = $POST['telefonoc'];
$otroServiciosc = $POST['otroServiciosc'];
$otroServiciosInput = $POST['otroServiciosInput'];
$tvc = $POST['tvc'];
$lavadorac = $POST['lavadorac'];
$estereoc = $POST['estereoc'];
$microondasc = $POST['microondasc'];
$computadorac = $POST['computadorac'];
$licuadorac = $POST['licuadorac'];
$dvdc = $POST['dvdc'];
$estufac = $POST['estufac'];
$otroElectroc = $POST['otroElectroc'];
$otroElectroInput = $POST['otroElectroInput'];
$dependientes = $POST['dependientes'];
$deudas = $POST['deudas'];
$deudasInput = $POST['deudasInput'];

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
    pared,
    pared_otro,
    serv_basicos_agua,
    serv_basicos_luz,
    serv_basicos_drenaje,
    serv_basicos_cable,
    serv_basicos_internet,
    serv_basicos_celular,
    serv_basicos_carro,
    serv_basicos_gas,
    serv_basicos_telefono,
    serv_basicos_otro,
    electrodomesticos_tv,
    electrodomesticos_lavadora,
    electrodomesticos_estereo,
    electrodomesticos_microondas,
    electrodomesticos_computadora,
    electrodomesticos_licuadora,
    electrodomesticos_dvd,
    electrodomesticos_estufa,
    electrodomesticos_otro,
    personas_dependen,
    deudas,
    deudas_cuanto
    )
VALUES(
    '$curp_exp',
    '$vivienda',
    '$montoRenta',
    '$viviendaDebe',
    '$costoVivienda',
    '$tipoVivienda',
    '$viviendaOtro',
    '$numHabitaciones',
    '$cocinav',
    '$salav',
    '$bathv',
    '$otroRoomInput',
    '$techo',
    '$otroTechoInput',
    '$pared',
    '$otroParedInput',
    '$aguac',
    '$luzc',
    '$drenajec',
    '$cablec',
    '$internetc',
    '$celularc',
    '$carroc',
    '$gasc',
    '$telefonoc',
    '$otroServiciosInput',
    '$tvc',
    '$lavadorac',
    '$estereoc',
    '$microondasc',
    '$computadorac',
    '$licuadorac',
    '$dvdc',
    '$estufac',
    '$otroElectroInput',
    '$dependientes',
    '$deudas',
    '$deudasInput'
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