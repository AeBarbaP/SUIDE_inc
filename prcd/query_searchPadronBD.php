<?php
include('qc/qc2.php');

$expediente = $_POST['expediente'];

  // Detalles del expediente
    $QueryExpediente = "SELECT * FROM expedientes WHERE ordenExpediente = '$expediente'";
    $resultado_QueryExpediente = $conn2->query($QueryExpediente);
    $row_sql_expediente = $resultado_QueryExpediente->fetch_assoc();

  // Dirección
    $QueryDireccion = "SELECT * FROM detalleexpedientes WHERE idExpediente = '$expediente'";
    $resultado_QueryDireccion = $conn2->query($QueryDireccion);
    $row_QueryDireccion = $resultado_QueryDireccion->fetch_assoc();

  //Datos Médicos
  $QueryDatosMedicos = "SELECT * FROM datosmedicos WHERE idExpediente = '$expediente'";
  $resultado_QueryDatosMedicos = $conn2->query($QueryDatosMedicos);
  $row_QueryDatosMedicos = $resultado_QueryDatosMedicos->fetch_assoc();

  //Discapacidad
  $QueryDiscapacidad = "SELECT * FROM discapacidades WHERE idExpediente = '$expediente'";
  $resultado_QueryDiscapacidad = $conn2->query($QueryDiscapacidad);
  $row_QueryDiscapacidad = $resultado_QueryDiscapacidad->fetch_assoc();

    $nombreExp = $row_sql_expediente['nombre'];
    $idExp = $row_sql_expediente['id'];
    $apellidoPaterno = $row_sql_expediente['apellidoPaterno'];
    $apellidoMaterno = $row_sql_expediente['apellidoMaterno'];
  //  $tipoDiscap = $row_QueryDiscapacidad[''];
    $curp = $row_sql_expediente['curp'];
    $direccion = $row_QueryDireccion['direccion'];
    $numeroCasa = $row_QueryDireccion['numeroCasa'];
    $numeroInterior = $row_QueryDireccion['numeroInterior'];
    $colonia = $row_QueryDireccion['colonia'];
    $municipio = $row_QueryDireccion['idCatMunicipio'];
    $localidad = $row_QueryDireccion['idCatLocalidad'];
    $cp = $row_QueryDireccion['cp'];
    //$tipoSangre = $row_QueryDireccion['tipoSangre'];
    //$alergias = $row_QueryDireccion['alergias'];

    $QueryMunicipio = "SELECT * FROM catmunicipios WHERE id = '$municipio'";
    $resultado_QueryMunicipio = $conn2->query($QueryMunicipio);
    $row_QueryMunicipio = $resultado_QueryMunicipio->fetch_assoc();
    $municipio2 = $row_QueryMunicipio['nombreMunicipio'];
    $estado = $row_QueryMunicipio['idCatEstado'];

    $QueryEstado = "SELECT * FROM catestados WHERE id = '$estado'";
    $resultado_QueryEstado = $conn2->query($QueryEstado);
    $row_QueryEstado = $resultado_QueryEstado->fetch_assoc();
    $estado2 = $row_QueryEstado['nombreEstado'];

    $QueryLocalidad = "SELECT * FROM catlocalidades WHERE id = '$localidad'";
    $resultado_QueryLocalidad = $conn2->query($QueryLocalidad);
    $row_QueryLocalidad = $resultado_QueryLocalidad->fetch_assoc();
    $localidad2 = $row_QueryLocalidad['nombreLocalidad'];
    
    $QueryImagen = "SELECT * FROM empleadocredenciales WHERE idExpediente = '$idExp'";
    $resultado_QueryImagen = $conn2->query($QueryImagen);
    $row_QueryImagen = $resultado_QueryImagen->fetch_assoc();
    //$imagen = $row_QueryImagen['fotografia'];

    if($resultado_QueryExpediente){
      echo'
      <h5 class="card-title mt-3">'.$nombreExp.' '.$apellidoPaterno.' '.$apellidoMaterno.'</h5>
      <p class="card-text">Tipo Discapacidad: '.$nombreExp.'</p>
      <p class="card-text">CURP: '.$curp.'</p>
      <p class="card-text">Domicilio:'.$direccion.'; '.$numeroCasa.'; '.$numeroInterior.'<br>Colonia: '.$colonia.'<br>Localidad: '.$localidad2.'<br>Municipio: '.$municipio2.'<br>Estado: '.$estado2.'<br>C.P.: '.$cp.'</p>
      <p>'.$row_QueryImagen['id'].'</p>
      <p>'.$idExp.'</p>
      <p><img width="100%" src="data:image/jpeg;base64,'.base64_encode($row_QueryImagen['fotografia']).'">
      ';
    }
    else{
      echo'
      <script>
        alert("No se encontró el registro");
      </script>';
    }