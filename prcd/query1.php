<?php
// if (isset($POST['text'])){

include('qc/qc.php');

$concatenado = $_POST['text'];

    $Query = "SELECT * FROM asistentes WHERE concatenado = '$concatenado' " ;
    $resultado_Query = $conn->query($Query);
    $row_sql_catalogo = $resultado_Query->fetch_assoc();

    $resultado_rows = mysqli_num_rows($resultado_Query);
    if($resultado_rows == 0){
        echo '
        <div class="alert alert-danger text-center mt-1 pt-2 pb-2" role="alert">
            <i class="bi bi-x-circle-fill"></i> QR NO VÁLIDO
            
        </div>
        ';
    }

    else{
    echo '
          <span class="h5">Estatus de entrega:</span>';
    if($row_sql_catalogo['entregado']==1){
        echo '<div class="alert alert-success text-center mt-1 pt-2 pb-2" role="alert">
            Pólvora entregada
            </div>
        ';
    }
    else{
        echo '<div class="alert alert-danger text-center mt-1 pt-2 pb-2" role="alert">
        Pólvora NO Entregada
        </div>
    ';
    }
    
    echo '
          <hr>
          <p><strong>Nombre completo:</strong> ' . $row_sql_catalogo['nombre'] . ' ' . $row_sql_catalogo['apellidos'] . '</p>
          <p><strong>CURP:</strong> ' . $row_sql_catalogo['curp'] . '</p>
          <p><strong>Pólvora solicitada:</strong> ' . $row_sql_catalogo['cantidad_polvora'] . '</p>

          
    ';
    if($row_sql_catalogo['entregado']==1){
      echo '<br>
      <div class="d-grid gap-2">
        <button type="button" class="btn btn-outline-success" onclick="entrega()" disabled><i class="bi bi-box-arrow-up-right"></i> Entregar</button>  
      </div>
      ';
  }
  else{
      echo '<br>
      <div class="d-grid gap-2">
        <button type="button" class="btn btn-success" onclick="entrega()"><i class="bi bi-box-arrow-up-right"></i> Entregar</button>  
      </div>
  ';
  }

    echo "
    <!-- Inicia SWAL -->
          <script type='text/javascript'>
          function entrega() {
            
            Swal.fire({
              title: 'Estas seguro que deseas canjear el ticket?',
              text: 'Ojo, no lo podrás revertir!',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Sí, canjear'
            
            }).then(function(){window.location='prcd/actualizarqrstatus.php?id=". $row_sql_catalogo['id'] ."';})

          }
          </script>
          <!-- Termina SWAL -->
    ";

}

?>