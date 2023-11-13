<?php
include('../prcd/qc/qc.php');

$curp = $_POST['curp'];
$expediente = $_POST['expediente'];

$sql = "SELECT * FROM datos_generales WHERE numExpediente = '$expediente' OR curp = '$curp'";
$resultadoSql = $conn->query($sql);
$rowDatos = $resultadoSql->fetch_assoc();
//datos médicos
$sqlMedicos = "SELECT * FROM datos_medicos WHERE numExpediente = '$expediente' OR curp = '$curp'";
$resultadoSqlMedicos = $conn->query($sqlMedicos);
$rowDatosMedicos = $resultadoSqlMedicos->fetch_assoc();
//vivienda
$sqlVivienda = "SELECT * FROM vivienda WHERE numExpediente = '$expediente' OR curp = '$curp'";
$resultadoSqlVivienda = $conn->query($sqlVivienda);
$rowDatosVivienda = $resultadoSqlVivienda->fetch_assoc();

    $numExpediente = $rowDatos['numExpediente'];
    $nombre = $rowDatos['nombre'];
    $apellido_p = $rowDatos['apellido_p'];
    $apellido_m = $rowDatos['apellido_m'];
    $curp = $rowDatos['curp'];

    echo json_encode(array(
        'success'=>1,
        'nombre'=>$rowDatos['nombr']e,
        'apellido_p'=>$rowDatos['apellido_']p,
        'apellido_m'=>$rowDatos['apellido_']m,
        'genero'=>$rowDatos['genero'], 
        'edad'=>$rowDatos['edad'], 
        'edo_civil'=>$rowDatos['edo_civil'], 
        'f_nacimiento'=>$rowDatos['f_nacimiento'], 
        'lugar_nacimiento'=>$rowDatos['lugar_nacimiento'], 
        'domicilio'=>$rowDatos['domicilio'], 
        'no_int'=>$rowDatos['no_int'], 
        'no_ext'=>$rowDatos['no_ext'], 
        'colonia'=>$rowDatos['colonia'], 
        'entra_vialidades'=>$rowDatos['entra_vialidades'], 
        'desc_referencias'=>$rowDatos['desc_referencias'], 
        'tipoVialidad'=>$rowDatos['tipoVialidad'], 
        'estado'=>$rowDatos['estado'], 
        'municipio'=>$rowDatos['municipio'], 
        'localidad'=>$rowDatos['localidad'], 
        'asentamiento'=>$rowDatos['asentamiento'], 
        'cp'=>$rowDatos['cp'], 
        'telefono_part'=>$rowDatos['telefono_part'], 
        'correo'=>$rowDatos['correo'], 
        'telefono_cel'=>$rowDatos['telefono_cel'], 
        'escolaridad'=>$rowDatos['escolaridad'], 
        'profesion'=>$rowDatos['profesion'], 
        'rfc'=>$rowDatos['rfc'], 
        'estudia'=>$rowDatos['estudia'], 
        'estdia_donde'=>$rowDatos['estdia_donde'], 
        'estudia_habilidad'=>$rowDatos['estudia_habilidad'], 
        'trabaja'=>$rowDatos['trabaja'], 
        'trabaja_donde'=>$rowDatos['trabaja_donde'], 
        'asoc_civ'=>$rowDatos['asoc_civ'], 
        'asoc_cual'=>$rowDatos['asoc_cual'], 
        'pensionado'=>$rowDatos['pensionado'], 
        'pensionado_donde'=>$rowDatos['pensionado_donde'], 
        'pension_monto'=>$rowDatos['pension_monto'], 
        'pension_temporalidad'=>$rowDatos['pension_temporalidad'], 
        'sindicato'=>$rowDatos['sindicato'], 
        'sindicato_cual'=>$rowDatos['sindicato_cual'], 
        'seguridad_social'=>$rowDatos['seguridad_social'], 
        'seguridad_social_otro'=>$rowDatos['seguridad_social_otro'], 
        'numSS'=>$rowDatos['numSS'], 
        'photo'=>$rowDatos['photo, '],//hasta aquí datos generales 
        'discapacidad'=>$rowDatosMedicos['discapacidad'], 
        'grado_discapacidad'=>$rowDatosMedicos['grado_discapacidad'], 
        'tipo_discapacidad'=>$rowDatosMedicos['tipo_discapacidad'], 
        'descripcionDiscapacidad'=>$rowDatosMedicos['descripcionDiscapacidad'], 
        'causa'=>$rowDatosMedicos['causa'], 
        'causa_otro'=>$rowDatosMedicos['causa_otro'], 
        'temporalidad'=>$rowDatosMedicos['temporalidad'], 
        'valoracion'=>$rowDatosMedicos['valoracion'], 
        'fecha_valoracion'=>$rowDatosMedicos['fecha_valoracion'], 
        'rehabilitacion'=>$rowDatosMedicos['rehabilitacion'], 
        'rehabilitacion_donde'=>$rowDatosMedicos['rehabilitacion_donde'], 
        'rehabilitacion_inicio'=>$rowDatosMedicos['rehabilitacion_inicio'], 
        'rehabilitacion_duracion'=>$rowDatosMedicos['rehabilitacion_duracion'], 
        'tipo_sangre'=>$rowDatosMedicos['tipo_sangre'], 
        'cirugias'=>$rowDatosMedicos['cirugias'], 
        'tipo_cirugias'=>$rowDatosMedicos['tipo_cirugias'], 
        'protesis'=>$rowDatosMedicos['protesis'], 
        'protesis_tipo'=>$rowDatosMedicos['protesis_tipo'], 
        'alergias'=>$rowDatosMedicos['alergias'], 
        'alergias_cual'=>$rowDatosMedicos['alergias_cual'], 
        'enfermedades'=>$rowDatosMedicos['enfermedades'], 
        'enfermedades_cual'=>$rowDatosMedicos['enfermedades_cual'], 
        'medicamentos'=>$rowDatosMedicos['medicamentos'], 
        'medicamentos_cual'=>$rowDatosMedicos['medicamentos_cual'],//medicamentos
        'vivienda'=>$rowDatosVivienda['vivienda'], 
        'vivienda_renta'=>$rowDatosVivienda['vivienda_renta'], 
        'vivienda_pagando'=>$rowDatosVivienda['vivienda_pagando'], 
        'vivienda_renta'=>$rowDatosVivienda['vivienda_renta'], 
        'monto_pagando'=>$rowDatosVivienda['monto_pagando'], 
        'caracteristicas'=>$rowDatosVivienda['caracteristicas'], 
        'caracteristicas_otro'=>$rowDatosVivienda['caracteristicas_otro'], 
        'num_habitaciones'=>$rowDatosVivienda['num_habitaciones'], 
        'vivienda_cocia'=>$rowDatosVivienda['vivienda_cocia'], 
        'vivienda_sala'=>$rowDatosVivienda['vivienda_sala'], 
        'vivienda_banio'=>$rowDatosVivienda['vivienda_banio'], 
        'vivienda_otros'=>$rowDatosVivienda['vivienda_otros'], 
        'techo'=>$rowDatosVivienda['techo'], 
        'techo_otros'=>$rowDatosVivienda['techo_otros'], 
        'pared'=>$rowDatosVivienda['pared'], 
        'pared_otro'=>$rowDatosVivienda['pared_otro'], 
        'serv_basicos_agua'=>$rowDatosVivienda['serv_basicos_agua'], 
        'serv_basicos_luz'=>$rowDatosVivienda['serv_basicos_luz'], 
        'serv_basicos_drenaje'=>$rowDatosVivienda['serv_basicos_drenaje'], 
        'serv_basicos_cable'=>$rowDatosVivienda['serv_basicos_cable'], 
        'serv_basicos_internet'=>$rowDatosVivienda['serv_basicos_internet'], 
        'serv_basicos_celular'=>$rowDatosVivienda['serv_basicos_celular'], 
        'serv_basicos_carro'=>$rowDatosVivienda['serv_basicos_carro'], 
        'serv_basicos_gas'=>$rowDatosVivienda['serv_basicos_gas'], 
        'serv_basicos_telefono'=>$rowDatosVivienda['serv_basicos_telefono'], 
        'serv_basicos_otro'=>$rowDatosVivienda['serv_basicos_otro'], 
        'electrodomesticos_tv'=>$rowDatosVivienda['electrodomesticos_tv'], 
        'electrodomesticos_lavadora'=>$rowDatosVivienda['electrodomesticos_lavadora'], 
        'electrodomesticos_estereo'=>$rowDatosVivienda['electrodomesticos_estereo'], 
        'electrodomesticos_microondas'=>$rowDatosVivienda['electrodomesticos_microondas'], 
        'electrodomesticos_computadora'=>$rowDatosVivienda['electrodomesticos_computadora'], 
        'electrodomesticos_licuadora'=>$rowDatosVivienda['electrodomesticos_licuadora'], 
        'electrodomesticos_dvd'=>$rowDatosVivienda['electrodomesticos_dvd'], 
        'electrodomesticos_estufa'=>$rowDatosVivienda['electrodomesticos_estufa'], 
        'electrodomesticos_otro'=>$rowDatosVivienda['electrodomesticos_otro'], 
        'personas_dependen'=>$rowDatosVivienda['personas_dependen'], 
        'deudas'=>$rowDatosVivienda['deudas'], 
        'deudas_cuanto'=>$rowDatosVivienda['deudas_cuanto'], 
    ));