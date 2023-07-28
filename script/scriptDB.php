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
    $fechaIngreso = $rowDB['fechaIngreso']; //fecha registro al sistema 
    $nombre = $rowDB['nombre'];
    $apellidoPaterno = $rowDB['apellidoPaterno'];
    $apellidoMaterno = $rowDB['apellidoMaterno'];
    $sexo = $rowDB['sexo']; //genero (Femenino,Masculino)
    
    $idCatEstadoCivil = $rowDB['idCatEstadoCivil']; // se relaciona con idExpediente

    $dbEstadoCivil = "SELECT * FROM catestadociviles WHERE id = $idCatEstadoCivil";
    $resultadodbEstadoCivil = $conn2->query($dbEstadoCivil);

    if ($rowdbEstadoCivil = $resultadodbEstadoCivil->fetch_assoc()){
        $estadocivil = $rowdbEstadoCivil['nombreEstadoCivil'];
    }

    $fechaNacimiento = $rowDB['fechaNacimiento']; 
    $lugarNacimiento = $rowDB['lugarNacimiento']; 
    $curp = $rowDB['curp']; 
    $rfc = $rowDB['rfc']; 

    $idCatTipoSeguridad = $rowDB['idCatTipoSeguridad']; 

    $dbCatSeguridadSocial = "SELECT * FROM cattiposeguridad WHERE id = $idCatTipoSeguridad";
    $resultadodbCatSeguridadSocial = $conn2->query($dbCatSeguridadSocial);

    if ($rowdbCatSeguridadSocial = $resultadodbCatSeguridadSocial->fetch_assoc()){
        $seguridadSocial = $rowdbCatSeguridadSocial['nombreSeguridad'];
    }

    $numeroSeguro = $rowDB['numeroSeguro'];  //numSS

    $idEstatusExpediente = $rowDB['idEstatusExpediente']; //se va a agregar a la nueva db (creado, finado, baja)

    $dbCatEstatus = "SELECT * FROM estatusexpedientes WHERE id = $idEstatusExpediente";
    $resultadodbCatEstatus = $conn2->query($dbCatEstatus);

    if ($rowdbCatEstatus = $resultadodbCatEstatus-> fetch_assoc()){
        $estatusExp = $rowdbCatEstatus['estatusExpediente'];
    } else {
        $estatusExp = '';
    }

    $db2 = "SELECT * FROM detalleexpedientes WHERE idExpediente = $id";
    $resultadoDB2 = $conn2->query($db2);
    $rowDB2 = $resultadoDB2->fetch_assoc();

    
// detalle expedientes
    $direccion = $rowDB2['direccion']; // se relaciona con idExpediente
    $numeroCasa = $rowDB2['numeroCasa']; // se relaciona con idExpediente
    $numeroInterior = $rowDB2['numeroInterior']; // se relaciona con idExpediente
    $colonia = $rowDB2['colonia']; // se relaciona con idExpediente
    $cp = $rowDB2['cp']; // se relaciona con idExpediente
    $celular = $rowDB2['celular']; // se relaciona con idExpediente
    $numeroTelefo = $rowDB2['numeroTelefo']; // se relaciona con idExpediente
    $correo = $rowDB2['correo']; // se relaciona con idExpediente
    $referencia = $rowDB2['referencia']; // se relaciona con idExpediente
    $habilidad = $rowDB2['habilidad']; // se relaciona con idExpediente
    $entreVialidades = $rowDB2['entreVialidades']; // se relaciona con idExpediente

    $idCatMunicipio = $rowDB2['idCatMunicipio']; // se relaciona con idExpediente

    $dbMunicipio = "SELECT * FROM catmunicipios WHERE id = $idCatMunicipio";
    $resultadodbMunicipio = $conn2->query($dbMunicipio);

    if ($rowdbMunicipio = $resultadodbMunicipio->fetch_assoc()){
        $claveMunicipio = $rowdbMunicipio['claveMunicipio'];
    } else {
        $claveMunicipio = "";
    }
    
    $idCatLocalidad = $rowDB2['idCatLocalidad']; // se relaciona con idExpediente
    
    $dbLocalidad = "SELECT * FROM catlocalidades WHERE id = $idCatLocalidad";
    $resultadoDBLocalidad = $conn2->query($dbLocalidad);

    if ($rowdbLocalidad = $resultadoDBLocalidad->fetch_assoc()){
        $localidad = $rowdbLocalidad['nombreLocalidad'];
    }
    
    $idAsentamiento = $rowDB2['idAsentamiento']; // se relaciona con idExpediente

    $dbAsentamiento = "SELECT * FROM asentamiento WHERE id = $idAsentamiento";
    $resultadoDBAsentamiento = $conn2->query($dbAsentamiento);

    if ($rowdbAsentamiento = $resultadoDBAsentamiento){
        $asentamiento = $rowdbAsentamiento['nombreAsentamiento'];
        $cveAsentamiento = $rowdbAsentamiento['claveAsentamiento'];
    }

    $idCatEscolaridad = $rowDB['idCatEscolaridad']; // se relaciona con idExpediente

    $dbCatEscolaridad = "SELECT * FROM detalleescolaridades WHERE idExpediente = $id";
    $resultadodbCatEscolaridad = $conn2->query($dbCatEscolaridad);

    if ($rowDBCatEscolaridad = $resultadodbCatEscolaridad->fetch_assoc()){
        $idescolaridad = $rowDBEscolaridad['idCatEscolaridad'];

        $dbEscolaridad = "SELECT * FROM catescolraridades WHERE id = $idescolaridad";
        $resultadoEscolaridad = $conn2->query($dbEscolaridad);
        if ($rowEscolaridad = $resultadoEscolaridad->fetch_assoc()){
            $escolaridad = $rowEscolaridad['nombreEscolaridad'];
        }
        else {
            $escolaridad = "";
        }

        $idProfesion = $rowDBEscolaridad['idCatProfesion']; // se relaciona con idExpediente
        
        $dbProfesion = "SELECT * FROM catprofesiones WHERE id = $idProfesion";
        $resultadoProfesion = $conn2->query($dbProfesion);
        if ($rowProfesion = $resultadoProfesion->fetch_assoc()){
            $profesion = $rowProfesion['nombreProfesion'];
        }
        else {
            $profesion = "";
        }
    }

    $dbTabEstudioSE = "SELECT * FROM estudiosocioeconomico WHERE idExpediente = $id";
    $resultadoEstudioSE = $conn2->query($dbTabEstudioSE);
    $rowdbEstudioSE = $resultadoEstudioSE->fetch_assoc();
// estudiossocioeconómico
    $estudia = $rowdbEstudioSE['estudia']; // se relaciona con idExpediente
    $LgarEstudio = $rowdbEstudioSE['LgarEstudio']; // se relaciona con idExpediente
    $trabaja = $rowdbEstudioSE['trabaja']; // se relaciona con idExpediente
    $lugarTrabajo = $rowdbEstudioSE['lugarTrabajo']; // se relaciona con idExpediente
    $asociacion = $rowdbEstudioSE['asociacion']; // se relaciona con idExpediente
    $lugarAsociacion = $rowdbEstudioSE['lugarAsociacion']; // se relaciona con idExpediente
    $sindicato = $rowdbEstudioSE['sindicato']; // se relaciona con idExpediente
    $lugarSindicato = $rowdbEstudioSE['lugarSindicato']; // se relaciona con idExpediente
    $pensionado = $rowdbEstudioSE['pensionado']; // se relaciona con idExpediente
    $lugarPension = $rowdbEstudioSE['lugarPension']; // se relaciona con idExpediente
    $montoPension = $rowdbEstudioSE['montoPension']; // se relaciona con idExpediente
    $idEstudioSocioEconomico = $rowdbEstudioSE['id'];

    $dbTabIngresos = "SELECT * FROM ingresos WHERE idEstudioSocieoconomico = $idEstudioSocioEconomico";
    $resultadoTabIngresos = $conn2->query($dbTabIngresos);
    $rowTabIngresos = $resultadoTabIngresos->fetch_assoc();
// ingresos
    $IngresoMensual = $rowrowTabIngresosDB['IngresoMensual']; // se relaciona con idEstudioSocioeconomico
    $personasDependen = $rowTabIngresos['personasDependen']; // se relaciona con idEstudioSocioeconomico
    $deudas = $rowTabIngresos['deudas']; // se relaciona con idEstudioSocioeconomico
    $montoDeuda = $rowTabIngresos['montoDeuda']; // se relaciona con idEstudioSocioeconomico

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