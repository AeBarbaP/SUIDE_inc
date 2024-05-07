<?php
include('../prcd/qc/qc.php');

if ($_POST['expediente'] == 0 || $_POST['expediente'] == null ||$_POST['expediente'] == ""){
  $tipoSangre = "";
  $tipoSangre2 = "";
  echo '
      <script>
      folioTarjetonBloqueado();
      </script>
  ';
}
else{

    $expediente = $_POST['expediente'];
    
    //header("content-type: image/jpeg");

    // Detalles del expediente
    $QueryExpediente = "SELECT * FROM datos_generales WHERE numExpediente LIKE '%$expediente'";
    $resultado_QueryExpediente = $conn->query($QueryExpediente);
    $row_sql_expediente = $resultado_QueryExpediente->fetch_assoc();
    $filasExpediente = $resultado_QueryExpediente->num_rows;

    if($filasExpediente >= 1) {
    
      $nombreExp = $row_sql_expediente['nombre'];
      $idExp = $row_sql_expediente['id'];
      $apellidoPaterno = $row_sql_expediente['apellido_p'];
      $apellidoMaterno = $row_sql_expediente['apellido_m'];
      $folio = $row_sql_expediente['numExpediente'];
      $curp = $row_sql_expediente['curp'];
      
      //Discapacidad
      $QueryDiscapacidad = "SELECT * FROM datos_medicos WHERE curp = '$curp'";
      $resultado_QueryDiscapacidad = $conn->query($QueryDiscapacidad);
      $row_QueryDiscapacidad = $resultado_QueryDiscapacidad->fetch_assoc();
      $discapacidad = $row_QueryDiscapacidad['discapacidad'];


      $queryTarjeton ="SELECT * FROM tarjetones WHERE curp = '$curp'";
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
      $vigencia = "";
      
      echo '
      <script>
      desbloquearInputsT('.$filasTarjeton.');
      
          folioTarjetonNegativo();
          limpiarInputsVehiculo();
        </script>
      ';
    }

      if (!is_null($curp) || $curp != 0){
        $curpShow = $curp;
      }
      else {
        $curpShow = ' CURP no registrada';
      }
      
      echo'

        <div>
          <h5 class="card-title mt-3">'.$nombreExp.' '.$apellidoPaterno.' '.$apellidoMaterno.'</h5>
          <label class="card-text">Tipo Discapacidad: </label><label>'.$discapacidad.'</label>
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
          <input type="text" id="ordenExpediente" value="'.$expediente.'" hidden> 
        </div>
        
      ';
    }
    else{
      echo'
      <div>
        <input type="text" id="curpTarjeton" value="0" hidden>
      </div>
      <script>
        alert("No se encontró el registro");
      </scrip>';
    }
}
?>