<?php
include('../prcd/qc/qc.php');
include('../prcd/qc/qc2.php');

/* if(isset($_REQUEST)){
    
}
else{
    echo "Agrega un número al REQUEST";
    exit;
} */
$numeroID = $_REQUEST['id'];
$x = 0;

if($numeroID == 1){

$db1 = "SELECT * FROM expedientes ORDER BY ordenExpediente ASC LIMIT 1, 50000";
$resultadoDB1 = $conn2->query($db1);

while($rowDB = $resultadoDB1->fetch_assoc()){
    $id = $rowDB['id']; // con este se concatena para datos_generales
    $ordenExpediente = $rowDB['ordenExpediente'];
    $folio = $rowDB['folio'];
    $fechaIngreso = $rowDB['fechaIngreso']; //fecha registro al sistema 
    $nombre = $rowDB['nombre'];
    $apellidoPaterno = $rowDB['apellidoPaterno'];
    $apellidoMaterno = $rowDB['apellidoMaterno'];
    $sexo = $rowDB['sexo']; //genero Femenino,Masculino
    
    
    $fechaNacimiento = $rowDB['fechaNacimiento']; 
    $lugarNacimiento = $rowDB['lugarNacimiento']; 
    $curp = $rowDB['curp']; 
    $rfc = $rowDB['rfc']; 
    
    $idCatTipoSeguridad = $rowDB['idCatTipoSeguridad']; 
    
    $dbCatSeguridadSocial = "SELECT * FROM cattiposeguridad WHERE id = '$idCatTipoSeguridad'";
    $resultadodbCatSeguridadSocial = $conn2->query($dbCatSeguridadSocial);
    
    if ($rowdbCatSeguridadSocial = $resultadodbCatSeguridadSocial->fetch_assoc()){
        $seguridadSocial = $rowdbCatSeguridadSocial['nombreSeguridad'];
    }
    else{
        $seguridadSocial= "";
    }
    
    $numeroSeguro = $rowDB['numeroSeguro'];  //numSS
    
    $idEstatusExpediente = $rowDB['idEstatusExpediente']; //se va a agregar a la nueva db creado, finado, baja
    
    $dbCatEstatus = "SELECT * FROM estatusexpedientes WHERE id = '$idEstatusExpediente'";
    $resultadodbCatEstatus = $conn2->query($dbCatEstatus);
    
    if ($rowdbCatEstatus = $resultadodbCatEstatus-> fetch_assoc()){
        $estatusExp = $rowdbCatEstatus['estatusExpediente'];
    } else {
        $estatusExp = '';
    }
    
    $db2 = "SELECT * FROM detalleexpedientes WHERE idExpediente = '$id'";
    $resultadoDB2 = $conn2->query($db2);
    $rowDB2 = $resultadoDB2->fetch_assoc();
    
    
    $idCatEstadoCivil = $rowDB2['idCatEstadoCivil']; // se relaciona con idExpediente
    
    $dbEstadoCivil = "SELECT * FROM catestadociviles WHERE claveEstadoCivil = '$idCatEstadoCivil'";
    $resultadodbEstadoCivil = $conn2->query($dbEstadoCivil);
    
    if ($rowdbEstadoCivil = $resultadodbEstadoCivil->fetch_assoc()){
        $estadocivil = $rowdbEstadoCivil['nombreEstadoCivil'];
    }
    else {
        $estadocivil = "";
    }

    // detalle expedientes
    $direccion = $rowDB2['direccion']; // se relaciona con idExpediente
    $numeroCasa = $rowDB2['numeroCasa']; // se relaciona con idExpediente
    $numeroInterior = $rowDB2['numeroInterior']; // se relaciona con idExpediente
    $colonia = $rowDB2['colonia']; // se relaciona con idExpediente
    $cp = $rowDB2['cp']; // se relaciona con idExpediente
    $numeroTelefono = $rowDB2['numeroTelefono']; // se relaciona con idExpediente
    $celular = $rowDB2['celular']; // se relaciona con idExpediente
    $correo = $rowDB2['correo']; // se relaciona con idExpediente
    $referencia = $rowDB2['referencia']; // se relaciona con idExpediente
    $habilidad = $rowDB2['habilidad']; // se relaciona con idExpediente
    $entreVialidades = ""; // se relaciona con idExpediente
    $estado = 32;
    $idCatMunicipio = $rowDB2['idCatMunicipio']; // se relaciona con idExpediente

    $dbMunicipio = "SELECT * FROM catmunicipios WHERE id = '$idCatMunicipio'";
    $resultadodbMunicipio = $conn2->query($dbMunicipio);

    if ($rowdbMunicipio = $resultadodbMunicipio->fetch_assoc()){
        $claveMunicipio = $rowdbMunicipio['claveMunicipio'];
    } else {
        $claveMunicipio = "";
    }
    
    $idCatLocalidad = $rowDB2['idCatLocalidad']; // se relaciona con idExpediente
    
    $dbLocalidad = "SELECT * FROM catlocalidades WHERE id = '$idCatLocalidad'";
    $resultadoDBLocalidad = $conn2->query($dbLocalidad);

    if ($rowdbLocalidad = $resultadoDBLocalidad->fetch_assoc()){
        $localidad = $rowdbLocalidad['nombreLocalidad'];
    }
    else{
        $localidad = "";
    }
    
    $idAsentamiento = $rowDB2['idAsentamiento']; // se relaciona con idExpediente

    if ($idAsentamiento == Null || $idAsentamiento == 0){

        $idAsentamiento = 0;
        $asentamiento = 0;

    } else {
        $dbAsentamiento = "SELECT * FROM asentamientos WHERE id = '$idAsentamiento'";
        $resultadoAsentamiento = $conn2->query($dbAsentamiento);

        if ($rowdbAsentamiento = $resultadoAsentamiento->fetch_assoc()){
            $asentamiento = $rowdbAsentamiento['nombreAsentamiento'];
            $cveAsentamiento = $rowdbAsentamiento['claveAsentamiento'];
        }
        else{
            $asentamiento = "";
            $cveAsentamiento = "";
        }
    }
    //$idCatEscolaridad = $rowDB2['idCatEscolaridad']; // se relaciona con idExpediente

    $dbCatEscolaridad = "SELECT * FROM detalleescolaridades WHERE idExpediente = '$id'";
    $resultadodbCatEscolaridad = $conn2->query($dbCatEscolaridad);

    $profesion= "";
    $escolaridad= "";

    if ($rowDBCatEscolaridad = $resultadodbCatEscolaridad->fetch_assoc()){
        $idescolaridad = $rowDBCatEscolaridad['idCatEscolaridad'];

        $dbEscolaridad = "SELECT * FROM catescolaridades WHERE id = '$idescolaridad'";
        $resultadoEscolaridad = $conn2->query($dbEscolaridad);
        if ($rowEscolaridad = $resultadoEscolaridad->fetch_assoc()){
            $escolaridad = $rowEscolaridad['nombreEscolaridad'];
        }
        else {
            $escolaridad = "";
        }

        $idProfesion = $rowDBCatEscolaridad['idCatProfesion']; // se relaciona con idExpediente
        
        if ($idProfesion == null || $idProfesion == 0){
            $profesion = "";
        }
        else {
            $dbProfesion = "SELECT * FROM catprofesiones WHERE id = '$idProfesion'";
            $resultadoProfesion = $conn2->query($dbProfesion);
            if ($rowProfesion = $resultadoProfesion->fetch_assoc()){
                $profesion = $rowProfesion['nombreProfesion'];
            }
            else {
                $profesion = "";
            }
        }
    }

    $dbTabEstudioSE = "SELECT * FROM estudiosocioeconomicos WHERE idExpediente = '$id'";
    $resultadoEstudioSE = $conn2->query($dbTabEstudioSE);
    
    if ($rowdbEstudioSE = $resultadoEstudioSE->fetch_assoc()){
    // estudiossocioeconómico
        $estudia = $rowdbEstudioSE['estudia']; // se relaciona con idExpediente
        $lgarEstudio = $rowdbEstudioSE['lgarEstudio']; // se relaciona con idExpediente
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
    }
    else {
        $estudia = ""; // se relaciona con idExpediente
        $lgarEstudio = ""; // se relaciona con idExpediente
        $trabaja = ""; // se relaciona con idExpediente
        $lugarTrabajo = ""; // se relaciona con idExpediente
        $asociacion = ""; // se relaciona con idExpediente
        $lugarAsociacion = ""; // se relaciona con idExpediente
        $sindicato = ""; // se relaciona con idExpediente
        $lugarSindicato = ""; // se relaciona con idExpediente
        $pensionado = ""; // se relaciona con idExpediente
        $lugarPension = ""; // se relaciona con idExpediente
        $montoPension = ""; // se relaciona con idExpediente
        $idEstudioSocioEconomico = "";
    }

    $dbTabIngresos = "SELECT * FROM ingresos WHERE idEstudioSocioeconomico = '$idEstudioSocioEconomico'";
    $resultadoTabIngresos = $conn2->query($dbTabIngresos);

    if ($rowTabIngresos = $resultadoTabIngresos->fetch_assoc()){
        $IngresoMensual = $rowTabIngresos['IngresoMensual']; // se relaciona con idEstudioSocioeconomico
        $personasDependen = $rowTabIngresos['pesonasDependen']; // se relaciona con idEstudioSocioeconomico
        $deudas = $rowTabIngresos['deudas']; // se relaciona con idEstudioSocioeconomico
        $montoDeuda = $rowTabIngresos['montoDeuda']; // se relaciona con idEstudioSocioeconomico
    }
    else{
        $IngresoMensual = ""; // se relaciona con idEstudioSocioeconomico
        $personasDependen = ""; // se relaciona con idEstudioSocioeconomico
        $deudas = ""; // se relaciona con idEstudioSocioeconomico
        $montoDeuda = ""; // se relaciona con idEstudioSocioeconomico

    }


    $sqlInsert = "INSERT INTO datos_generales (
        numExpediente,
        fecha_registro,
        nombre,
        apellido_p,
        apellido_m,
        genero,
        edo_civil,
        f_nacimiento,
        lugar_nacimiento,
        domicilio,
        no_int,
        no_ext,
        colonia,
        entre_vialidades,
        descr_referencias,
        estado,
        municipio,
        localidad,
        asentamiento,
        cp,
        telefono_part,
        correo,
        telefono_cel,
        escolaridad,
        profesion,
        curp,
        rfc,
        estudia,
        estudia_donde,
        estudia_habilidad,
        trabaja,
        trabaja_donde,
        trabaja_ingresos,
        asoc_civ,
        asoc_cual,
        pensionado,
        pensionado_donde,
        pension_monto,
        seguridad_social,
        numSS,
        estatus
    )
    VALUES (
        '$folio',
        '$fechaIngreso',
        '$nombre',
        '$apellidoPaterno',
        '$apellidoMaterno',
        '$sexo',
        '$estadocivil',
        '$fechaNacimiento',
        '$lugarNacimiento',
        '$direccion',
        '$numeroInterior',
        '$numeroCasa',
        '$colonia',
        '$entreVialidades',
        '$referencia',
        '$estado',
        '$claveMunicipio',
        '$localidad',
        '$asentamiento',
        '$cp',
        '$numeroTelefono',
        '$correo',
        '$celular',
        '$escolaridad',
        '$profesion',
        '$curp',
        '$rfc',
        '$estudia',
        '$lgarEstudio',
        '$habilidad',
        '$trabaja',
        '$lugarTrabajo',
        '$IngresoMensual',
        '$asociacion',
        '$lugarAsociacion',
        '$pensionado',
        '$lugarPension',
        '$montoPension',
        '$seguridadSocial',
        '$numeroSeguro',
        '$estatusExp'
    )
    ";

    $resultadoSQL = $conn->query($sqlInsert);
    if ($resultadoSQL){
        $x++;
        echo "registros completos: ". $x;
    }
    else{
        $error = $conn2->error;
        $error1 = $conn->error;

        echo $error;
        echo $error1;
    }
    


// DATOS MÉDICOS de la anterior es datosmedicos
$db3 = "SELECT * FROM datosmedicos WHERE idExpediente = '$id'";
$resultadoDB3 = $conn2->query($db3);
while($rowDB3 = $resultadoDB3->fetch_assoc()){

    // datosMedicos
$idDatosMedicos = $rowDB3['id'];
$cirugia = $rowDB3['cirugia']; // se relaciona con idExpediente
$tipoCirugia = $rowDB3['tipoCirugia']; // se relaciona con idExpediente
$idTipoSangre = $rowDB3['idTipoSangre']; // se relaciona con idExpediente

$sqlInsertDMedicos = "INSERT INTO datos_medicos VALUES(
    $curp
    $cirugia,
    $tipoCirugia,
    $idTipoSangre
)
INTO(
    curp,
    cirugias,
    tipo_cirugias,
    tipo_sangre
)";
$resultadoDatosMedicos = $conn->query($sqlInsertDMedicos);
if($resultadoDatosMedicos){
    echo "Datos medicos correcto update";
}
else{
    $error2 = $conn2->error;
    echo $error2;
}

}

// discapacidades
$db4 = "SELECT * FROM discapacidades WHERE idExpediente = '$id'";
$resultadoDB4 = $conn2->query($db4);
while($rowDB4 = $resultadoDB4->fetch_assoc()){
$grado = $rowDB4['grado']; // se relaciona con idExpediente
$temporalidad = $rowDB4['temporalidad']; // se relaciona con idExpediente
$valoracion = $rowDB4['valoracion']; // se relaciona con idExpediente
$idCatCausa = $rowDB4['idCatCausa']; // se relaciona con idExpediente
$idCatDiscapacidad = $rowDB4['idCatDiscapacidad']; // se relaciona con idExpediente
$idCatInstitucion = $rowDB4['idCatInstitucion']; // se relaciona con idExpediente
$protesis = $rowDB4['protesis']; // se relaciona con idExpediente
$tipoProtesis = $rowDB4['tipoProtesis']; // se relaciona con idExpediente
$gradoDiscapacidad = $rowDB4['gradoDiscapacidad']; // se relaciona con idExpediente

$sqlInsertDDisc = "INSERT INTO datos_discapacidades VALUES(
    $grado,
    $temporalidad,
    $valoracion,
    $idCatCausa,
    $idCatDiscapacidad,
    $idCatInstitucion,
    $protesis,
    $tipoProtesis,
    $gradoDiscapacidad
)
INTO(
    grado_discapacidad,
    temporalidad,
    valoracion,
    idCatCausa,
    idCatDiscapacidad,
    idCatInstitutcion,
    protesis,
    protesis_tipo,
    descripcionDiscapacidad
    
)";
$resultadoDDisc = $conn->query($sqlInsertDDisc);
if($resultadoDDisc){
    echo "Datos discapacidades correcto update";
}
else{
    $error3 = $conn2->error;
    echo $error3;
}

}

// enfermedades
//$idCatEnfermedad = $rowDB4['idCatEnfermedad']; // se relaciona con idExpediente

// alergias
    //$enfermedadesSQL = "SELECT * FROM enfermedadesn WHERE ";
//$idCatAlergia = $rowDB4['idCatAlergia']; // se relaciona con idExpediente

// medicamentos
//$idCatMedicamento = $rowDB4['idCatMedicamento']; // se relaciona con idExpediente


//datos pueba

// $sqlInsertDMedicos = "INSERT INTO datos_medicos VALUES(
//     $curp
//     $cirugia,
//     $tipoCirugia,
//     $idTipoSangre,
//     $grado,
//     $temporalidad,
//     $valoracion,
//     $idCatCausa,
//     $idCatDiscapacidad,
//     $idCatInstitutcion,
//     $protesis,
//     $tipoProtesis,
//     $gradoDiscapacidad,
//     $idCatEnfermedad,
//     $idCatAlergia,
//     $idCatMedicamento
// )
// INTO(
//     curp,
//     cirugias,
//     tipo_cirugias,
//     tipo_sangre,
//     grado_discapacidad,
//     temporalidad,
//     valoracion,
//     causa,
//     discapacidad,
//     valoracion,
//     protesis,
//     protesis_tipo,
//     descripcionDiscapacidad,
//     enfermedades
    
// )";
// $resultadoDatosMedicos = $conn->query($sqlInsertDMedicos);
// if($resultadoDatosMedicos){
//     echo "Datos medicos correcto update";
// }

} //FIN WHILE
} // fin id request

//} // fin while datos médicos
// INTEGRACIÓN FAMILIAR
// familiares

// $nombreFamilia = $rowDB['nombreFamilia']; // se relaciona con idExpediente
// $edadFamilia = $rowDB['edadFamilia']; // se relaciona con idExpediente
// $ingresoMensual = $rowDB['ingresoMensual']; // se relaciona con idExpediente
// $idCatParentesco = $rowDB['idCatParentesco']; // se relaciona con idExpediente
// $idCatEscolaridad = $rowDB['idCatEscolaridad']; // se relaciona con idExpediente
// $idCatProfesion = $rowDB['idCatProfesion']; // se relaciona con idExpediente
// $idCatDiscapacidad = $rowDB['idCatDiscapacidad']; // se relaciona con idExpediente

// REFERENCIAS PERSONALES
// $nombreReferencia = $rowDB['nombreReferencia']; // se relaciona con idExpediente
// $direccionReferencia = $rowDB['direccionReferencia']; // se relaciona con idExpediente
// $telefonoReferencia = $rowDB['telefonoReferencia']; // se relaciona con idExpediente
// $celularReferencia = $rowDB['celularReferencia']; // se relaciona con idExpediente
// $celularReferencia = $rowDB['idCatProfesion']; // se relaciona con idExpediente
// $celularReferencia = $rowDB['idCatParentesco']; // se relaciona con idExpediente



// detalle expedientes

// $db1 = "SELECT * FROM detalle_expedientes WHERE idExpediente = '$ordenExpediente'";
// $resultadoDB1 = $conn2->query($db1);

// while($rowDB = $resultadoDB1->fetch_assoc()){
//     $folioDetalles = $rowDB['folio'];
//     $aPaternoDetalles = $rowDB['apellidoPaterno'];
//     $aMaternoDetalles = $rowDB['apellidoMaterno'];
//     $sexoDetalles= $rowDB['sexo']; //genero (Femenino,Masculino)
//     $curpDetalles = $rowDB['curp']; 
//     $rfcDetalles = $rowDB['rfc']; 
//     $lugarNacimientoDetalles = $rowDB['lugarNacimiento']; 
//     $fechaNacimientoDetalles = $rowDB['fechaNacimiento']; 
//     $fechaIngresoDetalles = $rowDB['fechaIngreso']; //fecha registro al sistema 
//     $numeroSeguroDetalles = $rowDB['numeroSeguro'];  //numSS
//     $idEstatusExpedienteDetalles = $rowDB['idEstatusExpediente']; //se va a agregar a la nueva db (creado, finado, baja)
//     $idCatTipoSeguridad = $rowDB['idCatTipoSeguridad']; 

// $sqlInsert = "UPDATE INTO datos_generales VALUES(
//     curp,

//     ";


// INNER JOIN con datos_medicos, aleggias, efenrmedades, medicamentos, discapacidades

// VIVIENDA

// FOTOS se ligan con el idExpediente mantener el idExpediente 
// script_fotos.php

//} // DETALLE EXPEDIENTE





?>