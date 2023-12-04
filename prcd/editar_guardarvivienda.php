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

$sqlinsert= "UPDATE vivienda SET
    curp = '$curp_exp',
    vivienda = '$vivienda',
    vivienda_renta = '$montoRenta',
    vivienda_pagando = '$viviendaDebe',
    monto_pagando = '$costoVivienda',
    caracteristicas = '$tipoVivienda',
    caracteristicas_otro = '$viviendaOtro',
    num_habitaciones = '$numHabitaciones',
    vivienda_cocia = '$cocinav',
    vivienda_sala = '$salav',
    vivienda_banio = '$bathv',
    vivienda_otros = '$otroRoomInput',
    techo = '$techo',
    techo_otro = '$otroTechoInput',
    pared = '$pared',
    pared_otro = '$otroParedInput',
    serv_basicos_agua = '$aguac',
    serv_basicos_luz = '$luzc',
    serv_basicos_drenaje = '$drenajec',
    serv_basicos_cable = '$cablec',
    serv_basicos_internet = '$internetc',
    serv_basicos_celular = '$celularc',
    serv_basicos_carro = '$carroc',
    serv_basicos_gas = '$gasc',
    serv_basicos_telefono = '$telefonoc',
    serv_basicos_otro = '$otroServiciosInput',
    electrodomesticos_tv = '$tvc',
    electrodomesticos_lavadora = '$lavadorac',
    electrodomesticos_estereo = '$estereoc',
    electrodomesticos_microondas = '$microondasc',
    electrodomesticos_computadora = '$computadorac',
    electrodomesticos_licuadora = '$licuadorac',
    electrodomesticos_dvd = '$dvdc',
    electrodomesticos_estufa = '$estufac',
    electrodomesticos_refri = '$refrigerador',
    electrodomesticos_otro = '$otroElectroInput',
    personas_dependen = '$dependientes',
    deudas = '$deudas',
    deudas_cuanto = '$deudasInput'
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