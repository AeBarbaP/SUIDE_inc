<?php
include('../prcd/qc/qc.php');
include('../prcd/qc/qc2.php');

$numeroID = $_REQUEST['id'];
$x = 0;

if($numeroID == 1){

$db1 = "SELECT * FROM Expedientes ORDER BY ordenExpediente ASC LIMIT 1, 50000";
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
    
    $dbCatSeguridadSocial = "SELECT * FROM CatTipoSeguridad WHERE id = '$idCatTipoSeguridad'";
    $resultadodbCatSeguridadSocial = $conn2->query($dbCatSeguridadSocial);

    // fotos
    $fotos = "SELECT * FROM empleadocredenciales WHERE idExpediente = '$id'";
    $resultadoFotos = $conn2-> query($fotos);
    $filas = $resultadoFotos->num_rows;

    if($filas > 0){
        $rowFotos= $resultadoFotos -> fetch_assoc();

        $file = ($rowFotos['fotografia']);
        $fichero="../fotos_expedientes/".$curp."_".$folio.".jpg";
        $foto = $curp."_".$folio.".jpg";
        file_put_contents($fichero, $file);
        // echo $file;
    }
    else{
        $foto = "";
    }
    
    if ($rowdbCatSeguridadSocial = $resultadodbCatSeguridadSocial->fetch_assoc()){
        $seguridadSocial = $rowdbCatSeguridadSocial['nombreSeguridad'];
    }
    else{
        $seguridadSocial= "";
    }
    
    $numeroSeguro = $rowDB['numeroSeguro'];  //numSS
    
    $idEstatusExpediente = $rowDB['idEstatusExpediente']; //se va a agregar a la nueva db creado, finado, baja
    
    $dbCatEstatus = "SELECT * FROM EstatusExpedientes WHERE id = '$idEstatusExpediente'";
    $resultadodbCatEstatus = $conn2->query($dbCatEstatus);
    
    if ($rowdbCatEstatus = $resultadodbCatEstatus-> fetch_assoc()){
        $estatusExp = $rowdbCatEstatus['estatusExpediente'];
    } else {
        $estatusExp = '';
    }
    
    $db2 = "SELECT * FROM DetalleExpedientes WHERE idExpediente = '$id'";
    $resultadoDB2 = $conn2->query($db2);
    $rowDB2 = $resultadoDB2->fetch_assoc();
    
    
    $idCatEstadoCivil = $rowDB2['idCatEstadoCivil']; // se relaciona con idExpediente
    
    $dbEstadoCivil = "SELECT * FROM CatEstadoCiviles WHERE claveEstadoCivil = '$idCatEstadoCivil'";
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
    // $referencia = $rowDB2['referencia']; // se relaciona con idExpediente
    $habilidad = $rowDB2['habilidad']; // se relaciona con idExpediente
    $entreVialidades = ""; // se relaciona con idExpediente
    $estado = 32;
    $idCatMunicipio = $rowDB2['idCatMunicipio']; // se relaciona con idExpediente

    $dbMunicipio = "SELECT * FROM CatMunicipios WHERE id = '$idCatMunicipio'";
    $resultadodbMunicipio = $conn2->query($dbMunicipio);

    if ($rowdbMunicipio = $resultadodbMunicipio->fetch_assoc()){
        $claveMunicipio = $rowdbMunicipio['claveMunicipio'];
    } else {
        $claveMunicipio = "";
    }
    
    $idCatLocalidad = $rowDB2['idCatLocalidad']; // se relaciona con idExpediente
    
    $dbLocalidad = "SELECT * FROM CatLocalidades WHERE id = '$idCatLocalidad'";
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
        $dbAsentamiento = "SELECT * FROM Asentamientos WHERE id = '$idAsentamiento'";
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

    $dbCatEscolaridad = "SELECT * FROM DetalleEscolaridades WHERE idExpediente = '$id'";
    $resultadodbCatEscolaridad = $conn2->query($dbCatEscolaridad);

    $profesion= "";
    $escolaridad= "";

    if ($rowDBCatEscolaridad = $resultadodbCatEscolaridad->fetch_assoc()){
        $idescolaridad = $rowDBCatEscolaridad['idCatEscolaridad'];

        $dbEscolaridad = "SELECT * FROM CatEscolaridades WHERE id = '$idescolaridad'";
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
            $dbProfesion = "SELECT * FROM CatProfesiones WHERE id = '$idProfesion'";
            $resultadoProfesion = $conn2->query($dbProfesion);
            if ($rowProfesion = $resultadoProfesion->fetch_assoc()){
                $profesion = $rowProfesion['nombreProfesion'];
            }
            else {
                $profesion = "";
            }
        }
    }

    $dbTabEstudioSE = "SELECT * FROM EstudioSocioeconomicos WHERE idExpediente = '$id'";
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

    $dbTabIngresos = "SELECT * FROM Ingresos WHERE idEstudioSocioeconomico = '$idEstudioSocioEconomico'";
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

    // DATOS MÉDICOS de la anterior es datosmedicos
$db3 = "SELECT * FROM DatosMedicos WHERE idExpediente = '$id'";
$resultadoDB3 = $conn2->query($db3);
while($rowDB3 = $resultadoDB3->fetch_assoc()){

    //datosMedicos
        $idDatosMedicos = $rowDB3['id'];
        $cirugia = $rowDB3['cirugia']; // se relaciona con idExpediente
        $tipoCirugia = $rowDB3['tipoCirugia']; // se relaciona con idExpediente
        $idTipoSangre = $rowDB3['idTipoSangre']; // se relaciona con idExpediente

}

// discapacidades
$db4 = "SELECT * FROM Discapacidades WHERE idExpediente = '$id'";
$resultadoDB4 = $conn2->query($db4);

while($rowDB4 = $resultadoDB4->fetch_assoc()){

    $grado = $rowDB4['grado']; // se relaciona con idExpediente
    $temporalidad = $rowDB4['temporalidad']; // se relaciona con idExpediente
    $valoracion = $rowDB4['valoracion']; // se relaciona con idExpediente
    $idCatCausa = $rowDB4['idCatCausa']; // se relaciona con idExpediente

    $SQLCausa ="SELECT * FROM CatCausas WHERE id = '$idCatCausa'";
    $resultCausa = $conn2->query($SQLCausa);
    $rowCausa = $resultCausa->fetch_assoc();
    $causa = $rowCausa['nombreCausa'];

    $idCatDiscapacidad = $rowDB4['idCatDiscapacidad']; // se relaciona con idExpediente

    $sqlCatDiscapacidades ="SELECT * FROM CatDiscapacidades WHERE id = '$idCatDiscapacidad'";
    $resultCatDisc = $conn2->query($sqlCatDiscapacidades);
    $rowCatDisc = $resultCatDisc->fetch_assoc();
    $idCatDiscapacidadTipo = $rowCatDisc['idCatDiscapacidadTipo'];

    $sqlCatDiscapacidades2 ="SELECT * FROM CatDiscapacidadTipos WHERE id = '$idCatDiscapacidadTipo'";
    $resultCatDisc2 = $conn2->query($sqlCatDiscapacidades2);
    $rowCatDisc2 = $resultCatDisc2->fetch_assoc();
    $idCatDiscapacidadTipoNombre = $rowCatDisc2['tipoDiscapacidad'];

    $idCatInstitucion = $rowDB4['idCatInstitucion']; // se relaciona con idExpediente
    $protesis = $rowDB4['protesis']; // se relaciona con idExpediente
    $tipoProtesis = $rowDB4['tipoProtesis']; // se relaciona con idExpediente
    $gradoDiscapacidad = $rowDB4['gradoDiscapacidad']; // se relaciona con idExpediente
    
    // enfermedades
    $enfermedadesSQL = "SELECT * FROM Enfermedades WHERE idDatosMedico = '$idDatosMedicos'";
    $resultadoDBEnf = $conn2->query($enfermedadesSQL);
    $concatenarEnf = "";
    $concatenarAlergia = "";
    $concMedicamentos = "";
    $concAlg = "";
    $idCatAlergias = "";
    while($rowEnf = $resultadoDBEnf->fetch_assoc()){

    $idCatEnfermedad = $rowEnf['idCatEnfermedad']; // se relaciona con idExpediente

    $sqlEnf2 ="SELECT * FROM CatEnfermedades WHERE id = '$idCatEnfermedad'";
    $resultadoEnf2 = $conn2->query($sqlEnf2);
    while($rowEnf2 = $resultadoEnf2->fetch_assoc()){
        $enfermedad = $rowEnf2['nombreEnfermedad'];
        $concatenarEnf = $concatenarEnf.", ".$enfermedad;
        $concEnf = substr($concatenarEnf, 2);
    }

}
    // alergias
    $AlergiasSQL = "SELECT * FROM Alergias WHERE idDatosMedico = '$idDatosMedicos'";
    $resultadoDBAlergias = $conn2->query($AlergiasSQL);
    while($rowAlergias = $resultadoDBAlergias->fetch_assoc()){

    $idCatAlergias = $rowAlergias['idCatAlergia']; // se relaciona con idExpediente

    $sqlAlergias2 ="SELECT * FROM CatAlergias WHERE id = '$idCatAlergias'";
    $resultadoAlergias2 = $conn2->query($sqlAlergias2);
    while($rowAlergias2 = $resultadoAlergias2->fetch_assoc()){
        $alergia= $rowAlergias2['nombreAlergia'];
        $concatenarAlergia = $concatenarAlergia.", ".$alergia;
        $concAlg = substr($concatenarAlergia, 2);
    }

}
    // medicamentos
    $MedicamendosSQL = "SELECT * FROM Medicamentos WHERE idDatosMedico = '$idDatosMedicos'";
    $resultadoDBMedicamentos = $conn2->query($MedicamendosSQL);
    $concatenarMedicamentos = "";
    while($rowMedicamentos = $resultadoDBMedicamentos->fetch_assoc()){

    $idCatMedicamentos = $rowMedicamentos['idCatMedicamento']; // se relaciona con idExpediente

    $sqlMedicamentos2 ="SELECT * FROM CatMedicamentos WHERE id = '$idCatMedicamentos'";
    $resultadoMedicamentos2 = $conn2->query($sqlMedicamentos2);
    while($rowMedicamentos2 = $resultadoMedicamentos2->fetch_assoc()){
        $medicamentos= $rowMedicamentos2['nombreMedicamento'];
        $concatenarMedicamentos = $concatenarMedicamentos.", ".$medicamentos;
        $concMedicamentos = substr($concatenarMedicamentos, 2);
    }

}

// datos pueba

    $sqlInsertDMedicos = "INSERT INTO datos_medicos (
        curp,
        expediente,
        tipo_sangre,
        grado_discapacidad,
        temporalidad,
        valoracion,
        causa,
        discapacidad,
        tipo_discapacidad,
        protesis,
        protesis_tipo,
        descripcionDiscapacidad,
        medicamentos_cual,
        cirugias,
        tipo_cirugias,
        enfermedades_cual,
        alergias_cual
        
    ) VALUES(
        '$curp',
        '$folio',
        '$idTipoSangre',
        '$grado',
        '$temporalidad',
        '$valoracion',
        '$causa',
        '$idCatDiscapacidad',
        '$idCatDiscapacidadTipoNombre',
        '$protesis',
        '$tipoProtesis',
        '$gradoDiscapacidad',
        '$concMedicamentos', 
        '$cirugia', 
        '$tipoCirugia', 
        '$concEnf',
        '$concAlg'
    
    
    )
    ";
    $resultadoDatosMedicos = $conn->query($sqlInsertDMedicos);
    if($resultadoDatosMedicos){
        echo "Datos medicos correcto update";
    }
    else{
        $error21 = $conn2->error;
        $error22 = $conn->error;

        echo $error21;
        echo $error22;

    }


    $sqlInsert = "INSERT INTO datos_generales (
        numExpediente,
        fecha_registro,
        photo,
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
        '$foto',
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

    // vivienda
    $sqlEstudioSoc = "SELECT * FROM EstudioSocioeconomicos WHERE idExpediente = '$id'";
    $resultadoESoc = $conn2->query($sqlEstudioSoc);
    $rowESoc = $resultadoESoc->fetch_assoc();

    $idESoc = $rowESoc['id'];

    $sqlVivienda = "SELECT * FROM Viviendas WHERE idEstudioSocioeconomico = '$idESoc'";
    $resultadoVivienda = $conn2->query($sqlVivienda);
    $rowViviendas = $resultadoVivienda->fetch_assoc();

    $idCatVivienda = $rowViviendas['idCatVivienda'];
    $idViviendas = $rowViviendas['id'];

    $idCatTecho = $rowViviendas['idCatTecho'];
    $sqlTecho = "SELECT * FROM CatTechos WHERE id = '$idCatTecho'";
    $resultTecho = $conn2->query($sqlTecho);
    $rowTecho = $resultTecho->fetch_assoc();

    $idCatPared = $rowViviendas['idCatPared'];
    $sqlPared = "SELECT * FROM CatParedes WHERE id = '$idCatPared'";
    $resultPared = $conn2->query($sqlPared);
    $rowPared = $resultPared->fetch_assoc();

    // $idCatVivienda = $rowViviendas['idCatPared'];
    $sqlViviendas = "SELECT * FROM CatViviendas WHERE id = '$idCatVivienda'";
    $resultViviendas = $conn2->query($sqlViviendas);
    $rowCatViviendas = $resultViviendas->fetch_assoc();

    // servicios
    $agua = 0;
    $luz = 0;
    $drenaje = 0;
    $cable = 0;
    $internet = 0;
    $celularServ = 0;
    $carro = 0;
    $telefono = 0;
    $gas = 0;

    $sqlServicios = "SELECT * FROM Servicios WHERE idVivienda = '$idViviendas'";
    $resultServicios = $conn2->query($sqlServicios);
    while ($rowServicios = $resultServicios->fetch_assoc()){

        $VarServicios = $rowServicios['idCatServicio'];
        if($VarServicios == 1){
            $agua = 1;
        }
        else if($VarServicios == 2){
            $luz = 1;
        }
        else if($VarServicios == 3){
            $drenaje = 1;
        }
        else if($VarServicios == 4){
            $cable = 1;
        }
        else if($VarServicios == 5){
            $internet = 1;
        }
        else if($VarServicios == 6){
            $celularServ = 1;
        }
        else if($VarServicios == 7){
            $carro = 1;
        }else if($VarServicios == 8){
            $telefono = 1;
        
        }else if($VarServicios == 9){
            $gas = 1;
        }

    }
    // electrodomésticos
    $television = 0;
    $lavadora = 0;
    $estereo = 0;
    $microondas = 0;
    $computadora = 0;
    $licuadora = 0;
    $estufa = 0;
    $dvd = 0;
    $otros_electrodomesticos = 0;

    $sqlElectro = "SELECT * FROM Electrodomesticos WHERE idVivienda = '$idViviendas'";
    $resultElectro = $conn2->query($sqlElectro);
    while ($rowElectro = $resultElectro->fetch_assoc()){

        $VarElectro = $rowElectro['idCatElectrodomestico'];
        if($VarElectro == 1){
            $television = 1;
        }
        else if($VarElectro == 2){
            $lavadora = 1;
        }
        else if($VarElectro == 3){
            $estereo = 1;
        }
        else if($VarElectro == 4){
            $microondas = 1;
        }
        else if($VarElectro == 5){
            $computadora = 1;
        }
        else if($VarElectro == 6){
            $licuadora = 1;
        }
        else if($VarElectro == 7){
            $estufa = 1;
        }else if($VarElectro == 8){
            $dvd = 1;
        
        }else if($VarElectro == 9){
            $otros_electrodomesticos = 1;
        }

    }
    // variables de vivienda, usar solo los id's

    $idVivienda = $rowViviendas['id'];
    $NumHabitaciones = $rowViviendas['numeroHabitaciones'];
    $vivienda = $rowCatViviendas['nombreVivienda'];
    $NumPersonas = $rowViviendas['numeroPersonas'];
    $pagoVivienda = $rowViviendas['pagoVivienda'];
    $valorVivienda = $rowViviendas['valorVivienda'];
    
    if ($idCatVivienda == 1){
        $catVivienda = 1;
        $vivienda_pagando = 0;
    }
    else if ($idCatVivienda == 2){
        $catVivienda = 2;
        $vivienda_pagando = 0;
    }
    else if ($idCatVivienda == 5){
        $catVivienda = 3;
        $vivienda_pagando = 0;
    }
    else if ($idCatVivienda == 4){
        $catVivienda = 4;
        $vivienda_pagando = 1;
    }

    $idTecho = $rowTecho['id'];
    $techo = $rowTecho['nombreTecho'];
    $techo_otro = 0;

    $idPared = $rowPared['id'];
    $pared = $rowPared['nombrePared'];
    $pared_otro = 0;

    // $monto_pagando = $rowViviendas['pagoVivienda'];
   /*  if($pagoVivienda > 0){
        $vivienda_pagando = 1;
    }
    else{
        $vivienda_pagando = 0;
    } */

    $caracteristicas = 0;
    $caracteristicas_otro = 0;
    $vivienda_cocia = 0;
    $vivienda_sala = 0;
    $vivienda_banio = 0;
    $vivienda_otros = 0;
    $serv_basicos_otro = 0;

    
    // inserción de datos a tabla eSocioeconómico
    // vivienda será 1- propia. 2- prestada, 3- rentada
    // caracteristicas 1-casa 2 departamento 3 vecindad 4 otro

    $sqlESInsert = "INSERT INTO vivienda(
        curp,
        expediente,
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
        ) VALUES(
        '$curp',
        '$folio',
        '$idVivienda',
        '$pagoVivienda',
        '$vivienda_pagando',
        '$valorVivienda',
        '$caracteristicas',
        '$caracteristicas_otro',
        '$NumHabitaciones',
        '$vivienda_cocia',
        '$vivienda_sala',
        '$vivienda_banio',
        '$vivienda_otros',
        '$idTecho',
        '$techo_otro',
        '$idPared',
        '$pared_otro',
        '$agua',
        '$luz',
        '$drenaje',
        '$cable',
        '$internet',
        '$celularServ',
        '$carro',
        '$gas',
        '$telefono',
        '$serv_basicos_otro',
        '$television',
        '$lavadora',
        '$estereo',
        '$microondas',
        '$computadora',
        '$licuadora',
        '$dvd',
        '$estufa',
        '$otros_electrodomesticos',
        '$NumPersonas',
        '$deudas',
        '$montoDeuda'
        
        )
        ";

    // integración familiar

    $sqlIntegracion = "SELECT * FROM Familiares WHERE idExpediente = '$id'";
    $resultInt = $conn2->query($sqlIntegracion);
    $errorInt2 = $conn2->error;
            echo $errorInt2;

    while($rowInt = $resultInt->fetch_assoc()){

        $nombreFamilia = $rowInt['nombreFamilia']; // se relaciona con idExpediente
        $edadFamilia = $rowInt['edadFamiliar']; // se relaciona con idExpediente
        $ingresoMensual = $rowInt['ingresoMensual']; // se relaciona con idExpediente
        $idCatParentesco = $rowInt['idCatParentesco']; // se relaciona con idExpediente
    
        $sqlParentesco = "SELECT * FROM CatParentescos WHERE id = '$idCatParentesco'";
        $resultParentesco = $conn2->query($sqlParentesco);
        $rowParentesco = $resultParentesco->fetch_assoc();
    
        $parentesco = $rowParentesco['nombreParentesco'];
    
        $idCatEscolaridad = $rowInt['idCatEscolaridad']; // se relaciona con idExpediente
        $idCatProfesion = $rowInt['idCatProfesion']; // se relaciona con idExpediente
        $idCatDiscapacidad = $rowInt['idCatDiscapacidad']; // se relaciona con idExpediente

        $insertIntegracion = "INSERT INTO integracion(
            curp,
            expediente,
            nombre,
            parentesco,
            edad,
            escolaridad,
            profesion_oficio,
            discapacidad,
            ingreso,
            telcel,
            correoe
        ) VALUES(
            '$curp',
            '$folio',
            '$nombreFamilia',
            '$parentesco',
            '$edadFamilia',
            '$idCatEscolaridad',
            '$idCatProfesion',
            '$idCatDiscapacidad',
            '$ingresoMensual',
            0,
            0
        )";
        $resultIntegracion = $conn->query($insertIntegracion);
        if($resultIntegracion){
            echo "Integración correcta <br>";
        }
        else{
            $errorInt = $conn->error;
            echo $errorInt;
        }
    }

// referencias

$sqlReferencias = "SELECT * FROM Referencias WHERE idExpediente = '$id'";
$resultReferencias = $conn2->query($sqlReferencias);
$errorInt3 = $conn2->error;
        echo $errorInt3;

while($rowReferencias = $resultReferencias->fetch_assoc()){

    $nombreReferencia = $rowReferencias['nombreReferencia']; // se relaciona con idExpediente
    $direccionReferencia = $rowReferencias['direccionReferencia']; // se relaciona con idExpediente
    $telefonoReferencia = $rowReferencias['telefonoReferencia']; // se relaciona con idExpediente
    $celularReferencia = $rowReferencias['celularReferencia']; // se relaciona con idExpediente
    $correoReferencia = $rowReferencias['correoReferencia']; // se relaciona con idExpediente
    $idCatProfesion = $rowReferencias['idCatProfesion']; // se relaciona con idExpediente
    $idCatParentesco = $rowReferencias['idCatParentesco']; // se relaciona con idExpediente

    $insertReferencia = "INSERT INTO referencias(
        curp,
        expediente,
        nombre,
        parentesco,
        edad,
        escolaridad,
        profesion_oficio,
        discapacidad,
        ingreso,
        celular,
        email
    ) VALUES(
        '$curp',
        '$folio',
        '$nombreFamilia',
        '$parentesco',
        '$edadFamilia',
        '$idCatEscolaridad',
        '$idCatProfesion',
        '$idCatDiscapacidad',
        '$ingresoMensual',
        0,
        0
    )";
    $resultReferencias2 = $conn->query($insertReferencia);
    if($resultReferencias2){
        echo "Referencias correcta <br>";
    }
    else{
        $errorReferencias = $conn->error;
        echo $errorReferencias;
    }
}

// de solicitudes a servicios

$sqlSolicitudes  = "SELECT * FROM Solicitudes WHERE idExpediente = '$id'";
$resultSolicitudes = $conn2->query($sqlSolicitudes);
// $errorIntSolicitud = $conn2->error;
//         echo $errorIntSolicitud;

while($rowSolicitud = $resultSolicitudes->fetch_assoc()){

    $fechaSolicitud = $rowSolicitud['fechaSolicitud']; // se relaciona con idExpediente
    $folioSolicitud = $rowSolicitud['folioSolicitud']; // se relaciona con idExpediente
    $descripcionSolicitud = $rowSolicitud['descripcionSolicitud']; // se relaciona con idExpediente
    $tipoSolicitud = $rowSolicitud['tipoSolicitud']; // se relaciona con idExpediente
    $idEstatusSolicitud = $rowSolicitud['idEstatusSolicitud']; // se relaciona con idExpediente

    $insertSolicitud = "INSERT INTO servicios(
        curp,
        expediente,
        folio_solicitud,
        fecha_solicitud,
        tipo_solicitud,
        detalle_solicitud
    ) VALUES(
        '$curp',
        '$folio',
        '$folioSolicitud',
        '$fechaSolicitud',
        '$tipoSolicitud',
        '$descripcionSolicitud'
    )";
    $resultSolicitud = $conn->query($insertSolicitud);
    if($resultSolicitud){
        echo "Solicitud correcta <br>";
    }
    else{
        $errorSolicitud = $conn->error;
        echo $errorSolicitud;
    }
}
  

$resultadoSQLVivienda = $conn->query($sqlESInsert);
if ($resultadoSQLVivienda){
    $x++;
    echo "registros completos Vivienda <br>";
}
else{
    $errorV = $conn2->error;
    $error1V = $conn->error;

    echo $errorV;
    echo $error1V;
}

$resultadoSQL = $conn->query($sqlInsert);
if ($resultadoSQL){
    $x++;
    echo "registros completos: ". $x .' ID: '.$id.'-- ORDEN: '.$ordenExpediente.' '.$nombre.$apellidoPaterno.$apellidoMaterno.' '.$fechaNacimiento.'<br>';
}
else{
    $error = $conn2->error;
    $error1 = $conn->error;

    echo $error;
    echo $error1;
}


}

} //FIN WHILE
} // fin id request


?>