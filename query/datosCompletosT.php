<?php
include('../prcd/qc/qc.php');

$curp = $_POST['curp2'];
$folio = $_POST['folioTarjeton'];

//substr($expediente,6,5);

$sql = "SELECT * FROM tarjetones WHERE curp LIKE '%$curp%' LIMIT 1";
$resultadoSql = $conn->query($sql);
$rowDatos = $resultadoSql->fetch_assoc();
//datos usuario temporal
$sqlUsuario = "SELECT * FROM datos_usuariot WHERE curp LIKE '%$curp%'";
$resultadoSqlUsuario = $conn->query($sqlUsuario);
$rowDatosUsuario = $resultadoSqlUsuario->fetch_assoc();


    $folioTarjeton = $rowDatos['folio_tarjeton'];
    $vigencia = $rowDatos['vigencia'];
    $nombre = $rowDatosUsuario['nombre'];
    $apellido_p = $rowDatosUsuario['apellido_p'];
    $apellido_m = $rowDatosUsuario['apellido_m'];
    $curp = $rowDatosUsuario['curp'];

    
    if ($curp == "" || $curp == null){
        $curp2 = "Sin CURP";
    }
    else {
        $curp2 = $curp;
    }
    
    echo json_encode(array(
        'success'=>1,
        'curp'=>$curp2,
        'folioTarjeton'=>$folioTarjeton,
        'nombre'=>$nombre,
        'vigencia'=>$vigencia,
        'apellido_p'=>$apellido_p,
        'apellido_m'=>$apellido_m,
        'edad'=>$rowDatosUsuario['edad'], 
        'sexo'=>$rowDatosUsuario['sexo'], 
        'cve_id_ine'=>$rowDatosUsuario['cve_id_ine'], 
        'telefono'=>$rowDatosUsuario['telefono'], 
        'correo'=>$rowDatosUsuario['correo'], 
        'calle'=>$rowDatosUsuario['calle'], 
        'no_ext'=>$rowDatosUsuario['no_ext'], 
        'no_int'=>$rowDatosUsuario['no_int'], 
        'colonia'=>$rowDatosUsuario['colonia'], 
        'cp'=>$rowDatosUsuario['cp'],
        'estado'=>$rowDatosUsuario['estado'], 
        'municipio'=>$rowDatosUsuario['municipio'], 
        'localidad'=>$rowDatosUsuario['localidad'],  
        'tipo_discapacidad'=>$rowDatosUsuario['tipo_discapacidad'], 
        'discapacidad'=>$rowDatosUsuario['discapacidad'], 
        'grado_discapacidad'=>$rowDatosUsuario['grado_discapacidad'], 
        'descripcionDiscapacidad'=>$rowDatosUsuario['dx_discapacidad'], 
        'causa'=>$rowDatosUsuario['causa'],
        'causa_otro'=>$rowDatosUsuario['causa_otro'], 
        'temporalidad'=>$rowDatosUsuario['temporalidad'], 
        'valoracion'=>$rowDatosUsuario['institucion_val'], 
        'medico'=>$rowDatosUsuario['medico'], 
        'cedula'=>$rowDatosUsuario['cedula'], 
        'fecha_valoracion'=>$rowDatosUsuario['fecha_valoracion'],
    ));