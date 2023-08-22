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

    if ($resultado_QueryExpediente){

       // Dirección
      $QueryDireccion = "SELECT * FROM detalleexpedientes WHERE idExpediente = '$expediente'";
      $resultado_QueryDireccion = $conn2->query($QueryDireccion);
      $row_QueryDireccion = $resultado_QueryDireccion->fetch_assoc();

      //Datos Médicos
      $QueryDatosMedicos = "SELECT * FROM datosmedicos WHERE idExpediente = '$expediente'";
      $resultado_QueryDatosMedicos = $conn2->query($QueryDatosMedicos);
      $row_QueryDatosMedicos = $resultado_QueryDatosMedicos->fetch_assoc();
      $tipoSangre = $row_QueryDatosMedicos['idTipoSangre'];

      $QueryDatosMedicos2 = "SELECT * FROM tiposangres WHERE id = '$tipoSangre'";
      $resultado_QueryDatosMedicos2 = $conn2->query($QueryDatosMedicos2);
      $row_QueryDatosMedicos2 = $resultado_QueryDatosMedicos2->fetch_assoc();
      $tipoSangre2 = $row_QueryDatosMedicos2['nombreSangre'];

      $nombreExp = $row_sql_expediente['nombre'];
      $idExp = $row_sql_expediente['id'];
      $apellidoPaterno = $row_sql_expediente['apellidoPaterno'];
      $apellidoMaterno = $row_sql_expediente['apellidoMaterno'];
      $curp = $row_sql_expediente['curp'];
      $direccion = $row_QueryDireccion['direccion'];
      $numeroCasa = $row_QueryDireccion['numeroCasa'];
      $numeroInterior = $row_QueryDireccion['numeroInterior'];
      $colonia = $row_QueryDireccion['colonia'];
      $municipio = $row_QueryDireccion['idCatMunicipio'];
      $localidad = $row_QueryDireccion['idCatLocalidad'];
      $telefono = $row_QueryDireccion['numeroTelefono'];
      $celular = $row_QueryDireccion['celular'];
      $cp = $row_QueryDireccion['cp'];
      $folio = $row_sql_expediente['folio'];

      if ($telefono == null || $telefono == ""){
        if ($celular == null || $celular == ""){
          $telefonoCel = "Sin teléfono registrado";
        }
        else{
          $telefonoCel = $celular;
        }
      }
      else {
        $telefonoCel = $telefono;
      }
      

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

      $QueryDatosMedicos3 = "SELECT * FROM datosmedicos WHERE id = '$idExp'";
      $resultado_QueryDatosMedicos3 = $conn2->query($QueryDatosMedicos3);
      $row_QueryDatosMedicos3 = $resultado_QueryDatosMedicos3->fetch_assoc();
      if (isset($row_QueryDatosMedicos3['id'])){
        $alergias = $row_QueryDatosMedicos3['id'];
      }
      else {
        $alergias = "";
      }

      if (isset($alergias)){
        $QueryDatosAlergias = "SELECT * FROM alergias WHERE idDatosMedico = '$alergias'";
        $resultado_QueryDatosAlergias = $conn2->query($QueryDatosAlergias);
        $row_QueryDatosAlergias = $resultado_QueryDatosAlergias->fetch_assoc();
        if (isset($row_QueryDatosAlergias['idCatAlergia'])){
          $alergias2 = $row_QueryDatosAlergias['idCatAlergia'];
        }
        else {
          $alergias2 = "";
        }
      }

      if (isset($alergias2)){
        $QueryDatosAlergias = "SELECT * FROM alergias WHERE idCatAlergia = '$alergias2'";
        $resultado_QueryDatosAlergias = $conn2->query($QueryDatosAlergias);
        $row_QueryDatosAlergias = $resultado_QueryDatosAlergias->fetch_assoc();
        if (isset($row_QueryDatosAlergias['nombreAlergia'])){
          $alergias3 = $row_QueryDatosAlergias['nombreAlergia'];
        }
        else {
          $alergias3 = "Sin Alergias";
        }
      }
      
      
      //Discapacidad
      $QueryDiscapacidad = "SELECT * FROM discapacidades WHERE idExpediente = '$idExp'";
      $resultado_QueryDiscapacidad = $conn2->query($QueryDiscapacidad);
      $row_QueryDiscapacidad = $resultado_QueryDiscapacidad->fetch_assoc();
      $discapacidad = $row_QueryDiscapacidad['idCatDiscapacidad'];

      $QueryDiscapacidad2 = "SELECT * FROM catdiscapacidades WHERE id = '$discapacidad'";
      $resultado_QueryDiscapacidad2 = $conn2->query($QueryDiscapacidad2);
      $row_QueryDiscapacidad2 = $resultado_QueryDiscapacidad2->fetch_assoc();
      $discapacidad2 = $row_QueryDiscapacidad2['nombreDiscapacidad'];

      $QueryImagen = "SELECT * FROM empleadocredenciales WHERE idExpediente = '$idExp'";
      $resultado_QueryImagen = $conn2->query($QueryImagen);
      $row_QueryImagen = $resultado_QueryImagen->fetch_assoc();
      
      if($resultado_QueryImagen){
        $filaA = $resultado_QueryImagen -> num_rows;
        if ($filaA == 1){
          $foto = base64_encode($row_QueryImagen['fotografia']);
          echo '
          <div class="col-md-4">';
          if(isset($foto)){
            echo'
            <img width="100%" src="data:image/jpg;base64,'.base64_encode($row_QueryImagen['fotografia']).'" style="width:15rem">';
          }
          else {
            echo'
            <img id="img1" src="img/no_profile.png" width="100%" style="width:15rem">
            <div class="input-group">
              <input id="inputFile1" type="file" oninput="init()" class="form-control" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>
            '; 
          }
        }
        else {
          $foto = "";
          echo'
          <div class="col-md-4">
            <img id="img1" src="img/no_profile.png" width="100%" style="width:15rem">
            <div class="input-group">
              <input id="inputFile1" type="file" oninput="init()" class="form-control" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>
            ';
        }
        
        echo'
        
        
        </div>
        <div class="col-md-8">
          <div class="card-body text-start">
            <input value="'.$foto.'" type="text" name="foto" hidden>
            <input value="'.$nombreExp.'" type="text" name="nombre" hidden>
            <input value="'.$apellidoPaterno.'" type="text" name="apellidoPaterno" hidden>
            <input value="'.$apellidoMaterno.'" type="text" name="apellidoMaterno" hidden>
            <input value="'.$folio.'" type="text" name="folio" hidden>
            <input value="'.$discapacidad2.'" type="text" name="discapacidad" hidden>
            <input value="'.$curp.'" type="text" name="curp" hidden>
            <input value="'.$direccion.'" type="text" name="direccion" hidden>
            <input value="'.$numeroCasa.'" type="text" name="numeroCasa" hidden>
            <input value="'.$numeroInterior.'" type="text" name="numeroInterior" hidden>
            <input value="'.$colonia.'" type="text" name="colonia" hidden>
            <input value="'.$localidad2.'" type="text" name="localidad2" hidden>
            <input value="'.$municipio2.'" type="text" name="municipio" hidden>
            <input value="'.$estado2.'" type="text" name="estado" hidden>
            <input value="'.$telefonoCel.'" type="text" name="telefonoCel" hidden>
            <input value="'.$cp.'" type="text" name="cp" hidden>
            <input value="'.$alergias3.'" type="text" name="alergias" hidden>
            <input value="'.$tipoSangre2.'" type="text" name="tipoSangre" hidden>
            <h5 class="card-title mt-3" >'.$nombreExp.' '.$apellidoPaterno.' '.$apellidoMaterno.'</h5>
            <p class="card-text" >Número de Expediente: '.$folio.'</p>
            <p class="card-text" >Tipo Discapacidad: '.$discapacidad2.'</p>
            <p class="card-text">CURP: '.$curp.'</p>
            <p class="card-text">Domicilio: '.$direccion.' '.$numeroCasa.' '.$numeroInterior.'<br>Colonia: '.$colonia.'<br>Localidad: '.$localidad2.'<br>Municipio: '.$municipio2.'<br>Estado: '.$estado2.'<br>C.P.: '.$cp.'</span>
            <p class="card-text" >Tipo de Sangre: '.$tipoSangre2.'</p>
            <p class="card-text" >Alergias: '.$alergias3.'</p>
            <select class="form-select mb-3 w-100" id="selectentrega" onchange="OcultarInput()" aria-label="Default select example" required>
              <option value="">Selecciona a quien se entrega la credencial</option>
              <option value="1">Usuario</option>
              <option value="2">Otro</option>
            </select>
            <select class="form-select mb-3 w-100" id="selectvigencia" name="vigenciacrd" aria-label="Default select example" required>
              <option value="">Selecciona la vigencia</option>
              <option value="1">1 año</option>
              <option value="2">2 años</option>
            </select>
            <div class="form-floating" id="inputentrega" hidden>
              <input type="text" class="form-control" id="recibe" placeholder="">
              <label for="floatingInput">Nombre de quien recibe la credencial</label>
            </div>
          </div>
        </div>
        
        ';
      }
      else{
        echo'
        <script>
          alert("No se encontró el registro");
        </script>';
      }
  }
  else {
    $tipoSangre = "";
    $tipoSangre2 = "";
    
  }

}
