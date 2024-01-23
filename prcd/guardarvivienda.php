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

$sqlinsert= "INSERT INTO vivienda (
    curp,
    expediente,
    vivienda,
    propietario,
    caracteristicas,
    caracteristicas_otro,
    num_habitaciones,
    vivienda_cocia,
    vivienda_sala,
    vivienda_banio,
    num_banio,
    localizacion,
    vivienda_otros,
    techo,
    techo_otro,
    pared,
    pared_otro,
    serv_basicos_agua,
    serv_basicos_luz,
    serv_basicos_drenaje,
    serv_basicos_internet,
    serv_basicos_celular,
    serv_basicos_carro,
    serv_basicos_gas,
    serv_basicos_telefono,
    serv_basicos_otro,
    electrodomesticos_tv,
    electrodomesticos_lavadora,
    electrodomesticos_dispositivo,
    electrodomesticos_microondas,
    electrodomesticos_computadora,
    electrodomesticos_licuadora,
    electrodomesticos_estufa,
    electrodomesticos_refri,
    electrodomesticos_otro,
    dependiente,
    financiador,
    personas_dependen
    )
VALUES(
    '$curp_exp',
    '$numExp',
    '$vivienda',
    '$viviendaProp',
    '$tipoVivienda',
    '$viviendaOtro',
    '$numHabitaciones',
    '$cocinav',
    '$salav',
    '$bathv',
    '$bathNumInput',
    '$localizacion',
    '$otroRoomInput',
    '$techo',
    '$otroTechoInput',
    '$pared',
    '$otroParedInput',
    '$aguac',
    '$luzc',
    '$drenajec',
    '$internetc',
    '$celularc',
    '$carroc',
    '$gasc',
    '$telefonoc',
    '$otroServiciosInput',
    '$tvc',
    '$lavadorac',
    '$dispositivoC',
    '$microondasc',
    '$computadorac',
    '$licuadorac',
    '$estufac',
    '$refrigerador',
    '$otroElectroInput',
    '$dependiente',
    '$financiador',
    '$dependientes'
)";

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