<?php
include('../prcd/qc/qc.php');
include('../prcd/qc/qc2.php');

if(isset($_REQUEST)){
    $numeroID = $_REQUEST['id'];
}
else{
    echo "Agrega un número al REQUEST";
    exit;
}

$x = 0;

if($numeroID == 1){}

$db1 = "SELECT * FROM expedientes";
$resultadoDB1 = $conn2->query($db1);

while($rowDB = $resultadoDB1->fetch_assoc()){
    $id = $rowDB['id']; // con este se concatena para datos_generales

    $folio = $rowDB['folio'];
    $apellidoPaterno = $rowDB['apellidoPaterno'];
    $apellidoMaterno = $rowDB['apellidoMaterno'];
    $nombre = $rowDB['nombre'];
    $sexo = $rowDB['sexo']; //genero (Femenino,Masculino)
    $curp = $rowDB['curp']; 
    $rfc = $rowDB['rfc']; 
    $lugarNacimiento = $rowDB['lugarNacimiento']; 
    $fechaNacimiento = $rowDB['fechaNacimiento']; 
    $fechaIngreso = $rowDB['fechaIngreso']; //fecha registro al sistema 
    $numeroSeguro = $rowDB['numeroSeguro'];  //numSS
    $idEstatusExpediente = $rowDB['idEstatusExpediente']; //se va a agregar a la nueva db (creado, finado, baja)
    $idCatTipoSeguridad = $rowDB['idCatTipoSeguridad']; 

// segunda parte de detalle expedientes
    $direccion = $rowDB['direccion']; // se relaciona con idExpediente
    $numeroCasa = $rowDB['numeroCasa']; // se relaciona con idExpediente
    $numeroInterior = $rowDB['numeroInterior']; // se relaciona con idExpediente
    $colonia = $rowDB['colonia']; // se relaciona con idExpediente
    $cp = $rowDB['cp']; // se relaciona con idExpediente
    $celular = $rowDB['celular']; // se relaciona con idExpediente
    $numeroTelefo = $rowDB['numeroTelefo']; // se relaciona con idExpediente
    $correo = $rowDB['correo']; // se relaciona con idExpediente
    $referencia = $rowDB['referencia']; // se relaciona con idExpediente
    $habilidad = $rowDB['habilidad']; // se relaciona con idExpediente
    $entreVialidades = $rowDB['entreVialidades']; // se relaciona con idExpediente
    $idCatMunicipio = $rowDB['idCatMunicipio']; // se relaciona con idExpediente
    $idCatLocalidad = $rowDB['idCatLocalidad']; // se relaciona con idExpediente
    $idCatEstadoCivil = $rowDB['idCatEstadoCivil']; // se relaciona con idExpediente
    $idAsentamiento = $rowDB['idAsentamiento']; // se relaciona con idExpediente

// detalle escolaridades
    $numeroCasa = $rowDB['idCatEscolaridad']; // se relaciona con idExpediente
    $numeroCasa = $rowDB['idCatProfesion']; // se relaciona con idExpediente

// estudios socioeconómico
    $estudia = $rowDB['estudia']; // se relaciona con idExpediente
    $LgarEstudio = $rowDB['LgarEstudio']; // se relaciona con idExpediente
    $trabaja = $rowDB['trabaja']; // se relaciona con idExpediente
    $lugarTrabajo = $rowDB['lugarTrabajo']; // se relaciona con idExpediente
    $asociacion = $rowDB['asociacion']; // se relaciona con idExpediente
    $lugarAsociacion = $rowDB['lugarAsociacion']; // se relaciona con idExpediente
    $sindicato = $rowDB['sindicato']; // se relaciona con idExpediente
    $lugarSindicato = $rowDB['lugarSindicato']; // se relaciona con idExpediente
    $pensionado = $rowDB['pensionado']; // se relaciona con idExpediente
    $lugarPension = $rowDB['lugarPension']; // se relaciona con idExpediente
    $montoPension = $rowDB['montoPension']; // se relaciona con idExpediente

// ingresos
    $IngresoMensual = $rowDB['IngresoMensual']; // se relaciona con idEstudioSocioeconomico
    $personasDependen = $rowDB['personasDependen']; // se relaciona con idEstudioSocioeconomico
    $deudas = $rowDB['deudas']; // se relaciona con idEstudioSocioeconomico
    $montoDeuda = $rowDB['montoDeuda']; // se relaciona con idEstudioSocioeconomico

// ingresos
    $IngresoMensual = $rowDB['IngresoMensual']; // se relaciona con idExpediente
    $personasDependen = $rowDB['personasDependen']; // se relaciona con idExpediente
    $deudas = $rowDB['deudas']; // se relaciona con idExpediente
    $montoDeuda = $rowDB['montoDeuda']; // se relaciona con idExpediente

$sqlInsert = "INSERT INTO datos_generales VALUES(
    $folio,
    $apellidoPaterno,
    $apellidoMaterno,
    $sexo,
    $curp,
    $rfc,
    $lugarNacimiento,
    $fechaNacimiento,
    $fechaIngreso,
    $numeroSeguro,
    $idEstatusExpediente,
    $idCatTipoSeguridad,
)
INTO(
    numExpediente,
    apellido_p,
    apellido_m,
    nombre,
    genero,
    curp,
    rfc,
    lugar_nacimiento,
    f_nacimiento,
    fecha_registro,
    nss,
    estatus,
    seguridad_social,
    
)";

$resultadoSQL = $conn->query($sqlInsert);
if ($resultadoSQL){
    $x++;
}
} //FIN WHILE

// DATOS MÉDICOS de la anterior es datosmedicos
$db1 = "SELECT * FROM datosmedicos";
$resultadoDB1 = $conn2->query($db1);
while($rowDB = $resultadoDB1->fetch_assoc()){

$idDatosMedicos = $rowDB['id'];
// datosMedicos
$cirugia = $rowDB['cirugia']; // se relaciona con idExpediente
$tipoCirugia = $rowDB['tipoCirugia']; // se relaciona con idExpediente
$idTipoSangre = $rowDB['idTipoSangre']; // se relaciona con idExpediente
// discaoacidades
$grado = $rowDB['grado']; // se relaciona con idExpediente
$temporalidad = $rowDB['temporalidad']; // se relaciona con idExpediente
$valoracion = $rowDB['valoracion']; // se relaciona con idExpediente
$idCatCausa = $rowDB['idCatCausa']; // se relaciona con idExpediente
$idCatDiscapacidad = $rowDB['idCatDiscapacidad']; // se relaciona con idExpediente
$idCatInstitutcion = $rowDB['idCatInstitutcion']; // se relaciona con idExpediente
$protesis = $rowDB['protesis']; // se relaciona con idExpediente
$tipoProtesis = $rowDB['tipoProtesis']; // se relaciona con idExpediente
$gradoDiscapacidad = $rowDB['gradoDiscapacidad']; // se relaciona con idExpediente
// enfermedades
$idCatEnfermedad = $rowDB['idCatEnfermedad']; // se relaciona con idExpediente
// alergias
    $enfermedadesSQL = "SELECT * FROM enfermedadesn WHERE ";
$idCatAlergia = $rowDB['idCatAlergia']; // se relaciona con idExpediente
// medicamentos
$idCatMedicamento = $rowDB['idCatMedicamento']; // se relaciona con idExpediente

$sqlInsert = "INSERT INTO datos_medicos VALUES(
    $cirugia,
    $tipoCirugia,
    $idTipoSangre,
    $grado,
    $temporalidad,
    $valoracion,
    $idCatCausa,
    $idCatDiscapacidad,
    $idCatInstitutcion,
    $protesis,
    $tipoProtesis,
    $gradoDiscapacidad,
    $idCatEnfermedad,
    $idCatAlergia,
    $idCatMedicamento
)
INTO(
    cirugias,
    tipo_cirugias,
    tipo_sangre,
    grado,
    temporalidad,
    valoracion,
    causa,
    discapacidad,
    valoracion,
    protesis,
    protesis_tipo,
    descripcionDiscapacidad,
    enfermedades,
    
)";

} // fin while datos médicos
// INTEGRACIÓN FAMILIAR
// familiares
$nombreFamilia = $rowDB['nombreFamilia']; // se relaciona con idExpediente
$edadFamilia = $rowDB['edadFamilia']; // se relaciona con idExpediente
$ingresoMensual = $rowDB['ingresoMensual']; // se relaciona con idExpediente
$idCatParentesco = $rowDB['idCatParentesco']; // se relaciona con idExpediente
$idCatEscolaridad = $rowDB['idCatEscolaridad']; // se relaciona con idExpediente
$idCatProfesion = $rowDB['idCatProfesion']; // se relaciona con idExpediente
$idCatDiscapacidad = $rowDB['idCatDiscapacidad']; // se relaciona con idExpediente

// REFERENCIAS PERSONALES
$nombreReferencia = $rowDB['nombreReferencia']; // se relaciona con idExpediente
$direccionReferencia = $rowDB['direccionReferencia']; // se relaciona con idExpediente
$telefonoReferencia = $rowDB['telefonoReferencia']; // se relaciona con idExpediente
$celularReferencia = $rowDB['celularReferencia']; // se relaciona con idExpediente
$celularReferencia = $rowDB['idCatProfesion']; // se relaciona con idExpediente
$celularReferencia = $rowDB['idCatParentesco']; // se relaciona con idExpediente



// detalle expedientes

$db1 = "SELECT * FROM detalle_expedientes";
$resultadoDB1 = $conn2->query($db1);

while($rowDB = $resultadoDB1->fetch_assoc()){
    $rowDB['folio'];
    $rowDB['apellidoPaterno'];
    $rowDB['apellidoMaterno'];
    $rowDB['sexo']; //genero (Femenino,Masculino)
    $rowDB['curp']; 
    $rowDB['rfc']; 
    $rowDB['lugarNacimiento']; 
    $rowDB['fechaNacimiento']; 
    $rowDB['fechaIngreso']; //fecha registro al sistema 
    $rowDB['numeroSeguro'];  //numSS
    $rowDB['idEstatusExpediente']; //se va a agregar a la nueva db (creado, finado, baja)
    $rowDB['idCatTipoSeguridad']; 



$sqlInsert = "INSERT INTO datos_generales Values";


// INNER JOIN con datos_medicos, aleggias, efenrmedades, medicamentos, discapacidades

// VIVIENDA

// FOTOS se ligan con el idExpediente mantener el idExpediente 
// script_fotos.php

}





?>