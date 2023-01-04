<?php
session_start();

if (isset($_SESSION['usr'])) {
    if($_SESSION['perfil']==1){
        // header('Location: javascript: history.go(-1)');
    }
    elseif($_SESSION['perfil']==2){
        // header('Location: javascript: history.go(-1)');
    }
    elseif($_SESSION['perfil']==3){
        // header('Location: javascript: history.go(-1)');
    }
    else{
        header('Location:prcd/sort.php');
    }
    // Si esta identificado, en otras palabras existe la variable, le saludamos
    // echo 'Hola ' . $_SESSION['usr'];
} else {
    // En caso contrario redirigimos el visitante a otra página

    echo 'Usuario no válido';
    // header('Location: ../../autentificacion/');
    header('Location: prcd/sort.php');
    die();
}

include('prcd/qc/qc.php');

// variables de sesión

    $usuario = $_SESSION['usr'];
    $id = $_SESSION['id'];
    $perfil = $_SESSION['perfil'];
    $nombre = $_SESSION['nombre'];

?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>SUIDEV · Inclusión</title>

    <link rel="icon" type="image/png" href="img/inclusion.ico"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet"> 
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b2e301b71f.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      body {
        font-family: 'Quicksand', sans-serif;
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow mb-5 text-white" style="background-color: #917799;">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-light" href="#" style="font-family: 'Quicksand', sans-serif;"><img src="img/small.png" with="auto" height="45rem"> | SUIDEV</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap text-light">
      <a class="nav-link px-3 text-white" style="font-family: 'Quicksand', sans-serif;" href="prcd/sort.php">Cerrar Sesión</a>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse mt-3">
      <p class="sidebar-heading d-flex justify-content-center text-center align-items-center px-3 mt-4 mb-1 text-muted" style="font-size: 1rem;">
        <span class="" style="font-family: 'Montserrat', sans-serif;"><strong>Bienvenid@<br><i class="fas fa-user"></i> 
          <?php
            echo ($nombre);
          ?></strong>
        </span>
      </p>
      <hr>
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column" style="font-family: 'Quicksand', sans-serif;">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">
              <span data-feather="home" class="align-text-bottom"></span>
              Inicio
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#credgen" href="">
              <span data-feather="credit-card" class="align-text-bottom"></span>
              Generar credencial
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#tarjetongen" href="#">
              <span data-feather="clipboard" class="align-text-bottom"></span>
              Generar tarjetón
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cuentasusuario.php">
              <span data-feather="users" class="align-text-bottom"></span>
              Usuarios SUIDEV
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2" class="align-text-bottom"></span>
              Reportes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="settings" class="align-text-bottom"></span>
              Ajustes
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 ">
        <p class="h3">Bienvenid@</p>
      </div>
      <p class="h6 mb-5  text-muted">Sistema Único de Identificación y Verificación</p>
      <hr>
      <h4 class="text-muted mt-4">Últimos documentos generados</h4>
      <div class="table-responsive">
            <table class="table table-hover table-bordered table-sm align-middle mt-4">
              <thead style="background-color:#B8B8B8;" class="text-light align-middle">
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">No. de Expediente</th>
                    <th scope="col">Fecha de Entrega</th>
                    <th scope="col">Vigencia</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Credencial</th>
                    <th scope="col">Tarjetón</th>
                </tr>
              </thead>
              <tbody id="myTable">
                <?php
                  include('prcd/query.php');
                  $x = 0;
                  while ($row_sqlQueryCredencial = $resultadoQueryCredencial->fetch_assoc()) {
                    $x++;
                    echo '
                    <input id="imprime2" value="'.$row_sqlQueryCredencial['id'].'" hidden>
                    <tr class="text-center bg-white">
                      <td>' . $x . '</td>
                      <td>' . $row_sqlQueryCredencial['id_ext'] . '</td>
                      <td>' . $row_sqlQueryCredencial['fecha_c'] . '</td>
                      <td>' . $row_sqlQueryCredencial['vigencia_cred'] . '</td>';
                      $idusers= $row_sqlQueryCredencial['id_users'];
                      $sqlUser= "SELECT * FROM users WHERE id ='$idusers'";
                      $resultadoQueryUser = $conn->query($sqlUser);
                      $row_sqlQueryUser = $resultadoQueryUser->fetch_assoc();
                      echo '
                      <td>' . $row_sqlQueryUser['nombre'] . '</td>';

                      if($row_sqlQueryCredencial['entregado_c'] == 1){
                        echo '
                        <td><a href="data-bs-toggle="modal" data-bs-target="#CredencialQR'.$row_sqlQueryCredencial['id'].'""><i class="h4 bi bi-check text-success"></i></a></td>';
                      } elseif($row_sqlQueryCredencial['entregado_c'] == 0){
                        echo '
                        <td><a href="data-bs-toggle="modal" data-bs-target="#'.$row_sqlQueryCredencial['id'].'""><i class="h4 bi bi-x text-danger"></a></i></td>';
                      }

                      if($row_sqlQueryCredencial['entregado_t'] == 1){
                        echo '
                        <td><a href="data-bs-toggle="modal" data-bs-target="#TarjetonQR'.$row_sqlQueryCredencial['id'].'""><i class="h4 bi bi-check text-success"></i></a></td>';
                      } elseif($row_sqlQueryCredencial['entregado_t'] == 0){
                        echo '
                        <td><a href="data-bs-toggle="modal" data-bs-target="#'.$row_sqlQueryCredencial['id'].'""><i class="h4 bi bi-x text-danger"></i></a></td>';
                      }
                      echo '
                    <tr>
                    <!-- Modal para imprimir credencial-->
                    <div class="modal fade" id="CredencialQR'.$row_sqlQueryCredencial['id'].'" tabindex="-1" aria-labelledby="QRLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-qr-code"></i> Información QR</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body" style="text-align: center; background-image: url(img/CredencialInclusionFront.jpg); background-repeat: no-repeat;background-attachment: fixed; background-size: cover;" id="div_print'.$row_sqlQueryCredencial['id'].'">
                            <center><img src="img/logomorismas.png" height="150"></center>
                            <br>
                            <center><h5 style="font-size: 1.5rem"><strong>Número de Expediente:</strong> ' . $row_sqlQueryCredencial['id_ext'] . ' </h5>
                            <h5 style="font-size: 1.5rem"><strong>Fecha de expedición:</strong> ' . $row_sqlQueryCredencial['fecha_c'] . '</h5>
                            <h5 style="font-size: 1.5rem"><strong>Expira:</strong> ' . $row_sqlQueryCredencial['vigencia_cred'] . ' </h5>
                            <h5 style="font-size: 1.5rem"><strong>Atenidod por:</strong> ' . $row_sqlQueryCredencial['id_users'] . '</h5>
                            <h5 style="font-size: 1.5rem"><strong></strong></h5></center>
                            <p class="text-center"><img src="prcd/QR/codes/'. $row_sqlQueryCredencial['qr_cred'].'"></p>
                          </div>
                          <div class="modal-footer">';?>
                          <!-- <a type="button" class="btn btn-primary" href="javascript:imprimirSeleccion('div_print<?php echo $row_sqlQuery['id']?>')"><i class="bi bi-printer-fill"></i> Imprimir</a> -->
                          <?php echo '
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Modal editar-->
                    <div class="modal fade" id="editar'.$row_sqlQuery['id'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-person-plus"></i> Alta de polvora</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="prcd/actualizar.php" method="POST"><!--form-->
                                  <input name="id" value="'.$row_sqlQuery['id'].'" hidden>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control" placeholder="Nombre" aria-label="Nombre" value="' . $row_sqlQuery['nombre'] . '" aria-describedby="basic-addon1" name="nombre" required>
                                  </div>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-workspace"></i></span>
                                    <input type="text" class="form-control" placeholder="Apellidos" aria-label="Apellidos" value="' . $row_sqlQuery['apellidos'] . '" aria-describedby="basic-addon1"  name="apellidos" required>
                                  </div>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-badge"></i></span>
                                    <input type="text" class="form-control" placeholder="CURP" aria-label="CURP" aria-describedby="basic-addon1" value="' . $row_sqlQuery['curp'] . '" name="curp" readonly>
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-123"></i></span>
                                    <input type="text" class="form-control" placeholder="Cantidad" aria-label="Cantidad" value="' . $row_sqlQuery['cantidad_polvora'] . '" aria-describedby="basic-addon1" maxlength="1" onkeypress="ValidaSoloNumeros()" name="cantidad_polvora" readonly>
                                  </div><!-- Si, y solo si se asignan 2kg de polvora, se habilita el campo de detalles y se convierte en obligatorio -->
                                  
                                  <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-card-text"></i></span>
                                    <textarea style="resize: none;" rows="4" type="text" class="form-control" placeholder="Detalles (opcional)" aria-label="Detalles" aria-describedby="basic-addon1" name="detalles">' . $row_sqlQuery['detalles'] . '</textarea>
                                  </div>
                            </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Cancelar</button>
                                <button type="submit" class="btn btn-primary"><i class="bi bi-person-plus"></i> Guardar</button>
                              </div>
                            </form><!--form-->
                        </div>
                      </div>
                    </div>
                    ';
                    
                  }
            echo'</table>';
            ?>
          </div>
        <!-- Inicia Modal para generar credencial -->
        <div class="modal fade " id="credgen" tabindex="-1" aria-labelledby="generacredencial" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Generar Credencial con QR</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body" style="height: 620px;">
                            <div class="input-group mb-1 mt-2 w-50">
                              <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                              <input class="form-control" id="searchDBInclusion" oninput="buscarExpediente()" onkeypress="ValidaSoloNumeros()" maxlength="5" pattern="[0-9]+" placeholder="Buscar...">
                            </div><!-- input group -->
                            <br>
                            <div class="container text-center">
                              <div class="card mb-3" style="max-width: 100%;">
                              <form action="prcd/generaqrcredencial.php" id="form-id" method="POST"><!--form-->
                                <div class="row g-0" id="credencial">
                                    
                                </div><!-- row -->
                              </form>
                              </div><!-- card -->
                            </div><!-- container -->
                          </div><!-- modal body -->
                          
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="habilitaimprimirc" onclick="swaldatoscrd()"><i class="bi bi-save2"></i> Generar Credencial</button>
                            <button type="button" class="btn btn-primary" id="imprimirc" disabled><i class="bi bi-printer"></i> Imprimir</button>
                          </div><!-- modal footer -->
                        </div><!-- modal content -->
                      </div><!-- modal dialog -->
                    </div><!-- modal -->
                    
                    <!-- Termina Modal para generar credencial -->

                    <!-- Inicia Modal para generar tarjeton -->

                    <div class="modal fade " id="tarjetongen" tabindex="-1" aria-labelledby="generatarjeton" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Generar Tarjetón con QR</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="input-group mb-1 mt-2 w-100">
                              <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                              <input class="form-control" id="searchDBInclusion2" oninput="buscarExpediente2()" onkeypress="ValidaSoloNumeros()" maxlength="5" pattern="[0-9]+" placeholder="Buscar...">
                            </div><!-- input group -->
                            <br>
                            <div class="container text-center">
                              <div class="card mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                  <div class="col-md-4">
                                    <img src="img/tarjeton.jpg" class="img-fluid rounded-start" alt="...">
                                  </div>
                                  <div class="col-md-8">
                                    <div class="card-body text-start" >
                                      <div id = "tarjeton">

                                      </div>
                                      <hr>
                                      <h5 class="mb-3">Datos del vehículo</h5>
                                      <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Marca</span>
                                        <input type="text" class="form-control" placeholder="Marca" aria-label="marca" aria-describedby="basic-addon1" id="marcaForm">
                                      </div>
                                      <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Modelo</span>
                                        <input type="text" class="form-control" placeholder="Modelo" aria-label="modelo" aria-describedby="basic-addon1">
                                        <span class="input-group-text">Año</span>
                                        <input type="text" class="form-control" placeholder="Año" aria-label="anio" id="annioForm">
                                      </div>
                                      <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">No. de Placas</span>
                                        <input type="text" class="form-control" placeholder="# de Placas" aria-label="numeroplacas" aria-describedby="basic-addon1" id="placasForm">
                                      </div>
                                      <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">No. de Serie</span>
                                        <input type="text" class="form-control" placeholder="# de Serie" aria-label="numeroserie" aria-describedby="basic-addon1" id="serieForm">
                                      </div>
                                      <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">No. de choferes</span>
                                        <input type="number" class="form-control" placeholder="# de choferes" aria-label="no_choferes" aria-describedby="basic-addon1" id="choferesForm">
                                      </div>
                                      <div class="input-group">
                                        <span class="input-group-text">Nombre(s) del(los)<br>Chofer(es)</span>
                                        <textarea class="form-control" aria-label="nombres de los choferes"  id="nombresChoferesForm"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>  
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="habilitaimprimirt" onclick="swaldatostrn()"><i class="bi bi-save2"></i> Generar Tarjetón</button>
                            <button type="button" class="btn btn-primary" id="imprimirt" disabled><i class="bi bi-printer"></i> Imprimir</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <!-- Termina Modal para generar tarjeton -->
      
    </main>
  </div>
</div>



      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>

<script>

  function swaldatoscrd () {
    Swal.fire({
      title: 'Los datos están correctos?',
      showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: 'Sí',
      denyButtonText: `No`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        document.getElementById("habilitaimprimirc").disabled=true;
        document.getElementById("imprimirc").disabled=false;
        var form = document.getElementById("form-id");
        form.submit();
        Swal.fire('Listo!', '', 'success')
      } else if (result.isDenied) {
        Swal.fire('Verifica los datos en el padrón!', '', 'info')
      }
    })
  }
  function swaldatostrn () {
    Swal.fire({
      title: 'Los datos están correctos?',
      showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: 'Sí',
      denyButtonText: `No`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        document.getElementById("habilitaimprimirt").disabled=true;
        document.getElementById("imprimirt").disabled=false;
        // enviar datos
        var expediente = document.getElementById('searchDBInclusion').value;
        var marca = document.geteElementById("marcaForm").value;
        var modelo = document.geteElementById("modeloForm").value;
        var annio = document.geteElementById("annioForm").value;
        var placas = document.geteElementById("placasForm").value;
        var serie = document.geteElementById("serieForm").value;
        var noChoferes = document.geteElementById("choferesForm").value;
        var nombreChoferes = document.geteElementById("nombresChoferesForm").value;
        // ajax
        $.ajax({
                  type:"POST",
                  url:"prcd/checkin.php",
                  data:{
                    expediente:expediente,
                    marca:marca,
                    modelo:modelo,
                    annio:annio,
                    placas:placas,
                    serie:serie,
                    noChoferes:noChoferes,
                    nombreChoferes:nombreChoferes
                  },
                  dataType: "html",
                  async:true,
                  cache: false,
                    success: function(response)
                    {
                        var jsonData = JSON.parse(response);
         
                        // user is logged in successfully in the back-end
                        // let's redirect
                        if (jsonData.success == "0")
                        {
                          let timerInterval
                          Swal.fire({
                            title: 'No hay datos registrados',
                            html: 'No hay datos registrados',
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: () => {
                              Swal.showLoading()
                              const b = Swal.getHtmlContainer().querySelector('b')
                              timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                              }, 100)
                            },
                            willClose: () => {
                              clearInterval(timerInterval)
                            }
                          }).then((result) => {
                            /* Read more about handling dismissals below */
                            if (result.dismiss === Swal.DismissReason.timer) {
                              console.log('I was closed by the timer')
                            }
                          })
                        }
                        else if (jsonData.success == "1")
                        {
                            // location.href = 'my_profile.php';
                            let timerInterval
                            Swal.fire({
                                icon: 'success',
                                title: 'Usuario ya existe',
                                text: '¿Quieres editar sus datos?',
                                footer: 'INCLUSIÓN',
                                timer: 2000,
                              timerProgressBar: true,
                              didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                  b.textContent = Swal.getTimerLeft()
                                }, 100)
                              },
                              willClose: () => {
                                clearInterval(timerInterval)
                              }
                            }).then((result) => {
                              /* Read more about handling dismissals below */
                              if (result.dismiss === Swal.DismissReason.timer) {
                                console.log('I was closed by the timer')
                              }
                            });
                        }
                        else if (jsonData.success == "3")
                        {
                            // location.href = 'my_profile.php';
                            let timerInterval
                            Swal.fire({
                                icon: 'error',
                                title: 'NO EXISTE REGISTRO',
                                text: 'Credenciales incorrectas',
                                footer: 'UACYA | UAZ',
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: () => {
                                  Swal.showLoading()
                                  const b = Swal.getHtmlContainer().querySelector('b')
                                  timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()
                                  }, 100)
                                },
                                willClose: () => {
                                  clearInterval(timerInterval)
                                }
                              }).then((result) => {
                                /* Read more about handling dismissals below */
                                if (result.dismiss === Swal.DismissReason.timer) {
                                  console.log('I was closed by the timer')
                                }
                            });
                        }
                        
                   }           
                  });
        // ajax

        Swal.fire('Listo!', '', 'success')
      } else if (result.isDenied) {
        Swal.fire('Verifica los datos en el padrón!', '', 'info')
      }
    })
  }
// para generar credencial
  function buscarExpediente(){
    var expediente = document.getElementById('searchDBInclusion').value;
    $.ajax({
      type:"POST",
      url:"prcd/query_searchPadronBD.php",
      data:{
        expediente:expediente
      },
      // dataType: "html",
      //contentType:false,
      //processData:false,
      cache: false,
        success: function(data) {
          $("#credencial").html(data);

      }               
    });
  }
// para generar tarjetón
  function buscarExpediente2(){
    var expediente = document.getElementById('searchDBInclusion2').value;
    $.ajax({
      type:"POST",
      url:"prcd/query_searchPadronBDTarjeton.php",
      data:{
        expediente:expediente
      },
      // dataType: "html",
      //contentType:false,
      //processData:false,
      cache: false,
        success: function(data) {
          $("#tarjeton").html(data);

      }               
    });
  }

  function ValidaSoloNumeros() {
    if ((event.keyCode < 48) || (event.keyCode > 57)) 
      event.returnValue = false;
  }

  function OcultarInput() {
    var valor = document.getElementById("selectentrega").value;
    if(valor == 1){
        document.getElementById("selectentrega").setAttribute("name","recibeCrd");
        document.getElementById("recibe").removeAttribute("name");
        document.getElementById("selectentrega").required = true;
        document.getElementById("inputentrega").hidden = true;
    }
    else if (valor == 2){
      document.getElementById("recibe").setAttribute("name","recibeCrd");
      document.getElementById("selectentrega").removeAttribute("name");
      document.getElementById("recibe").required = true;
      document.getElementById("inputentrega").hidden = false;
    }
  }

  function init() {
    var inputFile = document.getElementById('inputFile1');
    inputFile.addEventListener('change', mostrarImagen, false);
  }

  function mostrarImagen(event) {
    var file = event.target.files[0];
    var reader = new FileReader();
    reader.onload = function(event) {
      var img = document.getElementById('img1');
      img.src= event.target.result;
    }
    reader.readAsDataURL(file);
  }

  window.addEventListener('load', init, false);

</script>