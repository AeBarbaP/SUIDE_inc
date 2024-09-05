<?php

    include('../prcd/qc/qc.php');
    include('../prcd/qc/qc2.php');


    $sqlId = "SELECT * FROM datos_generales WHERE curp = '' OR curp = ' '";
    $resultadoSqlId = $conn->query($sqlId);
    
    while ($row = $resultadoSqlId->fetch_assoc()){

        $expediente = $row['numExpediente'];
        $id = $row['id'];
        $curp = "";
        $lengthExp = strlen($expediente);
        $idExp = substr($expediente,7,$lengthExp);
        
        // DATOS MÉDICOS de la anterior es datosmedicos
        $db3 = "SELECT * FROM DatosMedicos WHERE idExpediente = '$idExp'";
        $resultadoDB3 = $conn2->query($db3);
        $rowDB3 = $resultadoDB3->fetch_assoc();

        //datosMedicos
        $idDatosMedicos = $rowDB3['id'];
        $cirugia = $rowDB3['cirugia']; // se relaciona con idExpediente
        $tipoCirugia = $rowDB3['tipoCirugia']; // se relaciona con idExpediente
        $idTipoSangre = $rowDB3['idTipoSangre']; // se relaciona con idExpediente

        if ($idTipoSangre == 1){
            $idTipoSangre = 7;
        }
        else if ($idTipoSangre == 2){
            $idTipoSangre = 8;
        }
        else if ($idTipoSangre == 3){
            $idTipoSangre = 0;
        }
        else if ($idTipoSangre == 4){
            $idTipoSangre = 1;
        }
        else if ($idTipoSangre == 5){
            $idTipoSangre = 5;
        }
        else if ($idTipoSangre == 6){
            $idTipoSangre = 4;
        }
        else if ($idTipoSangre == 7){
            $idTipoSangre = 3;
        }
        else if ($idTipoSangre == 8){
            $idTipoSangre = 2;
        }
        else if ($idTipoSangre == 9){
            $idTipoSangre = 6;
        }
        else if ($idTipoSangre == 10){
            $idTipoSangre = 1;
        }

        if ($cirugia == "SI"){
            $cirugia = 1;
        }
        else {
            $cirugia = 2;
            $tipoCirugia = "";
        }
        
        // discapacidades
        $db4 = "SELECT * FROM Discapacidades WHERE idExpediente = '$idExp'";
        $resultadoDB4 = $conn2->query($db4);

        $rowDB4 = $resultadoDB4->fetch_assoc();

        $grado = $rowDB4['grado']; // se relaciona con idExpediente
        $temporalidad = ""; // se relaciona con idExpediente
        $valoracion = $rowDB4['idCatInstitucion']; // se relaciona con idExpediente
        $idCatCausa = $rowDB4['idCatCausa']; // se relaciona con idExpediente

        if ($valoracion == 1){
            $valoracionInst = "ISSSTE";
        }
        else if ($valoracion == 2){
            $valoracionInst = "IMSS";
        }
        else if ($valoracion == 3|| $valoracion == 12 || $valoracion == 14){
            $valoracionInst = "SSZ";
        }
        else if ($valoracion == 6 || $valoracion == 5 || $valoracion == 7 || $valoracion == 10 || $valoracion == 11 || $valoracion == 15){
            $valoracionInst = "Particular";
        }
        else if ($valoracion == 8){
            $valoracionInst = "CREE";
        }
        else if ($valoracion == 9){
            $valoracionInst = "UBR";
        }
        else if ($valoracion == 13){
            $valoracionInst = "";
        }

        $SQLCausa ="SELECT * FROM CatCausas WHERE id = '$idCatCausa'";
        $resultCausa = $conn2->query($SQLCausa);
        $rowCausa = $resultCausa->fetch_assoc();
        $causa = $rowCausa['nombreCausa'];

        $idCatDiscapacidad = $rowDB4['idCatDiscapacidad']; // se relaciona con idExpediente

        $sqlCatDiscapacidades ="SELECT * FROM CatDiscapacidades WHERE id = '$idCatDiscapacidad'";
        $resultCatDisc = $conn2->query($sqlCatDiscapacidades);
        $rowCatDisc = $resultCatDisc->fetch_assoc();
        $idCatDiscapacidadTipo = $rowCatDisc['idCatDiscapacidadTipo'];
        $claveDiscapacidad1 = $rowCatDisc['claveDiscapacidad']; // este se necesita para cambiarlo a múltiple
        if (strlen($claveDiscapacidad1) == 1){
            $claveDiscapacidad = "0".$claveDiscapacidad1;
        }
        else {
            $claveDiscapacidad = $claveDiscapacidad1;
        }

        $nombreDiscapacidad1 = strtoupper($rowCatDisc['nombreDiscapacidad']);
        //echo "<br>nombre de la discapacidad " .$nombreDiscapacidad1;

        // $nombreDiscapacidad = "Sin datos de la discapacidad";

        if ($nombreDiscapacidad1 == "MOTORA" || $nombreDiscapacidad1 == "MOTORA "){
            $nombreDiscapacidad = "Motora";
        }
        else if ($nombreDiscapacidad1 == "MOTORA GUILLAIN B." || $nombreDiscapacidad1 == "MOTORA GUILLAIN B. "){
            $nombreDiscapacidad = "Síndrome de Guillain Barré";
        }
        else if ($nombreDiscapacidad1 == "MUDEZ" || $nombreDiscapacidad1 == "MUDEZ "){
            $nombreDiscapacidad = "Mudez";
        }
        else if ($nombreDiscapacidad1 == "MOTORA TALLA BAJA" || $nombreDiscapacidad1 == "MOTORA TALLA BAJA "){
            $nombreDiscapacidad = "Talla Baja";
        }
        else if ($nombreDiscapacidad1 == "MOTORA PSICOMOTOR" || $nombreDiscapacidad1 == "MOTORA PSICOMOTOR "){
            $nombreDiscapacidad = "Psicomotora";
        }
        else if ($nombreDiscapacidad1 == "MOTORA ESCLEROSIS" || $nombreDiscapacidad1 == "MOTORA ESCLEROSIS "){
            $nombreDiscapacidad = "Esclerosis Múltiple";
        }
        else if ($nombreDiscapacidad1 == "MOTORA ESPONDILITIS" || $nombreDiscapacidad1 == "MOTORA ESPONDILITIS "){
            $nombreDiscapacidad = "Espondilitis";
        }
        else if ($nombreDiscapacidad1 == "MOTORA MIELOMENINGOCELE" || $nombreDiscapacidad1 == "MOTORA MIELOMENINGOCELE "){
            $nombreDiscapacidad = "Mielomeningocele";
        }
        else if ($nombreDiscapacidad1 == "MOTORA UNIPARESIA" || $nombreDiscapacidad1 == "MOTORA UNIPARESIA "){
            $nombreDiscapacidad = "Uniparesia / Monoparesia";
        }
        else if ($nombreDiscapacidad1 == "MOTORA CUADRIPARESIA" || $nombreDiscapacidad1 == "MOTORA CUADRIPARESIA "){
            $nombreDiscapacidad = "Cuadriparesia";
        }
        else if ($nombreDiscapacidad1 == "MOTORA AMPUTACION" || $nombreDiscapacidad1 == "MOTORA AMPUTACION " || $nombreDiscapacidad1 == "MOTORA AMPUTACIÓN" || $nombreDiscapacidad1 == "MOTORA AMPUTACIÓN "){
            $nombreDiscapacidad = "Amputación";
        }
        else if ($nombreDiscapacidad1 == "MOTORA POLIOMIELITIS" || $nombreDiscapacidad1 == "MOTORA POLIOMIELITIS "){
            $nombreDiscapacidad = "Poliomielitis";
        }
        else if ($nombreDiscapacidad1 == "MOTORA ENF. ART. DEG." || $nombreDiscapacidad1 == "MOTORA ENF. ART. DEG. "){
            $nombreDiscapacidad = "Enfermedad Articular Degenerativa";
        }
        else if ($nombreDiscapacidad1 == "MOTORA CUADRIPLEJIA" || $nombreDiscapacidad1 == "MOTORA CUADRIPLEJIA "){
            $nombreDiscapacidad = "Cuadriplejia";
        }
        else if ($nombreDiscapacidad1 == "MOTORA HEMIPLEJIA" || $nombreDiscapacidad1 == "MOTORA HEMIPLEJIA "){
            $nombreDiscapacidad = "Hemiplejia";
        }
        else if ($nombreDiscapacidad1 == "MOTORA PARAPARESIA" || $nombreDiscapacidad1 == "MOTORA PARAPARESIA "){
            $nombreDiscapacidad = "Paraparesia";
        }
        else if ($nombreDiscapacidad1 == "MOTORA DISTROFIA" || $nombreDiscapacidad1 == "MOTORA DISTROFIA "){
            $nombreDiscapacidad = "Distrofia";
        }
        else if ($nombreDiscapacidad1 == "MOTORA PARAPLEJIA" || $nombreDiscapacidad1 == "MOTORA PARAPLEJIA "){
            $nombreDiscapacidad = "Paraplejia";
        }
        else if ($nombreDiscapacidad1 == "MOTORA HEMIMELIA" || $nombreDiscapacidad1 == "MOTORA HEMIMELIA "){
            $nombreDiscapacidad = "Hemimelia";
        }
        else if ($nombreDiscapacidad1 == "MOTORA ESCOLIOSIS" || $nombreDiscapacidad1 == "MOTORA ESCOLIOSIS "){
            $nombreDiscapacidad = "Escoliosis";
        }
        
        else if ($nombreDiscapacidad1 == "COMUNICACIÓN LENGUAJE" || $nombreDiscapacidad1 == "COMUNICACIÓN LENGUAJE " || $nombreDiscapacidad1 == "COMUNICACION LENGUAJE" || $nombreDiscapacidad1 == "COMUNICACION LENGUAJE "){
            $nombreDiscapacidad = "Comunicación Lenguaje";
        }
        else if ($nombreDiscapacidad1 == "VISUAL" || $nombreDiscapacidad1 == "VISUAL "){
            $nombreDiscapacidad = "Visual";
        }
        else if ($nombreDiscapacidad1 == "BAJA VISION" || $nombreDiscapacidad1 == "BAJA VISION " || $nombreDiscapacidad1 == "BAJA VISIÓN" || $nombreDiscapacidad1 == "BAJA VISIÓN "){
            $nombreDiscapacidad = "Baja Visión";
        }
        else if ($nombreDiscapacidad1 == "SORDO CIEGO" || $nombreDiscapacidad1 == "SORDO CIEGO "){
            $nombreDiscapacidad = "Sordo Ciego";
        }
        else if ($nombreDiscapacidad1 == "INTELECTUAL DOWN" || $nombreDiscapacidad1 == "INTELECTUAL DOWN "){
            $nombreDiscapacidad = "Síndrome de Down";
        }
        else if ($nombreDiscapacidad1 == "INTELECTUAL NEUROLOGICO" || $nombreDiscapacidad1 == "INTELECTUAL NEUROLOGICO "){
            $nombreDiscapacidad = "Intelectual DM";
        }
        else if ($nombreDiscapacidad1 == "MULTIPLE PC" || $nombreDiscapacidad1 == "MÚLTIPLE PC" || $nombreDiscapacidad1 == "MÚLTIPLE PC " || $nombreDiscapacidad1 == "MULTIPLE PC "){
            $nombreDiscapacidad = "Parálisis Cerebral";
        }
        else if ($nombreDiscapacidad1 == "INTELECTUAL APRENDIZAJE" || $nombreDiscapacidad1 == "INTELECTUAL APRENDIZAJE "){
            $nombreDiscapacidad = "Aprendizaje";
        }
        else if ($nombreDiscapacidad1 == "INTELECTUAL MICROCEFALIA" || $nombreDiscapacidad1 == "INTELECTUAL MICROCEFALIA "){
            $nombreDiscapacidad = "Microcefalia";
        }
        else if ($nombreDiscapacidad1 == "INTELECTUAL NEUROLOGICO" || $nombreDiscapacidad1 == "INTELECTUAL NEUROLOGICO " || $nombreDiscapacidad1 == "INTELECTUAL NEUROLÓGICO " || $nombreDiscapacidad1 == "INTELECTUAL NEUROLÓGICO"){
            $nombreDiscapacidad = "Neurológica";
        }
        else if ($nombreDiscapacidad1 == "INTELECTUAL D. M." || $nombreDiscapacidad1 == "INTELECTUAL D. M. "){
            $nombreDiscapacidad = "Intelectual DM";
        }
        else if ($nombreDiscapacidad1 == "AUTISMO" || $nombreDiscapacidad1 == "AUTISMO "){
            $nombreDiscapacidad = "Espectro Autista";
        }
        else if ($nombreDiscapacidad1 == "MÚLTIPLE " || $nombreDiscapacidad1 == "MULTIPLE " || $nombreDiscapacidad1 == "MÚLTIPLE" || $nombreDiscapacidad1 == "MULTIPLE"){
            $nombreDiscapacidad = "Múltiple";
        }
        else if ($nombreDiscapacidad1 == "MULTIPLE MOTORA AUDITIVA" || $nombreDiscapacidad1 == "MÚLTIPLE MOTORA AUDITIVA" || $nombreDiscapacidad1 == "MULTIPLE MOTORA AUDITIVA " || $nombreDiscapacidad1 == "MÚLTIPLE MOTORA AUDITIVA "){
            $nombreDiscapacidad = "Motora Auditiva";
        }
        else if ($nombreDiscapacidad1 == "MULTIPLE SINDROMES" || $nombreDiscapacidad1 == "MÚLTIPLE SINDROMES" || $nombreDiscapacidad1 == "MULTIPLE SINDROMES " || $nombreDiscapacidad1 == "MÚLTIPLE SINDROMES "){
            $nombreDiscapacidad = "Múltiple Síndromes";
        }
        else if ($nombreDiscapacidad1 == "PROBLEMAS EN LA COMUNICACIÓN" || $nombreDiscapacidad1 == "PROBLEMAS EN LA COMUNICACIÓN " || $nombreDiscapacidad1 == "PROBLEMAS EN LA COMUNICACION" || $nombreDiscapacidad1 == "PROBLEMAS EN LA COMUNICACION "){
            $nombreDiscapacidad = "Problemas en la Comunicación";
        }
        else if ($nombreDiscapacidad1 == "AUDITIVA" || $nombreDiscapacidad1 == "AUDITIVA "){
            $nombreDiscapacidad = "Auditiva Hipoacusia";
        }

        // else{
        //     $nombreDiscapacidad = "0000000009";
        // } 

        $discapacidad = $claveDiscapacidad.'-'.$nombreDiscapacidad;

        //echo "<br>La clave de discapacidad es: ".$discapacidad;

        if($claveDiscapacidad == 33 || $claveDiscapacidad == 40 || $claveDiscapacidad == 41 || $claveDiscapacidad == 42 || $claveDiscapacidad == 49 || $claveDiscapacidad == 50 || $claveDiscapacidad == 51 || $claveDiscapacidad == 52 || $claveDiscapacidad == 53){
            $idCatDiscapacidadTipoNombre = "Múltiple";
        }
        else if ($claveDiscapacidad == 20 || $claveDiscapacidad == 27 || $claveDiscapacidad == 28 || $claveDiscapacidad == 29 || $claveDiscapacidad == 30 || $claveDiscapacidad == 38 || $claveDiscapacidad == 39 || $claveDiscapacidad == 43|| $claveDiscapacidad == 2 || $claveDiscapacidad == 3 || $claveDiscapacidad == 4 || $claveDiscapacidad == 5 || $claveDiscapacidad == 6 || $claveDiscapacidad == 7 || $claveDiscapacidad == 8 || $claveDiscapacidad == 9 || $claveDiscapacidad == 10 || $claveDiscapacidad == 11 || $claveDiscapacidad == 12 || $claveDiscapacidad == 13 || $claveDiscapacidad == 14 || $claveDiscapacidad == 15 || $claveDiscapacidad == 16 || $claveDiscapacidad == 17 || $claveDiscapacidad == 18 || $claveDiscapacidad == 19){
            $idCatDiscapacidadTipoNombre = "Física";
        }
        else if ($claveDiscapacidad == 34 || $claveDiscapacidad == 23 || $claveDiscapacidad == 45 || $claveDiscapacidad == 32 || $claveDiscapacidad == 35 || $claveDiscapacidad == 36 || $claveDiscapacidad == 31 || $claveDiscapacidad == 44){
            $idCatDiscapacidadTipoNombre = "Intelectual";
        }
        else if ($claveDiscapacidad == 37 || $claveDiscapacidad == 48 || $claveDiscapacidad == 47 || $claveDiscapacidad == 46){
            $idCatDiscapacidadTipoNombre = "Psicosocial";
        }
        else if ($claveDiscapacidad == 26 || $claveDiscapacidad == 21 || $claveDiscapacidad == 22 || $claveDiscapacidad == 24 || $claveDiscapacidad == 25 || $claveDiscapacidad == 1){
            $idCatDiscapacidadTipoNombre = "Sensorial";
        }
        
        
        $idCatInstitucion = $rowDB4['idCatInstitucion']; // se relaciona con idExpediente
        $protesis = $rowDB4['protesis']; // se relaciona con idExpediente
        $tipoProtesis = $rowDB4['tipoProtesis']; // se relaciona con idExpediente
        $gradoDiscapacidad = $rowDB4['gradoDiscapacidad']; // se relaciona con idExpediente
        
        if ($protesis == "SI"){
            $protesis = 1;
        }
        else {
            $protesis = 0;
            $tipoProtesis = "";
        }

        // enfermedades
        $enfermedadesSQL = "SELECT * FROM Enfermedades WHERE idDatosMedico = '$idDatosMedicos'";
        $resultadoDBEnf = $conn2->query($enfermedadesSQL);
        $concatenarEnf = "";
        $concatenarAlergia = "";
        $concMedicamentos = "";
        $concAlg = "";
        $concEnf = "";
        $idCatAlergias = "";

        while($rowEnf = $resultadoDBEnf->fetch_assoc()){

            $idCatEnfermedad = $rowEnf['idCatEnfermedad']; // se relaciona con idExpediente

            $sqlEnf2 ="SELECT * FROM CatEnfermedades WHERE id = '$idCatEnfermedad'";
            $resultadoEnf2 = $conn2->query($sqlEnf2);
            while($rowEnf2 = $resultadoEnf2->fetch_assoc()){
                $enfermedad = $rowEnf['idCatEnfermedad'].'-'.$rowEnf2['nombreEnfermedad'];
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
                $alergia= $rowAlergias['idCatAlergia'].'-'.$rowAlergias2['nombreAlergia'];
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
                $medicamentos= $rowMedicamentos['idCatMedicamento'].'-'.$rowMedicamentos2['nombreMedicamento'];
                $concatenarMedicamentos = $concatenarMedicamentos.", ".$medicamentos;
                $concMedicamentos = substr($concatenarMedicamentos, 2);
            }
        } //fin while medicamentos

        $sqlUpdateDMedicos = "UPDATE datos_medicos SET 
            curp = '$curp',
            expediente = '$expediente',
            tipo_sangre = '$idTipoSangre',
            grado_discapacidad = '$grado',
            temporalidad = '$temporalidad',
            valoracion = '$valoracionInst',
            causa = '$idCatCausa',
            discapacidad = '$discapacidad',
            tipo_discapacidad = '$idCatDiscapacidadTipoNombre',
            protesis = '$protesis',
            protesis_tipo = '$tipoProtesis',
            descripcionDiscapacidad = '$gradoDiscapacidad',
            medicamentos_cual = '$concMedicamentos',
            cirugias = '$cirugia',
            tipo_cirugias = '$tipoCirugia',
            enfermedades_cual = '$concEnf',
            alergias_cual = '$concAlg' 
        WHERE id = '$id'";

        $resultadoDatosMedicos = $conn->query($sqlUpdateDMedicos);
        if($resultadoDatosMedicos){
            echo json_encode(array(
                "success" => 1
            ));
        }
        else{
            $error21 = $conn2->error;
            $error22 = $conn->error;

            echo json_encode(array(
                "success" => 0,
                "error1" => $error21,
                "error2" => $error22,
                "cadena" => $expediente,
                "cadena2" => $lengthExp,
                "cadena3" => $idExp
            ));
        }

    } // fin del if

?>