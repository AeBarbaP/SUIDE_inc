<?php
session_start();
$usr = $_SESSION['usr'];
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_registro = strftime("%Y-%m-%d,%H:%M:%S");
$numExp = $_POST['numExp'];
$nombre = $_POST['nombre'];
$apellidoP = $_POST['apellidoP'];
$apellidoM = $_POST['apellidoM'];
$genero = $_POST['genero'];
$edad = $_POST['edad'];
$edoCivil = $_POST['edoCivil'];
$curp = $_POST['curp'];
$rfc = $_POST['rfc'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$lugarNacimiento = $_POST['lugarNacimiento'];
$domicilio = $_POST['domicilio'];
$numExt = $_POST['numExt'];
$numInt = $_POST['numInt'];
$tipoVialidad = $_POST['tipoVialidad'];
$colonia = $_POST['colonia'];
$entreVialidades = $_POST['entreVialidades'];
$descripcionLugar = $_POST['descripcionLugar'];
$estado = $_POST['estado'];
$municipio = $_POST['municipio'];
$localidad = $_POST['localidad'];
$asentamiento = $_POST['asentamiento'];
$codigoPostal = $_POST['codigoPostal'];
$correo = $_POST['correo'];
$telFijo = $_POST['telFijo'];
$celular = $_POST['celular'];
$leer = $_POST['leer'];
$escolaridad = $_POST['escolaridad'];
$escolaridad_nombre = $_POST['escolaridad_nombre'];
$concluida = $_POST['concluida'];
$estudia = $_POST['estudia'];
$estudiaLugar = $_POST['estudiaLugar'];
$habilidad = $_POST['habilidad'];
$profesion = $_POST['profesion'];
$trabaja = $_POST['trabaja'];
$trabajaLugar = $_POST['trabajaLugar'];
$lugartrabajoOtro = $_POST['lugarTrabajoOtro'];
$ingresoMensual = $_POST['ingresoMensual'];
$asociacion = $_POST['asociacion'];
$nombreAC = $_POST['nombreAC'];
$pension = $_POST['pension'];
$pensionInst = $_POST['pensionInst'];
$pensionMonto = $_POST['pensionMonto'];
$pensionTemporalidad = $_POST['pensionTemporalidad'];
$informanteLog = $_POST['informanteLog'];
$informanteRelacion = $_POST['informanteRelacion'];
$informanteRelacionOtro1 = $_POST['informanteRelacionOtro1'];
$seguridadsocial = $_POST['seguridadsocial'];
$otroSS = $_POST['otroSS'];
$numSS = $_POST['numSS'];
$gruposFull = $_POST['gruposFull'];
$estatus = $_POST['estatus'];
$tipo_dato = 13;

if ($curp != "" || $curp != null){
    $sqlinsert= "UPDATE datos_generales SET 
        numExpediente = '$numExp',
        fecha_actualizacion = '$fecha_registro',
        nombre = '$nombre',
        apellido_p = '$apellidoP',
        apellido_m = '$apellidoM',
        genero = '$genero',
        edad = '$edad',
        edo_civil = '$edoCivil',
        curp = '$curp',
        rfc = '$rfc',
        f_nacimiento = '$fechaNacimiento',
        lugar_nacimiento = '$lugarNacimiento',
        domicilio = '$domicilio',
        no_ext = '$numExt',
        no_int = '$numInt',
        colonia = '$colonia',
        entre_vialidades = '$entreVialidades',
        descr_referencias = '$descripcionLugar',
        estado = '$estado',
        municipio = '$municipio',
        localidad = '$localidad',
        asentamiento = '$asentamiento',
        cp = '$codigoPostal',
        correo = '$correo',
        telefono_part = '$telFijo',
        telefono_cel = '$celular',
        leer_escribir = $leer,
        escolaridad = '$escolaridad',
        nombre_escolaridad = '$escolaridad_nombre',
        nivel_concluido = '$concluida',
        estudia = '$estudia',
        estudia_donde = '$estudiaLugar',
        estudia_habilidad = '$habilidad',
        profesion = '$profesion',
        trabaja = '$trabaja',
        trabaja_donde = '$trabajaLugar',
        trabaja_ingresos = '$ingresoMensual',
        asoc_civ = '$asociacion',
        asoc_cual = '$nombreAC',
        pensionado = '$pension',
        pensionado_donde = '$pensionInst',
        pension_monto = '$pensionMonto',
        pension_temporalidad = '$pensionTemporalidad',
        informante = '$informanteLog',
        informante_parentesco = '$informanteRelacion',
        otro_parentesco = '$informanteRelacionOtro1',
        seguridad_social = '$seguridadsocial',
        seguridad_social_otro = '$otroSS',
        estatus = '$estatus',
        numSS = '$numSS',
        gpo_vulnerable = '$gruposFull'
        WHERE curp = '$curp'
    ";
    $resultado= $conn->query($sqlinsert);
}
else if ($numExp != '' || $numExp != null){
    $sqlinsert= "UPDATE datos_generales SET 
        numExpediente = '$numExp',
        fecha_actualizacion = '$fecha_registro',
        nombre = '$nombre',
        apellido_p = '$apellidoP',
        apellido_m = '$apellidoM',
        genero = '$genero',
        edad = '$edad',
        edo_civil = '$edoCivil',
        curp = '$curp',
        rfc = '$rfc',
        f_nacimiento = '$fechaNacimiento',
        lugar_nacimiento = '$lugarNacimiento',
        domicilio = '$domicilio',
        no_ext = '$numExt',
        no_int = '$numInt',
        colonia = '$colonia',
        entre_vialidades = '$entreVialidades',
        descr_referencias = '$descripcionLugar',
        estado = '$estado',
        municipio = '$municipio',
        localidad = '$localidad',
        asentamiento = '$asentamiento',
        cp = '$codigoPostal',
        correo = '$correo',
        telefono_part = '$telFijo',
        telefono_cel = '$celular',
        leer_escribir = $leer,
        escolaridad = '$escolaridad',
        nombre_escolaridad = '$escolaridad_nombre',
        nivel_concluido = '$concluida',
        estudia = '$estudia',
        estudia_donde = '$estudiaLugar',
        estudia_habilidad = '$habilidad',
        profesion = '$profesion',
        trabaja = '$trabaja',
        trabaja_donde = '$trabajaLugar',
        trabaja_ingresos = '$ingresoMensual',
        asoc_civ = '$asociacion',
        asoc_cual = '$nombreAC',
        pensionado = '$pension',
        pensionado_donde = '$pensionInst',
        pension_monto = '$pensionMonto',
        pension_temporalidad = '$pensionTemporalidad',
        informante = '$informanteLog',
        informante_parentesco = '$informanteRelacion',
        otro_parentesco = '$informanteRelacionOtro1',
        seguridad_social = '$seguridadsocial',
        seguridad_social_otro = '$otroSS',
        estatus = '$estatus',
        numSS = '$numSS',
        gpo_vulnerable = '$gruposFull'
    WHERE numExpediente = '$numExp'
    ";
    $resultado= $conn->query($sqlinsert);
}


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
        'success'=>1,
        'curp'=>$curp
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