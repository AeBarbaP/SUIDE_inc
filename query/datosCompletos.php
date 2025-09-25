<?php
include('../prcd/qc/qc.php');

//$curp = $_POST['curp2'];
$expediente = $_POST['expediente'];

//substr($expediente,6,5);

//if ($expediente != "" || $expediente != null ){ 
    $sql = "SELECT * FROM datos_generales WHERE numExpediente = '$expediente'";
    $resultadoSql = $conn->query($sql);
    $filas = $resultadoSql->num_rows;

    if ($filas >= 1){

        $rowDatos = $resultadoSql->fetch_assoc();
        $id = $rowDatos['id'];
        //datos médicos
        $sqlMedicos = "SELECT * FROM datos_medicos WHERE expediente = '$expediente'";
        $resultadoSqlMedicos = $conn->query($sqlMedicos);
        $rowDatosMedicos = $resultadoSqlMedicos->fetch_assoc();

        $tipoDiscapacidad = $rowDatosMedicos['tipo_discapacidad'];

        $enfermedades = $rowDatosMedicos['enfermedades_cual'];
        if ($enfermedades == null || $enfermedades == ""){
            $resultadoEnf[] = "";
        }
        else{
            // Cadena original
            $var = $enfermedades;
            // Dividir la cadena en cada coma (",")
            $elementos = explode(", ", $var);
            // Arreglo para almacenar los resultados
            $resultadoEnf = [];
            // Iterar sobre cada elemento y dividirlo en ID y nombre del producto
            foreach ($elementos as $elemento) {
                // Dividir el elemento en el guion ("-")
                list($idE, $enfermedad) = explode("-", $elemento);
                // Agregar el ID y el nombre del producto al arreglo resultadoEnf
                $resultadoEnf[] = [
                    'id' => $idE,
                    'enfermedad' => $enfermedad
                ];
            }
        }

        $alergias = $rowDatosMedicos['alergias_cual'];
        if ($alergias == null || $alergias == '') {
            $resultadoAlergias[] = "";
        }
        else {
            // Cadena original
            $varA = $alergias;
            // Dividir la cadena en cada coma (",")
            $elementosA = explode(", ", $varA);
            // Arreglo para almacenar los resultados
            $resultadoAlergias = [];
            // Iterar sobre cada elemento y dividirlo en ID y nombre del producto
            foreach ($elementosA as $elementoA) {
                // Dividir el elementoA en el guion ("-")
                list($idA, $alergia) = explode("-", $elementoA);
                // Agregar el ID y el nombre del producto al arreglo resultadoEnf
                $resultadoAlergias[] = [
                    'id' => $idA,
                    'alergia' => $alergia
                ];
            }
            
        }

        $medicamentos = $rowDatosMedicos['medicamentos_cual'];
        if ($medicamentos == null || $medicamentos == '') {
            $resultadoMedicamentos[] = "";
        }
        else {
            // Cadena original
            $varM = $medicamentos;
            // Dividir la cadena en cada coma (",")
            $elementosM = explode(", ", $varM);
            // Arreglo para almacenar los resultados
            $resultadoMedicamentos = [];
            // Iterar sobre cada elemento y dividirlo en ID y nombre del producto
            foreach ($elementosM as $elementoM) {
                // Dividir el elementoA en el guion ("-")
                list($idM, $medicamento) = explode("-", $elementoM);
                // Agregar el ID y el nombre del producto al arreglo resultadoEnf
                $resultadoMedicamentos[] = [
                    'id' => $idM,
                    'medicamento' => $medicamento
                ];
            }
        }

        $grupos = $rowDatos['gpo_vulnerable'];
        if ($grupos == null || $grupos == "") {
            $resultadoGrupos[] = "";
        }
        else {
            // Cadena original
            $varG = $grupos;
            // Dividir la cadena en cada coma (",")
            $elementosG = explode(", ", $varG);
            // Arreglo para almacenar los resultados
            $resultadoGrupos = [];
            // Iterar sobre cada elemento y dividirlo en ID y nombre del producto
            foreach ($elementosG as $elementoG) {
                // Dividir el elementoA en el guion ("-")
                list($idG, $grupo) = explode("-", $elementoG);
                // Agregar el ID y el nombre del producto al arreglo resultadoEnf
                $resultadoGrupos[] = [
                    'id' => $idG,
                    'grupo' => $grupo
                ];
            }
        }
        //vivienda
        $sqlVivienda = "SELECT * FROM vivienda WHERE expediente = '$expediente'";
        $resultadoSqlVivienda = $conn->query($sqlVivienda);
        $rowDatosVivienda = $resultadoSqlVivienda->fetch_assoc();
        $filasVivienda = $resultadoSqlVivienda->num_rows;

        if ($filasVivienda == 0){
            $vivienda = ""; 
            $propietario = ""; 
            $caracteristicas = ""; 
            $caracteristicas_otro = ""; 
            $num_habitaciones = ""; 
            $vivienda_cocia = ""; 
            $vivienda_sala = ""; 
            $vivienda_banio = "";
            $vivienda_numbanio = "";
            $vivienda_baniolocalizacion = "";
            $vivienda_otros = ""; 
            $techo = ""; 
            $techo_otro = ""; 
            $pared = ""; 
            $pared_otro = ""; 
            $serv_basicos_agua = ""; 
            $serv_basicos_luz = ""; 
            $serv_basicos_drenaje = ""; 
            $serv_basicos_internet = ""; 
            $serv_basicos_celular = ""; 
            $serv_basicos_carro = ""; 
            $serv_basicos_gas = ""; 
            $serv_basicos_telefono = ""; 
            $serv_basicos_otro = ""; 
            $electrodomesticos_tv = ""; 
            $electrodomesticos_lavadora = ""; 
            $electrodomesticos_dispositivo = ""; 
            $electrodomesticos_microondas = ""; 
            $electrodomesticos_computadora = ""; 
            $electrodomesticos_licuadora = ""; 
            $electrodomesticos_estufa = ""; 
            $electrodomesticos_refri = ""; 
            $electrodomesticos_otro = ""; 
            $dependiente = "";
            $financiador = "";
            $personas_dependen = "";

            $InserVivienda = "INSERT INTO vivienda (
                id,
                expediente
            ) VALUES (
                '$id',
                '$expediente'
            )";
            $resultadoInsertVivienda = $conn->query($InserVivienda);

            /* if ($resultadoInsertVivienda){
                echo json_encode(array(
                    'success'=>"ViviendaSi"
                ));
            }
            else {
                $error = $conn->error;
                echo $error;
                echo json_encode(array(
                    'success'=>"IV",
                    'error'=>$error
                ));
            } */
        }
        else {
            $vivienda = $rowDatosVivienda['vivienda']; 
            $propietario = $rowDatosVivienda['propietario']; 
            $caracteristicas = $rowDatosVivienda['caracteristicas']; 
            $caracteristicas_otro = $rowDatosVivienda['caracteristicas_otro']; 
            $num_habitaciones = $rowDatosVivienda['num_habitaciones']; 
            $vivienda_cocia = $rowDatosVivienda['vivienda_cocia']; 
            $vivienda_sala = $rowDatosVivienda['vivienda_sala']; 
            $vivienda_banio = $rowDatosVivienda['vivienda_banio'];
            $vivienda_numbanio = $rowDatosVivienda['num_banio'];
            $vivienda_baniolocalizacion = $rowDatosVivienda['localizacion'];
            $vivienda_otros = $rowDatosVivienda['vivienda_otros']; 
            $techo = $rowDatosVivienda['techo']; 
            $techo_otro = $rowDatosVivienda['techo_otro']; 
            $pared = $rowDatosVivienda['pared']; 
            $pared_otro = $rowDatosVivienda['pared_otro']; 
            $serv_basicos_agua = $rowDatosVivienda['serv_basicos_agua']; 
            $serv_basicos_luz = $rowDatosVivienda['serv_basicos_luz']; 
            $serv_basicos_drenaje = $rowDatosVivienda['serv_basicos_drenaje']; 
            $serv_basicos_internet = $rowDatosVivienda['serv_basicos_internet']; 
            $serv_basicos_celular = $rowDatosVivienda['serv_basicos_celular']; 
            $serv_basicos_carro = $rowDatosVivienda['serv_basicos_carro']; 
            $serv_basicos_gas = $rowDatosVivienda['serv_basicos_gas']; 
            $serv_basicos_telefono = $rowDatosVivienda['serv_basicos_telefono']; 
            $serv_basicos_otro = $rowDatosVivienda['serv_basicos_otro']; 
            $electrodomesticos_tv = $rowDatosVivienda['electrodomesticos_tv']; 
            $electrodomesticos_lavadora = $rowDatosVivienda['electrodomesticos_lavadora']; 
            $electrodomesticos_dispositivo = $rowDatosVivienda['electrodomesticos_dispositivo']; 
            $electrodomesticos_microondas = $rowDatosVivienda['electrodomesticos_microondas']; 
            $electrodomesticos_computadora = $rowDatosVivienda['electrodomesticos_computadora']; 
            $electrodomesticos_licuadora = $rowDatosVivienda['electrodomesticos_licuadora']; 
            $electrodomesticos_estufa = $rowDatosVivienda['electrodomesticos_estufa']; 
            $electrodomesticos_refri = $rowDatosVivienda['electrodomesticos_refri']; 
            $electrodomesticos_otro = $rowDatosVivienda['electrodomesticos_otro']; 
            $dependiente = $rowDatosVivienda['dependiente'];
            $financiador = $rowDatosVivienda['financiador'];
            $personas_dependen = $rowDatosVivienda['personas_dependen'];
            

        }

        //documentos
        $sqlDocumentos = "SELECT * FROM documentos_list WHERE documento = 1 AND numExp = '$expediente'";
        $resultadoSqlDocumentos = $conn->query($sqlDocumentos);
        if ($rowDatosDocumentos = $resultadoSqlDocumentos->fetch_assoc()){
            $tipo_documento = $rowDatosDocumentos['tipo_doc'];
            $ruta1 = $rowDatosDocumentos['ruta_doc'];
        }
        else {
            $ruta1 = "";
            $tipo_documento  = "";
        }
        $sqlDocumentos1 = "SELECT * FROM documentos_list WHERE documento = 2 AND numExp = '$expediente'";
        $resultadoSqlDocumentos1 = $conn->query($sqlDocumentos1);
        if ($rowDatosDocumentos1 = $resultadoSqlDocumentos1->fetch_assoc()){
            $tipo_documento1 = $rowDatosDocumentos1['tipo_doc'];
            $ruta2 = $rowDatosDocumentos1['ruta_doc'];
        }
        else {
            $ruta2 = "";
            $tipo_documento1 = "";
        }

        $sqlDocumentos2 = "SELECT * FROM documentos_list WHERE documento = 3 AND numExp = '$expediente'";
        $resultadoSqlDocumentos2 = $conn->query($sqlDocumentos2);
        if ($rowDatosDocumentos2 = $resultadoSqlDocumentos2->fetch_assoc()){
            $tipo_documento2 = $rowDatosDocumentos2['tipo_doc'];
            $ruta3 = $rowDatosDocumentos2['ruta_doc'];
        }
        else {
            $ruta3 = "";
            $tipo_documento2 = "";
        }
        $sqlDocumentos3 = "SELECT * FROM documentos_list WHERE documento = 4 AND numExp = '$expediente'";
        $resultadoSqlDocumentos3 = $conn->query($sqlDocumentos3);
        if ($rowDatosDocumentos3 = $resultadoSqlDocumentos3->fetch_assoc()) {
            $tipo_documento3 = $rowDatosDocumentos3['tipo_doc'];
            $ruta4 = $rowDatosDocumentos3['ruta_doc'];
        }
        else {
            $ruta4 = "";
            $tipo_documento3 = "";
        }
        $sqlDocumentos4 = "SELECT * FROM documentos_list WHERE documento = 5 AND numExp = '$expediente'";
        $resultadoSqlDocumentos4 = $conn->query($sqlDocumentos4);
        if ($rowDatosDocumentos4 = $resultadoSqlDocumentos4->fetch_assoc()) {
            $tipo_documento4 = $rowDatosDocumentos4['tipo_doc'];
            $ruta5 = $rowDatosDocumentos4['ruta_doc'];
        }
        else {
            $ruta5 = "";
            $tipo_documento4 = "";
        }

        $sqlDocumentos5 = "SELECT * FROM documentos_list WHERE documento = 6 AND numExp = '$expediente'";
        $resultadoSqlDocumentos5 = $conn->query($sqlDocumentos5);
        if ($rowDatosDocumentos5 = $resultadoSqlDocumentos5->fetch_assoc()) {
            $tipo_documento5 = $rowDatosDocumentos5['tipo_doc'];
            $ruta6 = $rowDatosDocumentos5['ruta_doc'];
        }
        else {
            $ruta6 = "";
            $tipo_documento5 = "";
        }
        $sqlDocumentos6 = "SELECT * FROM documentos_list WHERE documento = 7 AND numExp = '$expediente'";
        $resultadoSqlDocumentos6 = $conn->query($sqlDocumentos6);
        if ($rowDatosDocumentos6 = $resultadoSqlDocumentos6->fetch_assoc()) {
            $tipo_documento6 = $rowDatosDocumentos6['tipo_doc'];
            $ruta7 = $rowDatosDocumentos6['ruta_doc'];
        }
        else {
            $ruta7 = "";
            $tipo_documento6 = "";
        }
        
        $id = $rowDatos['id'];
        $numExpediente = $rowDatos['numExpediente'];
        $nombre = $rowDatos['nombre'];
        $apellido_p = $rowDatos['apellido_p'];
        $apellido_m = $rowDatos['apellido_m'];
        $curp = $rowDatos['curp'];

        
        if ($curp == "" || $curp == null){
            $curp2 = "";
        }
        else {
            $curp2 = $curp;
        }

        if ($rowDatos['trabaja_donde'] != "Iniciativa Privada" || $rowDatos['trabaja_donde'] != "Gobierno Estatal" ||$rowDatos['trabaja_donde'] != "Gobierno Federal" || $rowDatos['trabaja_donde'] != "Gobierno Municipal"){
            $trabajaDonde = "Otro";
        }
        
        echo json_encode(array(
            'success'=>1,
            'id' => $id,
            'curp'=>$curp2,
            'estatus'=>$rowDatos['estatus'],
            'numExpediente'=>$numExpediente,
            'nombre'=>$rowDatos['nombre'],
            'apellido_p'=>$rowDatos['apellido_p'],
            'apellido_m'=>$rowDatos['apellido_m'],
            'genero'=>$rowDatos['genero'], 
            'edad'=>$rowDatos['edad'], 
            'f_nacimiento'=>$rowDatos['f_nacimiento'], 
            'lugar_nacimiento'=>$rowDatos['lugar_nacimiento'], 
            'edo_civil'=>$rowDatos['edo_civil'], 
            'domicilio'=>$rowDatos['domicilio'], 
            'no_int'=>$rowDatos['no_int'], 
            'no_ext'=>$rowDatos['no_ext'], 
            'colonia'=>$rowDatos['colonia'], 
            'entre_vialidades'=>$rowDatos['entre_vialidades'], 
            'desc_referencias'=>$rowDatos['descr_referencias'], 
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
            'carrera'=>$rowDatos['nombre_escolaridad'],
            'leer'=>$rowDatos['leer_escribir'],
            'concluida'=>$rowDatos['nivel_concluido'],
            'profesion'=>$rowDatos['profesion'],
            'grupo'=>$rowDatos['gpo_vulnerable'],
            'rfc'=>$rowDatos['rfc'], 
            'estudia'=>$rowDatos['estudia'], 
            'estudia_donde'=>$rowDatos['estudia_donde'], 
            'estudia_habilidad'=>$rowDatos['estudia_habilidad'], 
            'trabaja'=>$rowDatos['trabaja'], 
            'trabaja_donde'=>$trabajaDonde,
            'trabaja_dondeO'=>$rowDatos['trabaja_donde'],
            'ingreso_mensual'=>$rowDatos['trabaja_ingresos'],
            'asoc_civ'=>$rowDatos['asoc_civ'], 
            'asoc_cual'=>$rowDatos['asoc_cual'], 
            'pensionado'=>$rowDatos['pensionado'], 
            'pensionado_donde'=>$rowDatos['pensionado_donde'], 
            'pension_monto'=>$rowDatos['pension_monto'], 
            'pension_temporalidad'=>$rowDatos['pension_temporalidad'], 
            'seguridad_social'=>$rowDatos['seguridad_social'], 
            'seguridad_social_otro'=>$rowDatos['seguridad_social_otro'], 
            'numSS'=>$rowDatos['numSS'], 
            'informante'=>$rowDatos['informante'],
            'informanteParentesco'=>$rowDatos['informante_parentesco'],
            'informanteParentescoOtro'=>$rowDatos['otro_parentesco'],
            'photo'=>$rowDatos['photo'],//hasta aquí datos generales
            //datos medicos 
            'discapacidad'=>$rowDatosMedicos['discapacidad'], 
            'grado_discapacidad'=>$rowDatosMedicos['grado_discapacidad'], 
            'tipo_discapacidad'=>$tipoDiscapacidad, 
            'descripcionDiscapacidad'=>$rowDatosMedicos['descripcionDiscapacidad'], 
            'causa'=>$rowDatosMedicos['causa'], 
            'causa_otro'=>$rowDatosMedicos['causa_otro'], 
            'temporalidad'=>$rowDatosMedicos['temporalidad'], 
            'valoracionMed'=>$rowDatosMedicos['valoracion'], 
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
            'enfermedades_cual'=>$rowDatosMedicos['enfermedades_cual'], //esta variable va a cambiar, la vamos a romper
            'medicamentos'=>$rowDatosMedicos['medicamentos'], 
            'medicamentos_cual'=>$rowDatosMedicos['medicamentos_cual'],
            'braile'=>$rowDatosMedicos['braile'],
            'lsm'=>$rowDatosMedicos['lsm'],
            'labiofacial'=>$rowDatosMedicos['labiofacial'],
            'asistencia'=>$rowDatosMedicos['asistencia'],
            //medicamentos
            'vivienda'=>$vivienda,
            'propietario'=>$propietario,
            'caracteristicas'=>$caracteristicas, 
            'caracteristicas_otro'=>$caracteristicas_otro, 
            'num_habitaciones'=>$num_habitaciones, 
            'vivienda_cocia'=>$vivienda_cocia, 
            'vivienda_sala'=>$vivienda_sala, 
            'vivienda_banio'=>$vivienda_banio,
            'vivienda_numbanio'=>$vivienda_numbanio,
            'vivienda_baniolocalizacion'=>$vivienda_baniolocalizacion,
            'vivienda_otros'=>$vivienda_otros, 
            'techo'=>$techo, 
            'techo_otro'=>$techo_otro, 
            'pared'=>$pared, 
            'pared_otro'=>$pared_otro, 
            'serv_basicos_agua'=>$serv_basicos_agua, 
            'serv_basicos_luz'=>$serv_basicos_luz, 
            'serv_basicos_drenaje'=>$serv_basicos_drenaje, 
            'serv_basicos_internet'=>$serv_basicos_internet, 
            'serv_basicos_celular'=>$serv_basicos_celular, 
            'serv_basicos_carro'=>$serv_basicos_carro, 
            'serv_basicos_gas'=>$serv_basicos_gas, 
            'serv_basicos_telefono'=>$serv_basicos_telefono, 
            'serv_basicos_otro'=>$serv_basicos_otro, 
            'electrodomesticos_tv'=>$electrodomesticos_tv, 
            'electrodomesticos_lavadora'=>$electrodomesticos_lavadora, 
            'electrodomesticos_dispositivo'=>$electrodomesticos_dispositivo, 
            'electrodomesticos_microondas'=>$electrodomesticos_microondas, 
            'electrodomesticos_computadora'=>$electrodomesticos_computadora, 
            'electrodomesticos_licuadora'=>$electrodomesticos_licuadora, 
            'electrodomesticos_estufa'=>$electrodomesticos_estufa, 
            'electrodomesticos_refri'=>$electrodomesticos_refri, 
            'electrodomesticos_otro'=>$electrodomesticos_otro, 
            'dependiente'=>$dependiente,
            'financiador'=>$financiador,
            'personas_dependen'=>$personas_dependen,
            //vivienda
            'HojaRegistro'=> $tipo_documento,
            'valoracion'=> $tipo_documento1,
            'actaNacimiento'=>$tipo_documento2,
            'curpDoc'=> $tipo_documento3,
            'ineDoc'=> $tipo_documento4,
            'comprobante'=> $tipo_documento5,
            'tarjetaCirculacion'=>$tipo_documento6,
            'HojaRegistroDoc'=>$ruta1,
            'valoracionDoc'=>$ruta2,
            'actaNacimientoDoc'=>$ruta3,
            'curpDocDoc'=>$ruta4,
            'ineDocDoc'=>$ruta5,
            'comprobanteDoc'=>$ruta6,
            'tarjetaCirculacionDoc'=>$ruta7,
            'arregloEnfermedades'=>$resultadoEnf,
            'arregloAlergias'=>$resultadoAlergias,
            'arregloMedicamentos'=>$resultadoMedicamentos,
            'arregloGrupos'=>$resultadoGrupos
        ));
    }
    else {
        echo json_encode(array(
            'success'=>0
        ));
    }
