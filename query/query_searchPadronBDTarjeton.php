<?php
include('../prcd/qc/qc2.php');
include('../prcd/qc/qc.php');

if ($_POST['expediente'] == 0){
  $tipoSangre = "";
  $tipoSangre2 = "";
}
else{

    $expediente = $_POST['expediente'];
    header("content-type: image/jpeg");

    $queryTarjeton ="SELECT * FROM tarjetones WHERE numExpediente = '$expediente'";
    $resultadoTarjeton = $conn -> query($queryTarjeton);
    $filasTarjeton = $resultadoTarjeton->num_rows;

    if($filasTarjeton > 0){
      $rowTarjeton = $resultadoTarjeton->fetch_assoc();
      $tarjeton = $rowTarjeton['folio_tarjeton'];
      $vigencia = $rowTarjeton['vigencia'];
      echo '
      <script>
        folioTarjetonPositivo();
      </script>
      ';
    }
    else{
      $tarjeton = "No hay tarjetón registrado";
/*       echo '
      <script>
      folioTarjetonNegativo();
      </script>
      '; */
    }


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

        <div>
          <h5 class="card-title mt-3">'.$nombreExp.' '.$apellidoPaterno.' '.$apellidoMaterno.'</h5>
          <label class="card-text">Tipo Discapacidad: </label><label>'.$discapacidad2.'</label>
          <br>
          <label class="card-text">Número de Expediente:</label><label id="numExpediente">'.$folio.'</label>
          <br>
          <label class="card-text">CURP: </label><label id="curpShows">'.$curpShow.'</label>
          <br>
          <label class="card-text">Tarjetón asignado: </label><label id="tarjetonShows">'.$tarjeton.'</label>
          
          <input type="text" id="folioTarjeton" value="'.$tarjeton.'" hidden>
          <input type="text" id="vigenciaTarjeton" value="'.$vigencia.'" hidden>
          <input type="text" id="numExpediente1" value="'.$folio.'" hidden> 
          <input type="text" id="curpTarjeton" value="'.$curpShow.'" hidden> 
        </div>

      ';
    }
    else{
      echo'
      <script>
        alert("No se encontró el registro");
      </>';
    }
}