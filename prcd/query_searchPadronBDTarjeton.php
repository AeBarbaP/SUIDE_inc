<?php
include('qc/qc2.php');

$expediente = $_POST['expediente'];
header("content-type: image/jpeg");

  // Detalles del expediente
    $QueryExpediente = "SELECT * FROM expedientes WHERE ordenExpediente = '$expediente'";
    $resultado_QueryExpediente = $conn2->query($QueryExpediente);
    $row_sql_expediente = $resultado_QueryExpediente->fetch_assoc();

    $nombreExp = $row_sql_expediente['nombre'];
    $idExp = $row_sql_expediente['id'];
    $apellidoPaterno = $row_sql_expediente['apellidoPaterno'];
    $apellidoMaterno = $row_sql_expediente['apellidoMaterno'];
    $folio = $row_sql_expediente['folio'];
    
    //Discapacidad
    $QueryDiscapacidad = "SELECT * FROM discapacidades WHERE idExpediente = '$idExp'";
    $resultado_QueryDiscapacidad = $conn2->query($QueryDiscapacidad);
    $row_QueryDiscapacidad = $resultado_QueryDiscapacidad->fetch_assoc();
    $discapacidad = $row_QueryDiscapacidad['idCatDiscapacidad'];

    $QueryDiscapacidad2 = "SELECT * FROM catdiscapacidades WHERE id = '$discapacidad'";
    $resultado_QueryDiscapacidad2 = $conn2->query($QueryDiscapacidad2);
    $row_QueryDiscapacidad2 = $resultado_QueryDiscapacidad2->fetch_assoc();
    $discapacidad2 = $row_QueryDiscapacidad2['nombreDiscapacidad'];

 

    if($resultado_QueryExpediente){

      echo'

        <div >
          <h5 class="card-title mt-3">'.$nombreExp.' '.$apellidoPaterno.' '.$apellidoMaterno.'</h5>
          <p class="card-text">Tipo Discapacidad: '.$discapacidad2.'</p>
          <p class="card-text">Número de Expediente: '.$folio.'</p>

      ';
    }
    else{
      echo'
      <script>
        alert("No se encontró el registro");
      </script>';
    }