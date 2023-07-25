<?php
include('../prcd/qc/qc2.php');

if ($_POST['expediente'] == 0){
  $tipoSangre = "";
  $tipoSangre2 = "";
}
else{

    $expediente = $_POST['expediente'];
    header("content-type: image/jpeg");

    // Detalles del expediente
    $QueryExpediente = "SELECT * FROM expedientes WHERE ordenExpediente = '$expediente'";
    $resultado_QueryExpediente = $conn2->query($QueryExpediente);
    $row_sql_expediente = $resultado_QueryExpediente->fetch_assoc();

    if($resultado_QueryExpediente){
    
    $nombreExp = $row_sql_expediente['nombre'];
    $idExp = $row_sql_expediente['id'];
    $apellidoPaterno = $row_sql_expediente['apellidoPaterno'];
    $apellidoMaterno = $row_sql_expediente['apellidoMaterno'];
    $folio = $row_sql_expediente['folio'];
    $curp = $row_sql_expediente['curp'];
    
    //Discapacidad
    $QueryDiscapacidad = "SELECT * FROM discapacidades WHERE idExpediente = '$idExp'";
    $resultado_QueryDiscapacidad = $conn2->query($QueryDiscapacidad);
    $row_QueryDiscapacidad = $resultado_QueryDiscapacidad->fetch_assoc();
    $discapacidad = $row_QueryDiscapacidad['idCatDiscapacidad'];

    $QueryDiscapacidad2 = "SELECT * FROM catdiscapacidades WHERE id = '$discapacidad'";
    $resultado_QueryDiscapacidad2 = $conn2->query($QueryDiscapacidad2);
    $row_QueryDiscapacidad2 = $resultado_QueryDiscapacidad2->fetch_assoc();
    $discapacidad2 = $row_QueryDiscapacidad2['nombreDiscapacidad'];

      if ($curp != null || $curp != 0){
        $curpShow = $curp;
      }
      else {
        $curpShow = ' CURP no registrada';
      }
      
      echo'

        <div >
          <h5 class="card-title mt-3">'.$nombreExp.' '.$apellidoPaterno.' '.$apellidoMaterno.'</h5>
          <label class="card-text">Tipo Discapacidad: </label><label>'.$discapacidad2.'</label>
          <br>
          <label class="card-text">Número de Expediente:</label><label id="numExpediente">'.$folio.'</label>
          <br>
          <label class="card-text">CURP:</label><label id="curpShows">'.$curpShow.'</label>

      ';
    }
    else{
      echo'
      <script>
        alert("No se encontró el registro");
      </script>';
    }
}