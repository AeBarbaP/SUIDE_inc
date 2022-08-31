<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Dashboard Template · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b2e301b71f.js" crossorigin="anonymous"></script>


    

<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
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
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow mb-5">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#"><img src="img/small.png" with="auto" height="40rem"> | SUIDEV</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Cerrar Sesión</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse mt-3">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home" class="align-text-bottom"></span>
              Inicio
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="credit-card" class="align-text-bottom"></span>
              Generar credencial
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="clipboard" class="align-text-bottom"></span>
              Generar tarjetón
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
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

        <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Year-end sale
            </a>
          </li>
        </ul> -->
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 ">
        <p class="h3 text-muted">Sistema Único de Identificación y Verificación</p>
        <div class="btn-toolbar mb-2 mb-md-0">
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            Esta semana
          </button>
        </div>
      </div>
      <p class="h1 mb-3">Bienvenido</p>
      <hr>
      <h4 class="text-muted mt-3">Últimas credenciales generadas</h4>
      <div class="table-responsive">
            <table class="table table-hover table-bordered table-sm align-middle mt-4">
              <thead style="background-color:#7B8DAB;" class="text-light align-middle">
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
                        <td><a href="data-bs-toggle="modal" data-bs-target="#QR'.$row_sqlQueryCredencial['id'].'""><i class="h4 bi bi-check text-success"></i></a></td>';
                      } elseif($row_sqlQueryCredencial['entregado_c'] == 0){
                        echo '
                        <td><a href="data-bs-toggle="modal" data-bs-target="#QR'.$row_sqlQueryCredencial['id'].'""><i class="h4 bi bi-x text-danger"></a></i></td>';
                      }

                      if($row_sqlQueryCredencial['entregado_t'] == 1){
                        echo '
                        <td><a href="data-bs-toggle="modal" data-bs-target="#QR'.$row_sqlQueryCredencial['id'].'""><i class="h4 bi bi-check text-success"></i></a></td>';
                      } elseif($row_sqlQueryCredencial['entregado_t'] == 0){
                        echo '
                        <td><a href="data-bs-toggle="modal" data-bs-target="#QR'.$row_sqlQueryCredencial['id'].'""><i class="h4 bi bi-x text-danger"></i></a></td>';
                      }
                      echo '
                    <tr>
                    <!-- Modal -->
                    <div class="modal fade" id="QR'.$row_sqlQueryCredencial['id'].'" tabindex="-1" aria-labelledby="QRLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-qr-code"></i> Información QR</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body" style="text-align: center;" id="div_print'.$row_sqlQueryCredencial['id'].'">
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

      <!-- <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1,001</td>
              <td>random</td>
              <td>data</td>
              <td>placeholder</td>
              <td>text</td>
            </tr>
            <tr>
              <td>1,002</td>
              <td>placeholder</td>
              <td>irrelevant</td>
              <td>visual</td>
              <td>layout</td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>data</td>
              <td>rich</td>
              <td>dashboard</td>
              <td>tabular</td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>information</td>
              <td>placeholder</td>
              <td>illustrative</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,004</td>
              <td>text</td>
              <td>random</td>
              <td>layout</td>
              <td>dashboard</td>
            </tr>
            <tr>
              <td>1,005</td>
              <td>dashboard</td>
              <td>irrelevant</td>
              <td>text</td>
              <td>placeholder</td>
            </tr>
            <tr>
              <td>1,006</td>
              <td>dashboard</td>
              <td>illustrative</td>
              <td>rich</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,007</td>
              <td>placeholder</td>
              <td>tabular</td>
              <td>information</td>
              <td>irrelevant</td>
            </tr>
            <tr>
              <td>1,008</td>
              <td>random</td>
              <td>data</td>
              <td>placeholder</td>
              <td>text</td>
            </tr>
            <tr>
              <td>1,009</td>
              <td>placeholder</td>
              <td>irrelevant</td>
              <td>visual</td>
              <td>layout</td>
            </tr>
            <tr>
              <td>1,010</td>
              <td>data</td>
              <td>rich</td>
              <td>dashboard</td>
              <td>tabular</td>
            </tr>
            <tr>
              <td>1,011</td>
              <td>information</td>
              <td>placeholder</td>
              <td>illustrative</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,012</td>
              <td>text</td>
              <td>placeholder</td>
              <td>layout</td>
              <td>dashboard</td>
            </tr>
            <tr>
              <td>1,013</td>
              <td>dashboard</td>
              <td>irrelevant</td>
              <td>text</td>
              <td>visual</td>
            </tr>
            <tr>
              <td>1,014</td>
              <td>dashboard</td>
              <td>illustrative</td>
              <td>rich</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,015</td>
              <td>random</td>
              <td>tabular</td>
              <td>information</td>
              <td>text</td>
            </tr>
          </tbody>
        </table>
      </div> -->
    </main>
  </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
