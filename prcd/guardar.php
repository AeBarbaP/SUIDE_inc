<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<html>
    <header>
        <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="QR/ajax_generate_code.js"></script>
        <script src="print.js" type="text/javascript"></script>
    </header>
<body>

<?php
include('qc/qc.php');
include('QR/phpqrcode/qrlib.php'); 

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_entrega = strftime("%Y-%m-%d,%H:%M:%S");

$nombre = $_POST['nombre'];
$apellidoP = $_POST['apellido_p'];
$apellidoM = $_POST['apellido_m'];
$genero = $_POST['genero'];
$edad = $_POST['edad'];
$edo_civil = $_POST['edo_civil'];
$curp = $_POST['curp'];
$rfc = $_POST['rfc'];
$fechaNacimiento = $_POST['f_nacimiento'];
$lugarNacimiento = $_POST['lugar_nacimiento'];
$domicilio = $_POST['domicilio'];
$numExt = $_POST['no_ext'];
$numInt = $_POST['no-int'];
$colonia = $_POST['colonia'];
$entreVialidades = $_POST['entre_vialidades'];
$descripcionLugar = $_POST['descr_referencias'];
$localidad = $_POST['localidad'];
$municipio = $_POST['municipio'];
$codigoPostal = $_POST['cp'];
$telFijo = $_POST['telefono_part'];
$celular = $_POST['telefono_cel'];
$escolaridad = $_POST['escolaridad'];
$estudia = $_POST['estudia'];
$estudiaLugar = $_POST['estudia_donde'];
$habilidad = $_POST['estudia_habilidad'];
$profesion = $_POST['profesión'];
$trabaja = $_POST['trabaja'];
$trabajaLugar = $_POST['trabaja_donde'];
$ingresoMensual = $_POST['trabaja_ingresos'];
$asociacion = $_POST['asoc_civil'];
$asociacion_nombre = $_POST['asoc_cual'];
$sindicato = $_POST['sindicato'];
$nombreSindicato = $_POST['sindicato_cual'];
$pension = $_POST['pensionado'];
$pensionInst = $_POST['pensionado_donde'];
$pensionMonto = $_POST['pension_monto'];
$pensionTemporalidad = $_POST['pension_temporalidad'];
$seguridadsocial = $_POST['seguridad_social'];
$otroSS = $_POST['seguridad_social_donde'];


$sqlinsert= "INSERT INTO datos_generales (
    nombre,
    apellidoP,
    apellidoM,
    genero,
    edad,
    edo_civil,
    curp,
    rfc,
    fechaNacimiento,
    lugarNacimiento,
    domicilio,
    numExt,
    numInt,
    colonia,
    entreVialidades,
    descripcionLugar,
    localidad,
    municipio,
    codigoPostal,
    telFijo,
    celular,
    escolaridad,
    estudia,
    estudiaLugar,
    habilidad,
    profesion,
    trabaja,
    trabajaLugar,
    ingresoMensual,
    asociacion,
    asociacion_nombre,
    sindicato,
    nombreSindicato,
    pension,
    pensionInst,
    pensionMonto,
    pensionTemporalidad,
    seguridadsocial,
    otroSS)
VALUES(
    '$nombre',
    '$apellidoP',
    '$apellidoM',
    '$genero',
    '$edad',
    '$edo_civil',
    '$curp',
    '$rfc',
    '$fechaNacimiento',
    '$lugarNacimiento',
    '$domicilio',
    '$numExt',
    '$numInt',
    '$colonia',
    '$entreVialidades',
    '$descripcionLugar',
    '$localidad',
    '$municipio',
    '$codigoPostal',
    '$telFijo',
    '$celular',
    '$escolaridad',
    '$estudia',
    '$estudiaLugar',
    '$habilidad',
    '$profesion',
    '$trabaja',
    '$trabajaLugar',
    '$ingresoMensual',
    '$asociacion',
    '$asociacion_nombre',
    '$sindicato',
    '$nombreSindicato',
    '$pension',
    '$pensionInst',
    '$pensionMonto',
    '$pensionTemporalidad',
    '$seguridadsocial',
    '$seguridadsocial'
)";

$resultado= $conn->query($sqlinsert);

if ($resultado) {
    echo json_encode(array(
        'success'=>1
    ));
}
else {
    $error = $conn->error;
    echo json_encode(array(
        'success'=>2,
        'error'=>$error
    ));

}

?>
    
</body>
</html>