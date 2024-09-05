<?php
include('../prcd/qc/qc.php');
include('../prcd/qc/qc2.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$hoyX = strtotime("%Y-%m-%d");

$files = glob('../fotos_expedientes/*.jpg'); //obtenemos todos los nombres de los ficheros
foreach($files as $file){
    if(is_file($file))
    unlink($file); //elimino el fichero
echo "eliminado";
}

$limpiar = "DELETE FROM datos_generales";
$resultado = $conn->query($limpiar);

if ($resultado){
    echo "datos generales eliminados <br><hr>";
}
else {
    echo "error al limpiar datos generales";
}

function edad($fechaNacimiento){
    $nacimiento = new DateTime($fechaNacimiento);
    $ahora = new DateTime(date("Y-m-d"));
    $diferencia = $ahora->diff($nacimiento);
    return $diferencia->format("%y");
}


$sqlDelete1 = "DELETE FROM datos_generales";
$resultado_sqlDelete1 = $conn->query($sqlDelete1);
$sqlDelete2 = "DELETE FROM datos_medicos";
$resultado_sqlDelete2 = $conn->query($sqlDelete2);
$sqlDelete3 = "DELETE FROM integracion";
$resultado_sqlDelete3 = $conn->query($sqlDelete3);
$sqlDelete4 = "DELETE FROM referencias";
$resultado_sqlDelete4 = $conn->query($sqlDelete4);
$sqlDelete5 = "DELETE FROM vivienda";
$resultado_sqlDelete5 = $conn->query($sqlDelete5);

$sqlDelete1 = "ALTER TABLE datos_generales AUTO_INCREMENT=1";
$resultado_sqlDelete1 = $conn->query($sqlDelete1);
$sqlDelete2 = "ALTER TABLE datos_medicos AUTO_INCREMENT=1";
$resultado_sqlDelete2 = $conn->query($sqlDelete2);
$sqlDelete3 = "ALTER TABLE integracion AUTO_INCREMENT=1";
$resultado_sqlDelete3 = $conn->query($sqlDelete3);
$sqlDelete4 = "ALTER TABLE referencias AUTO_INCREMENT=1";
$resultado_sqlDelete4 = $conn->query($sqlDelete4);
$sqlDelete5 = "ALTER TABLE vivienda AUTO_INCREMENT=1";
$resultado_sqlDelete5 = $conn->query($sqlDelete5);


$numeroID = $_REQUEST['id'];
$x = 0;

if($numeroID == 1){

//$db1 = "SELECT * FROM Expedientes WHERE ordenExpediente = 500";
$db1 = "SELECT * FROM Expedientes ORDER BY ordenExpediente ASC";
//$db1 = "SELECT * FROM Expedientes ORDER BY RAND() LIMIT 1, 15";
$resultadoDB1 = $conn2->query($db1);

while($rowDB = $resultadoDB1->fetch_assoc()){
    $id = $rowDB['id']; // con este se concatena para datos_generales
    $ordenExpediente = $rowDB['ordenExpediente'];

    if ($ordenExpediente == 0000){
        echo "Num 0000 no agregado";
    }
    else{

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
        
        $annos = edad($fechaNacimiento);
        
        
        $idCatTipoSeguridad = $rowDB['idCatTipoSeguridad']; 

        $dbCatSeguridadSocial = "SELECT * FROM CatTipoSeguridad WHERE id = '$idCatTipoSeguridad'";
        $resultadodbCatSeguridadSocial = $conn2->query($dbCatSeguridadSocial);

        // fotos
        $fotos = "SELECT * FROM EmpleadoCredenciales WHERE idExpediente = '$id'";
        $resultadoFotos = $conn2-> query($fotos);
        $filas = $resultadoFotos->num_rows;

        if($filas > 0){
            $rowFotos= $resultadoFotos -> fetch_assoc();

            $file = ($rowFotos['fotografia']);
            $fichero="../fotos_expedientes/".$curp."_".$folio.".jpg";
            /* $fichero="../fotos_expedientes/".$folio.".jpg"; */
            $foto = $curp."_".$folio.".jpg";
             //$foto = $folio.".jpg";
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
            $seguridadSocial= "Ninguno";
        }
        
        $numeroSeguro = $rowDB['numeroSeguro'];  //numSS
        
        $idEstatusExpediente = $rowDB['idEstatusExpediente']; //se va a agregar a la nueva db creado, finado, baja
        
        $dbCatEstatus = "SELECT * FROM EstatusExpedientes WHERE id = '$idEstatusExpediente'";
        $resultadodbCatEstatus = $conn2->query($dbCatEstatus);
        
        if ($rowdbCatEstatus = $resultadodbCatEstatus-> fetch_assoc()){
            $idEstatusExpediente1 = $rowdbCatEstatus['estatusExpediente'];
            if ($idEstatusExpediente1 == "CREADO"){
                $estatusExp = 1;
            }
            else if ($idEstatusExpediente1 == "FINADO"){
                $estatusExp = 3;
            }
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
        echo $direccion;

        $numeroCasa = $rowDB2['numeroCasa']; // se relaciona con idExpediente
        $numeroInterior = $rowDB2['numeroInterior']; // se relaciona con idExpediente
        $colonia = $rowDB2['colonia']; // se relaciona con idExpediente
        $cp = $rowDB2['cp']; // se relaciona con idExpediente
        $numeroTelefono = $rowDB2['numeroTelefono']; // se relaciona con idExpediente
        $celular = $rowDB2['celular']; // se relaciona con idExpediente
        $correo = $rowDB2['correo']; // se relaciona con idExpediente
        // $referencia = $rowDB2['referencia']; // se relaciona con idExpediente
        $habilidad = $rowDB2['habilidad']; // se relaciona con idExpediente
        $entreVialidades = $rowDB2['entreVialidades']; // se relaciona con idExpediente
        $idTipoVialidad = $rowDB2['idCatTipoVialidad']; // se relaciona con idExpediente
        
        $dbCatTipoVialidad = "SELECT * FROM CatTipoVialidades WHERE id = '$idTipoVialidad'";
        $resultadoTipoVialidad = $conn2->query($dbCatTipoVialidad);
        $rowTipoVialidad = $resultadoTipoVialidad->fetch_assoc();

        $tipoVialidad = $rowTipoVialidad['nombreVialidad'];

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
        $rowDBCatEscolaridad = $resultadodbCatEscolaridad->fetch_assoc();

        $profesion= "";
        $escolaridad= "";

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

        $dbTabEstudioSE = "SELECT * FROM EstudioSocioeconomicos WHERE idExpediente = '$id'";
        $resultadoEstudioSE = $conn2->query($dbTabEstudioSE);
        
        if ($rowdbEstudioSE = $resultadoEstudioSE->fetch_assoc()){
        // estudiossocioeconómico
            $estudia = $rowdbEstudioSE['estudia']; // se relaciona con idExpediente
            if ($estudia == "SI"){
                $estudia = 1;
            }
            else if ($estudia == "NO"){
                $estudia = 0;
            }
            else {
                $estudia = "";
            }
            $lgarEstudio = ""; // se relaciona con idExpediente

            $trabaja = $rowdbEstudioSE['trabaja']; // se relaciona con idExpediente
            if ($trabaja == "SI"){
                $trabaja = 1;
            }
            else if ($trabaja == "NO"){
                $trabaja = 0;
            }
            else {
                $trabaja = "";
            }
            $lugarTrabajo = ""; // se relaciona con idExpediente
            $asociacion = $rowdbEstudioSE['asociacion']; // se relaciona con idExpediente
            if ($asociacion == "SI"){
                $asociacion = 1;
            }
            else if ($asociacion == "NO"){
                $asociacion = 0;
            }
            else {
                $asociacion = "";
            }
            $lugarAsociacion = $rowdbEstudioSE['lugarAsociacion']; // se relaciona con idExpediente
            $sindicato = ""; // se relaciona con idExpediente
            if ($sindicato == "SI"){
                $sindicato = 1;
            }
            else if ($sindicato == "NO"){
                $sindicato = 0;
            }
            else {
                $sindicato = "";
            }
            $lugarSindicato = ""; // se relaciona con idExpediente
            $pensionado = $rowdbEstudioSE['pensionado']; // se relaciona con idExpediente
            if ($pensionado == "SI"){
                $pensionado = 1;
            }
            else if ($pensionado == "NO"){
                $pensionado = 0;
            }
            else {
                $pensionado = "";
            }
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
            $deudas = ""; // se relaciona con idEstudioSocioeconomico
            $montoDeuda = ""; // se relaciona con idEstudioSocioeconomico
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
        $db4 = "SELECT * FROM Discapacidades WHERE idExpediente = '$id'";
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
        echo "<br>nombre de la discapacidad " .$nombreDiscapacidad1;

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

        echo "<br>La clave de discapacidad es: ".$discapacidad;

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
        /* $sqlCatDiscapacidades2 ="SELECT * FROM CatDiscapacidadTipos WHERE id = '$idCatDiscapacidadTipo'";
        $resultCatDisc2 = $conn2->query($sqlCatDiscapacidades2);
        $rowCatDisc2 = $resultCatDisc2->fetch_assoc();
        $idCatDiscapacidadTipoNombre = $rowCatDisc2['tipoDiscapacidad']; */
        
        
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
                $alergia= $rowAlergias['idCatAlergias'].'-'.$rowAlergias2['nombreAlergia'];
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
        }       

        // datos pueba

        $sqlInsert = "INSERT INTO datos_generales (
            id,
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
            edad,
            domicilio,
            no_int,
            no_ext,
            colonia,
            entre_vialidades,
            tipoVialidad,
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
            '$ordenExpediente',
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
            '$annos',
            '$direccion',
            '$numeroInterior',
            '$numeroCasa',
            '$colonia',
            '$entreVialidades', 
            '$tipoVialidad', 
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
        echo "<br>registros completos: ". $x .' ID: '.$id.'-- ORDEN: '.$ordenExpediente.' '.$nombre.$apellidoPaterno.$apellidoMaterno.' '.$fechaNacimiento.'<br>';
        $ordenExpediente2 =  "SELECT * FROM Expedientes WHERE ordenExpediente = $ordenExpediente +1";
        //$db1 = "SELECT * FROM Expedientes ORDER BY RAND() LIMIT 1, 15";
        $resultadoordenExpediente2 = $conn2->query($ordenExpediente2);
        $filasExp = $resultadoordenExpediente2->num_rows;
        //echo $ordenExpediente2 - $ordenExpediente;
        /* if ($filasExp == 0){
            $folio278 = $ordenExpediente + 1;
            $sindatos = "";
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
                    edad,
                    domicilio,
                    no_int,
                    no_ext,
                    colonia,
                    entre_vialidades,
                    tipoVialidad,
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
                    '$folio278',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos', 
                    '$sindatos', 
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos'
                )
                ";
    
            $resultadoSQL = $conn->query($sqlInsert);
            if ($resultadoSQL){
                echo "datos generales insertados <br>";
            }
            else {
                echo "error al insertar datos generales";
            }

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
                    '$sindatos',
                    '$folio278',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos',
                    '$sindatos', 
                    '$sindatos', 
                    '$sindatos', 
                    '$sindatos',
                    '$sindatos'
                )
                ";
            $resultadoDatosMedicos = $conn->query($sqlInsertDMedicos);
            if ($resultadoDatosMedicos){
                echo "datos medicos insertados <br>";
            }
            else {
                echo "error al insertar datos medicos";
            }

            $sqlESInsert = "INSERT INTO vivienda(
                curp,
                expediente,
                vivienda,
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
                electrodomesticos_otro,
                personas_dependen,
                deudas,
                deudas_cuanto
                ) 
                VALUES (
                '$sindatos',
                '$folio278',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos',
                '$sindatos'
                )
            ";

            $resultadoSQLVivienda = $conn->query($sqlESInsert);
            if ($resultadoSQLVivienda){
                echo "datos vivienda insertados <br>";
            }
            else {
                echo "error al insertar datos vivienda";
            }
        } */
    }
    else{
        $error = $conn2->error;
        $error1 = $conn->error;

        echo '<br> error 1 '. $error.'<br>';
        echo 'error 2 '. $error1.'<br>';
    }

        $sqlInsertDMedicos = "INSERT INTO datos_medicos (
            id,
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
            '$ordenExpediente',
            '$curp',
            '$folio',
            '$idTipoSangre',
            '$grado',
            '$temporalidad',
            '$valoracionInst',
            '$idCatCausa',
            /* '$idCatDiscapacidad', */
            '$discapacidad',
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
    
        // vivienda
        $sqlEstudioSoc = "SELECT * FROM EstudioSocioeconomicos WHERE idExpediente = '$id'";
        $resultadoESoc = $conn2->query($sqlEstudioSoc);
        
        if ($resultadoESoc ->num_rows > 0){

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
        $dispositivo = 0;
        $microondas = 0;
        $computadora = 0;
        $licuadora = 0;
        $estufa = 0;
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
                $dispositivo = 1;
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
            else if($VarElectro == 8){
                $estufa = 1;
            }
            else if($VarElectro == 9){
                $otros_electrodomesticos = 1;
            }

        }
        // variables de vivienda, usar solo los id's

        if ($idCatVivienda == 1){
            $vivienda = 1;
        }
        else if ($idCatVivienda == 2){
            $vivienda = 2;
        }
        else if ($idCatVivienda == 5){
            $vivienda = 3;
        }
        else {
            $vivienda = "";
        }


        $idVivienda = $rowViviendas['id'];
        $NumHabitaciones = $rowViviendas['numeroHabitaciones'];
        $NumPersonas = $rowViviendas['numeroPersonas'];
        $pagoVivienda = 0;
        $valorVivienda = $rowViviendas['valorVivienda'];

        $idTecho = $rowTecho['id'];
        $techo = $rowTecho['nombreTecho'];
        $techo_otro = 0;

        $idPared = $rowPared['id'];
        $pared = $rowPared['nombrePared'];
        $pared_otro = 0;

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
            id,
            curp,
            expediente,
            vivienda,
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
            electrodomesticos_otro,
            personas_dependen,
            deudas,
            deudas_cuanto
            ) VALUES(
            '$ordenExpediente',
            '$curp',
            '$folio',
            '$idCatVivienda',
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
            '$internet',
            '$celularServ',
            '$carro',
            '$gas',
            '$telefono',
            '$serv_basicos_otro',
            '$television',
            '$lavadora',
            '$dispositivo',
            '$microondas',
            '$computadora',
            '$licuadora',
            '$estufa',
            '$otros_electrodomesticos',
            '$NumPersonas',
            '$deudas',
            '$montoDeuda'
            
            )
            ";

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
        }
        // integración familiar

        $sqlIntegracion = "SELECT * FROM Familiares WHERE idExpediente = '$id'";
        $resultInt = $conn2->query($sqlIntegracion);

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

                $errorInt2 = $conn2->error;
                echo $errorInt2;
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
                echo "Referencias correcta <br><br>";
            }
            else{
                $errorReferencias = $conn->error;
                echo $errorReferencias;
            }
        }

        /* // de solicitudes a servicios

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
        } */
        

        // $resultadoSQLVivienda = $conn->query($sqlESInsert);
        // if ($resultadoSQLVivienda){
        //     $x++;
        //     echo "registros completos Vivienda <br>";
        // }
        // else{
        //     $errorV = $conn2->error;
        //     $error1V = $conn->error;

        //     echo $errorV;
        //     echo $error1V;

        //     echo 'error vivienda 1 '. $$errorV.'<br>';
        //     echo 'error vivienda 2 '. $error1V.'<br>';
        // }

        // $resultadoSQL = $conn->query($sqlInsert);
        // if ($resultadoSQL){
        //     $x++;
        //     echo "registros completos: ". $x .' ID: '.$id.'-- ORDEN: '.$ordenExpediente.' '.$nombre.$apellidoPaterno.$apellidoMaterno.' '.$fechaNacimiento.'<br>';
        // }
        // else{
        //     $error = $conn2->error;
        //     $error1 = $conn->error;

        //     echo '<br> error 1 '. $error.'<br>';
        //     echo 'error 2 '. $error1.'<br>';
        // }
        
        

        /* $row = $result->fetch_assoc();

        $missing_id = $row['start'];
        $arrayMissingId[] = $missing_id;
        $missing_id = $missing_id + 1; */
        
        
    
        

        }// fin del while

    } // fin del if 0000

    /* foreach ($arrayMissingId as $missingIds){
        
    } */

}// fin id request


        $missing278 = "SELECT * FROM datos_generales ORDER BY id ASC";
    
        $resultMissing = $conn->query($missing278);
        while($rowsMMM = $resultMissing->fetch_assoc()){

            $idChange = $rowsMMM['id'];
            $idChange2 = $idChange + 1;

            $missing278_ = "SELECT * FROM datos_generales WHERE id = '$idChange2'";
            $resultMissing2 = $conn->query($missing278_);

            $fila278 = $resultMissing2->num_rows;
            echo "<br> ID FILA  ".$idChange2."<br>";
            if ($fila278 == 1){
                echo "Si hay filas";
            }
            else {
                $sindatos = "0";

                $sqlInsertDG1 = "INSERT INTO datos_generales (
                        id,
                        numExpediente
                    )
                    VALUES (
                        '$idChange2',
                        '$idChange2'
                    )
                ";
                $resultadoSQLNulo = $conn->query($sqlInsertDG1);
                if ($resultadoSQLNulo){
                    echo "<br>datos generales, id insertado '.$idChange2.' nulos insertados <br>";
                }
                else {
                    echo "error al insertar datos generales nulos <br>";

                    $error = $conn->error;
                    echo $error;
                }    
            }
        } //FIN DEL WHILE PARA INSERTAR 278

        $eliminarUltimo = "DELETE FROM datos_generales ORDER BY id DESC LIMIT 1";
        $resultadoEliminar = $conn->query($eliminarUltimo);
        if ($resultadoEliminar){
            echo "<br>datos generales, id eliminado <br>";
            $lastId = "SELECT MAX(id) AS last FROM datos_generales";
            $resultLastId = $conn->query($lastId);
            $rowLastId = $resultLastId->fetch_assoc();
            $lastId = $rowLastId['last']+1;

            $decrementa = "ALTER TABLE datos_generales ALTER id SET DEFAULT '$lastId'";
            $resultadoDecrementa = $conn->query($decrementa);
            if ($resultadoDecrementa){
                echo "<br>datos generales, id alterado <br>";
            }
            else {
                echo "error al alterar datos generales <br>";
            }
        }
        else {
            echo "error al eliminar datos generales <br>";
        }


?>
