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


    $nombreExp = $row_sql_expediente['nombre'];
    $apellidoPaterno = $row_sql_expediente['apellidoPaterno'];
    $apellidoMaterno = $row_sql_expediente['apellidoMaterno'];
    // $tipoDiscap = $row_sql_expediente[''];
    $curp = $row_sql_expediente['curp'];
    $direccion = $row_QueryDireccion['direccion'];
    $numeroCasa = $row_QueryDireccion['numeroCasa'];
    $numeroInterior = $row_QueryDireccion['numeroInterior'];
    $colonia = $row_QueryDireccion['colonia'];
    $cp = $row_QueryDireccion['cp'];
    
    if($resultado_QueryExpediente){
      echo'
      <h5 class="card-title mt-3">Nombre Completo '.$nombreExp.' '.$apellidoPaterno.' '.$apellidoMaterno.'</h5>
      <p class="card-text">Tipo Discapacidad: '.$nombreExp.'</p>
      <p class="card-text">CURP: '.$curp.'</p>
      <p class="card-text">Domicilio:<br>Calle y no.: '.$direccion.'; '.$numeroCasa.'; '.$numeroInterior.'<br>Colonia: '.$colonia.'<br>C.P.: '.$cp.'</p>
      ';
    }
    else{
      echo'
      <script>
      alert("No se encontró el registro");
      </script>';
    }