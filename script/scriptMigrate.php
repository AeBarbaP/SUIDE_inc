<?php
include('../prcd/qc/qc.php');
include('../prcd/qc/qc2.php');


$db1 = "SELECT * FROM expedientes ORDER BY ordenExpediente";
$resultadoDB1 = $conn2->query($db1);

while($rowDB = $resultadoDB1->fetch_assoc()){
    $id = $rowDB['id']; // con este se concatena para datos_generales
    $ordenExpediente = $rowDB['ordenExpediente'];

    // DATOS MÉDICOS de la anterior es datosmedicos
    $db2 = "SELECT * FROM datosmedicos";
    $resultadoDB2 = $conn2->query($db2);
    
    if ($rowDB2 = $resultadoDB2->fetch_assoc()){
        // datosMedicos
        $cirugia = $rowDB['cirugia']; // se relaciona con idExpediente
        $tipoCirugia = $rowDB['tipoCirugia']; // se relaciona con idExpediente
        $idTipoSangre = $rowDB['idTipoSangre']; // se relaciona con idExpediente
    }
    else {
        $cirugia = ""; // se relaciona con idExpediente
        $tipoCirugia = ""; // se relaciona con idExpediente
        $idTipoSangre = ""; // se relaciona con idExpediente
    }
    
    // discapacidades

    $db3 = "SELECT * FROM discapacidades WHERE idExpediente = '$id'";
    $resultadoDB3 = $conn2->query($db3);
    
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
/* // INTEGRACIÓN FAMILIAR
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
 */




?>