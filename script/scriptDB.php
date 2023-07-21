<?php
include('../prcd/qc/qc.php');
include('../prcd/qc/qc2.php');

$db1 = "SELECT * FROM expedientes";
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

    $rowDB['id']; // con este se concatena para datos_generales


$sqlInsert = "INSERT INTO datos_generales Values"

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



$sqlInsert = "INSERT INTO datos_generales Values"


// INNER JOIN con datos_medicos, aleggias, efenrmedades, medicamentos, discapacidades

// VIVIENDA

// FOTOS se ligan con el idExpediente mantener el idExpediente 
// script_fotos.php

}





?>