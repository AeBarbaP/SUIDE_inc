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
$vivienda = $_POST['vivienda'];
$viviendaProp = $_POST['viviendaProp'];
$tipoVivienda = $_POST['tipoVivienda'];
$viviendaOtro = $_POST['viviendaOtro'];
$numHabitaciones = $_POST['numHabitaciones'];
$cocinav = $_POST['cocinav'];
$salav = $_POST['salav'];
$bathv = $_POST['bathv'];
$bathNumInput = $_POST['bathNum'];
$localizacion = $_POST['localizacion'];
$otroRoomInput = $_POST['otroRoomInput'];
$techo = $_POST['techo'];
$otroTechoInput = $_POST['otroTechoInput'];
$pared = $_POST['pared'];
$otroParedInput = $_POST['otroParedInput'];
$aguac = $_POST['aguac'];
$luzc = $_POST['luzc'];
$drenajec = $_POST['drenajec'];
$internetc = $_POST['internetc'];
$celularc = $_POST['celularc'];
$carroc = $_POST['carroc'];
$gasc = $_POST['gasc'];
$telefonoc = $_POST['telefonoc'];
$otroServiciosInput = $_POST['otroServiciosInput'];
$tvc = $_POST['tvc'];
$lavadorac = $_POST['lavadorac'];
$dispositivoC = $_POST['dispositivoC'];
$microondasc = $_POST['microondasc'];
$computadorac = $_POST['computadorac'];
$licuadorac = $_POST['licuadorac'];
$estufac = $_POST['estufac'];
$refrigerador = $_POST['refrigerador'];
$otroElectroInput = $_POST['otroElectroInput'];
$dependiente = $_POST['dependiente'];
$financiador = $_POST['financiador'];
$dependientes = $_POST['dependientes'];
$tipo_dato = 12;

if ($vivienda == 1) {
    $viviendaProp = $viviendaProp;
} elseif ($vivienda == 2 || $vivienda == 3) {
    $viviendaProp = 0;
}

$sqlinsert= "UPDATE vivienda SET 
    expediente = '$numExp',
    vivienda = '$vivienda',
    propietario = '$viviendaProp',
    caracteristicas = '$tipoVivienda',
    caracteristicas_otro = '$viviendaOtro',
    num_habitaciones = '$numHabitaciones',
    vivienda_cocia = '$cocinav',
    vivienda_sala = '$salav',
    vivienda_banio = '$bathv',
    num_banio = '$bathNumInput',
    localizacion = '$localizacion',
    vivienda_otros = '$otroRoomInput',
    techo = '$techo',
    techo_otro = '$otroTechoInput',
    pared = '$pared',
    pared_otro = '$otroParedInput',
    serv_basicos_agua = '$aguac',
    serv_basicos_luz = '$luzc',
    serv_basicos_drenaje = '$drenajec',
    serv_basicos_internet = '$internetc',
    serv_basicos_celular = '$celularc',
    serv_basicos_carro = '$carroc',
    serv_basicos_gas = '$gasc',
    serv_basicos_telefono = '$telefonoc',
    serv_basicos_otro = '$otroServiciosInput',
    electrodomesticos_tv = '$tvc',
    electrodomesticos_lavadora = '$lavadorac',
    electrodomesticos_dispositivo = '$dispositivoC',
    electrodomesticos_microondas = '$microondasc',
    electrodomesticos_computadora = '$computadorac',
    electrodomesticos_licuadora = '$licuadorac',
    electrodomesticos_estufa = '$estufac',
    electrodomesticos_refri = '$refrigerador',
    electrodomesticos_otro = '$otroElectroInput',
    dependiente = '$dependiente',
    financiador = '$financiador',
    personas_dependen ='$dependientes'
WHERE curp = '$curp_exp'";

$sql = "UPDATE datos_generales SET avance = 5 WHERE numExpediente = '$numExp'";
$resultadoSql = $conn->query($sql);

$resultado= $conn->query($sqlinsert);

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