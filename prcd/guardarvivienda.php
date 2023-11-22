<?php
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_entrega = strftime("%Y-%m-%d,%H:%M:%S");

$curp_exp = $_POST['curp_exp'];
$vivienda = $_POST['vivienda'];
$montoRenta = $_POST['montoRenta'];
$viviendaDebe = $_POST['viviendaDebe'];
$costoVivienda = $_POST['costoVivienda'];
$tipoVivienda = $_POST['tipoVivienda'];
$viviendaOtro = $_POST['viviendaOtro'];
$numHabitaciones = $_POST['numHabitaciones'];
$cocinav = $_POST['cocinav'];
$salav = $_POST['salav'];
$bathv = $_POST['bathv'];
$otroRoomInput = $_POST['otroRoomInput'];
$techo = $_POST['techo'];
$otroTechoInput = $_POST['otroTechoInput'];
$pared = $_POST['pared'];
$otroParedInput = $_POST['otroParedInput'];
$aguac = $_POST['aguac'];
$luzc = $_POST['luzc'];
$drenajec = $_POST['drenajec'];
$cablec = $_POST['cablec'];
$internetc = $_POST['internetc'];
$celularc = $_POST['celularc'];
$carroc = $_POST['carroc'];
$gasc = $_POST['gasc'];
$telefonoc = $_POST['telefonoc'];
$otroServiciosInput = $_POST['otroServiciosInput'];
$tvc = $_POST['tvc'];
$lavadorac = $_POST['lavadorac'];
$estereoc = $_POST['estereoc'];
$microondasc = $_POST['microondasc'];
$computadorac = $_POST['computadorac'];
$licuadorac = $_POST['licuadorac'];
$dvdc = $_POST['dvdc'];
$estufac = $_POST['estufac'];
$refrigerador = $_POST['refrigerador'];
$otroElectroInput = $_POST['otroElectroInput'];
$dependientes = $_POST['dependientes'];
$deudas = $_POST['deudas'];
$deudasInput = $_POST['deudasInput'];

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
    electrodomesticos_refri,
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
    '$refrigerador',
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