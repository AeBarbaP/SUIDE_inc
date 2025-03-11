<?php
include('../prcd/qc/qc.php');
include('../prcd/qc/qc2.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$hoyX = strtotime("%Y-%m-%d");

/* $files = glob('../fotos_expedientes/*.jpg'); //obtenemos todos los nombres de los ficheros
foreach($files as $file){
    if(is_file($file))
    unlink($file); //elimino el fichero
echo "eliminado";
} */

/* $limpiar = "DELETE FROM datos_generales";
$resultado = $conn->query($limpiar);

if ($resultado){
    echo "datos generales eliminados <br><hr>";
}
else {
    echo "error al limpiar datos generales";
} */

function edad($fechaNacimiento){
    $nacimiento = new DateTime($fechaNacimiento);
    $ahora = new DateTime(date("Y-m-d"));
    $diferencia = $ahora->diff($nacimiento);
    return $diferencia->format("%y");
}


$numeroID = $_REQUEST['id'];
$x = 0;

if($numeroID == 1){

    $sqlGenerales = "SELECT * FROM datos_generales";
    $resultadosqlGenerales = $conn->query($sqlGenerales);

    while($row = $resultadosqlGenerales->fetch_assoc()){
        $expediente = $row['numExpediente'];
        echo $expediente;
        $id = $row['id'];
        $id2 = $row['id'];

        if (strlen($id) == 3){
            $id = "0".$id;
            $longitud = 4;
        }
        else if (strlen($id) == 2){
            $id = "00".$id;
            $longitud = 4;
        }
        else if (strlen($id) == 1){
            $id = "000".$id;
            $longitud = 4;
        }
        else {
            $id = $id;
            $longitud = 5;
        }
        
        $numExp = trim(substr($expediente, strrpos($expediente, '-', $longitud)), "-");
        
        echo "Expediente ".$expediente." con id ".$id2." y consecutivo ".$numExp." encontrado";
        
        if ($numExp == $id){
            echo " bien ". $numExp ."<br>";
        } else {
            echo " mal<br>";
            $sqlDB = "SELECT * FROM Expedientes WHERE ordenExpediente = '$id2'";
            $resultadoSqlDB = $conn2->query($sqlDB);
            $rowDB = $resultadoSqlDB->fetch_assoc();

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
            
            $dbCatEstatus = "SELECT * FROM estatusexpedientes WHERE id = '$idEstatusExpediente'";
            $resultadodbCatEstatus = $conn2->query($dbCatEstatus);
            
            if ($rowdbCatEstatus = $resultadodbCatEstatus-> fetch_assoc()){
                $idEstatusExpediente1 = $rowdbCatEstatus['estatusExpediente'];
                if ($idEstatusExpediente1 == "CREADO"){
                    $estatusExp = 1;
                }
                else if ($idEstatusExpediente1 == "FINADO"){
                    $estatusExp = 2;
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
            /* echo $direccion; */
    
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
            $sqlUpdate = "UPDATE datos_generales SET 
                numExpediente = '$folio',
                fecha_registro = '$fechaIngreso',
                photo = '$foto',
                nombre = '$nombre',
                apellido_p = '$apellidoPaterno',
                apellido_m = '$apellidoMaterno',
                genero = '$sexo',
                edo_civil = '$estadocivil',
                f_nacimiento = '$fechaNacimiento',
                lugar_nacimiento = '$lugarNacimiento',
                edad = '$annos',
                domicilio = '$direccion',
                no_int = '$numeroInterior',
                no_ext = '$numeroCasa',
                colonia = '$colonia',
                entre_vialidades = '$entreVialidades',
                tipoVialidad = '$tipoVialidad',
                estado = '$estado',
                municipio = '$claveMunicipio',
                localidad = '$localidad',
                asentamiento = '$asentamiento',
                cp = '$cp',
                telefono_part = '$numeroTelefono',
                correo = '$correo',
                telefono_cel = '$celular',
                escolaridad = '$escolaridad',
                profesion = '$profesion',
                curp = '$curp',
                rfc = '$rfc',
                estudia = '$estudia',
                estudia_donde = '$lgarEstudio',
                estudia_habilidad = '$habilidad',
                trabaja = '$trabaja',
                trabaja_donde = '$lugarTrabajo',
                trabaja_ingresos = '$IngresoMensual',
                asoc_civ = '$asociacion',
                asoc_cual = '$lugarAsociacion',
                pensionado = '$pensionado',
                pensionado_donde = '$lugarPension',
                pension_monto = '$montoPension',
                seguridad_social = '$seguridadSocial',
                numSS = '$numeroSeguro',
                estatus = '$estatusExp'
            WHERE id = '$id2'";
            if ($conn->query($sqlUpdate)){
                echo "Datos generales del expediente ".$expediente." actualizados correctamente.";
            }
            else{
                echo "Error al actualizar los datos generales del expediente ".$expediente.": ". $conn->error ."<br>";
            }
        }
    }
}