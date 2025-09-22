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

    
    $sqlStatus = "SELECT * FROM users WHERE id ='$id'";
    $resultadoStatus = $conn->query($sqlStatus);
    $rowStatus = $resultadoStatus->fetch_assoc();

    $sqlPerfil="SELECT * FROM perfiles_usr WHERE id='$perfil'";
    $resultadoPerfil = $conn->query($sqlPerfil);
    $rowPerfil=$resultadoPerfil->fetch_assoc();

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

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">  -->
    <link href="scripts/css/quicksand.css" rel="stylesheet">
    <link href="scripts/css/montserrat.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="sidebars.css" rel="stylesheet">
    <script src="sidebars.js"></script>
    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <link href="scripts/bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script> -->
    <script src="scripts/popper.min.js"></script>
    <script src="scripts/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <script src="scripts/jquery-3.7.1.min.js"></script>
    <script src="scripts/fontawsome.js"></script>
    <script src="scripts/sweetalert2.all.min.js"></script>
    <link href="scripts/sweetalert2.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css"> -->
    <link rel="stylesheet" href="scripts/bootstrap-icons-1.11.3/font/bootstrap-icons.css">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet"> -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <!-- <script src="sidebars.js"></script> -->
    <script src="js/guardar.js"></script>
    <script src="js/padronFull.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/files.js"></script>
    <script src="js/estados.js"></script>
    <script src="js/municipios.js"></script>
    <script src="js/localidades.js"></script>
    <script src="js/asentamientos.js"></script>
    <script src="js/validaciones.js"></script>
    <script src="js/discapacidades.js"></script>
    <script src="js/numeroExpediente.js"></script>
    <script src="js/checkList.js"></script>
    <script src="js/tarjetones.js"></script>
    <script src="js/tarjetonesTemp.js"></script>
    <script src="js/usuarioTemp.js"></script>
    <script src="js/print.js"></script>
    <script src="js/query.js"></script>
    <script src="js/sueltitos.js"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>

    <script>
      
      /* let idUsr = sessionStorage.getItem("idUsr");
      let user = sessionStorage.getItem("username");
      let nombre = sessionStorage.getItem("nombre");
      let tipo_usr = sessionStorage.getItem("tipo_usr");
      let id = sessionStorage.getItem("id"); */

      function detectarMicrosoftEdge() {
        const userAgent = navigator.userAgent;
        return userAgent.includes("Edg") || userAgent.includes("Edge");
      }

      if (detectarMicrosoftEdge()) {
        console.log("El usuario está usando Microsoft Edge.");
        alert("Navegador NO Compatible, utiliza Firefox o Chrome");
        window.location.href = "prcd/sort.php"; // Redirigir al login si no hay usuario
      } else {
        console.log("El usuario no está usando Microsoft Edge.");
      }

      // cerrar session si se cierra el navegador
            // Variables de control
          let esNavegacionInterna = false;
          let esRefresh = false;
          
          // Detectar clicks en enlaces internos
          document.addEventListener('click', function(e) {
              const target = e.target.closest('a');
              if (target && target.href) {
                  const href = target.href;
                  const currentOrigin = window.location.origin;
                  
                  if (href.startsWith(currentOrigin) || href.startsWith('/') || 
                      href.startsWith('./') || href.startsWith('../')) {
                      esNavegacionInterna = true;
                      setTimeout(() => { esNavegacionInterna = false; }, 100);
                  }
              }
          });
          
          // Detectar envíos de formularios
          document.addEventListener('submit', function() {
              esNavegacionInterna = true;
              setTimeout(() => { esNavegacionInterna = false; }, 100);
      });
      
      // Detectar refresh (F5, Ctrl+R, etc.)
      document.addEventListener('keydown', function(e) {
          // Detectar F5 o Ctrl+R
          if (e.key === 'F5' || (e.ctrlKey && e.key === 'r')) {
              esRefresh = true;
              setTimeout(() => { esRefresh = false; }, 100);
          }
      });
      
      // También detectar el clic en el botón de refresh del navegador
      window.addEventListener('beforeunload', function() {
        // Si es un refresh, no marcar como navegación interna
        if (esRefresh) {
          esNavegacionInterna = true;
        }
      });
    
      // Evento principal
      window.addEventListener('beforeunload', function(e) {
        // Si es navegación interna O refresh, no hacer nada
        if (esNavegacionInterna || esRefresh) {
          return;
        }
        
        // Mostrar mensaje de confirmación solo para cierre real
        const mensaje = "¿Estás seguro de que quieres salir? Se cerrará la sesión.";
        
        if (!confirm(mensaje)) {
          e.preventDefault();
          e.returnValue = "";
        } else {
          navigator.sendBeacon('prcd/sort.php');
        }
      });

      //window.addEventListener('contextmenu', function(event) {
      //  event.preventDefault(); // Evita que aparezca el menú contextual en toda la página
      //});

      document.addEventListener('click', function(event) {
        // Comprobar si se hizo clic en un enlace y si se presionó la tecla Ctrl
        if (event.ctrlKey) {
          event.preventDefault(); // Evitar que se abra en una nueva pestaña
          console.log('Enlace abierto en la misma pestaña.'); // Opcional: mostrar un mensaje
          // Aquí puedes implementar una lógica para abrir el enlace en la misma ventana
          // o realizar otra acción, por ejemplo:
          // window.location.href = event.target.href;
          window.location.href = self;
        }
      });

      document.documentElement.addEventListener('click', function (event) {
        if(event.ctrlKey){event.preventDefault()}
      });

        // Broadcast that you're opening a page.
        localStorage.openpages = Date.now();
        var onLocalStorageEvent = function(e){
            if(e.key == "openpages"){
                // Listen if anybody else is opening the same page!
                localStorage.page_available = Date.now();
            }
            if(e.key == "page_available"){

              event.preventDefault();
              alert("Enlace abierto en la misma pestaña.");
              window.location.href = self;
            }
        };
        window.addEventListener('storage', onLocalStorageEvent, false);



    </script>

    <style>
      * {
        font-family: 'Montserrat', sans-serif;
      }
      body {
        overflow: auto;
        height: auto;
      }
      main{
        height: auto;
      }
      table {
        /* ANNY ESTA LÍNEA ES PARA RECORDARTE QUE AQUÍ NOS QUEDAMOSSSSSSSSS  */
        overflow-y:scroll;
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

      #cardPrestamo.card-body  {
        height:700px;
        overflow-y: scroll;
        width:100%;
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

      .nav-link {
        text-decoration: none;
        color: black;
      }

    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body onload="tablaPCDFull(); municipiosSelect2(32)">
    
  <nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow mb-3 text-white" style="background-color: #917799;">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-light text-center" href="#" style="font-family: 'Quicksand', sans-serif;"><img src="img/small.png" with="auto" height="45rem"> | SUIDEV</a>
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
        <span class="" style="font-family: 'Montserrat', sans-serif;"><strong>Bienvenid@<br><i class="fas fa-user me-2"></i> 
          <?php
            echo ($nombre);
          ?></strong>
        </span>
      </p>
      <hr>      
      <div class="flex-shrink-0 p-2 bg-white" style="width: 100%;">

        <ul class="list-unstyled ps-0 mt-3">
          <li class="ms-2 mb-1">
            <span class="d-inline-flex"><a href="dashboard.php" id="linkHome" class="link-dark text-decoration-none"><i class="bi bi-house-door-fill ms-2 me-2"></i> Inicio</a></span>
          </li>
          <li class="mb-1 mt-2">
          <span class="d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#padron-collapse" aria-expanded="false"><a href="" id="linkHome" class="link-dark text-decoration-none"><i class="bi bi-inboxes ms-3 me-2"></i>
              Padrón PCD
            </a></span>
            <div class="collapse" id="padron-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="padronpcdfull.php" class="link-dark d-inline-flex text-decoration-none rounded"><i class="bi bi-inboxes ms-2 me-3"></i> Padrón PCD</a></li>
                <li><a href="padronpcd.php" class="link-dark d-inline-flex text-decoration-none rounded"><i class="bi bi-folder-plus ms-2 me-3"></i> Agregar nuevo</a></li>
                <li><a href="padronpcdActualizar.php" class="link-dark d-inline-flex text-decoration-none rounded"><i class="bi bi-journals ms-2 me-3"></i> Actualizar expediente</a></li>
                
              </ul>
            </div>
          </li>
          <li class="mb-1 mt-2">
          <span class="d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false"><a href="" id="linkHome" class="link-dark text-decoration-none"><i class="bi bi-person-badge ms-3 me-2"></i>
              Tarjetones
            </a></span>
            <div class="collapse" id="dashboard-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="" class="link-dark d-inline-flex text-decoration-none rounded" data-bs-toggle="modal" data-bs-target="#tarjetongen"><i class="bi bi-bookmark-plus ms-2 me-3"></i> Tarjetón de Padrón</a></li>
                <li><a href="" class="link-dark d-inline-flex text-decoration-none rounded" data-bs-toggle="modal" data-bs-target="#tarjetonPrestamo"><i class="bi bi-tag ms-2 me-3"></i> Tarjeton de Préstamo</a></li>
                
              </ul>
            </div>
          </li>
          <li class="mb-1 ms-2">
          <span class="d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#credencial-collapse" aria-expanded="false"><a href="" id="linkHome" class="link-dark text-decoration-none"><i class="bi bi-person-vcard ms-2 me-2"></i>
              Credenciales
            </a></span>
            <div class="collapse" id="credencial-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded" data-bs-toggle="modal" data-bs-target="#credgen"><i class="bi bi-plus-circle me-3"></i> Nueva</a></li>
              </ul>
            </div>
          </li>
          <li class="border-top my-3"></li>
          <li class="ms-2 mb-1">
            <span class="d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false"><a href="" id="linkHome" class="link-dark text-decoration-none"><i class="bi bi-gear-fill ms-2 me-2"></i>
              Ajustes
            </a></span>
          </li>
          <li class="mb-1"> 
            <div class="collapse" id="account-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded" data-bs-toggle="modal" data-bs-target="#editarUser"><i class="bi bi-person-gear ms-2 me-3"></i> Editar mi perfil</a></li>
                <li><a href="cuentasusuario.php" class="link-dark d-inline-flex text-decoration-none rounded"><i class="bi bi-people ms-2 me-3"></i>Gestión de usuarios</a></li>
              </ul>
              <li class="border-top my-3"></li>
              <li class="ms-2 mb-1">
              <span class="d-inline-flex"><a href="prcd/sort.php" id="linkHome" class="link-dark text-decoration-none"><i class="bi bi-door-closed-fill ms-2 me-2"></i>
              Cerrar Sesión
              </a></span>
          </li>
          <li class="mb-1"> 
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="height: 200vh;">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center ">
        <p class="h3">Padrón de Personas con Discapacidad</p>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="input-group mb-2 mt-3">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
            <input class="form-control w-50" id="buscarFiltroPadron" onkeyup="javascript:this.value=this.value.toUpperCase()" placeholder="Buscar...">
          </div><!-- input group -->
        </div>
        <div class="col-md-2 mt-2">
          <div class="form-check form-check-inline mt-3">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="expedienteSearch">
            <label class="form-check-label" for="inlineRadio1"># Exp.</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="nombreSearch">
            <label class="form-check-label" for="inlineRadio2">Nombre</label>
          </div>
        </div>
        <div class="col-md-2">
          <div class="input-group mb-2 mt-3">
            <!-- <input class="form-control w-50" id="buscarFiltroPadronFull" oninput="filtroPadronFull(this.value)" placeholder="Buscar..."> -->
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-universal-access"></i></span>
            <select class="form-select" id="tipoDiscapacidadFull" aria-label="Default select example">
              <option value="" selected>Tipo Discapacidad...</option>
              <option value="Física">Física</option>
              <option value="Intelectual">Intelectual</option>
              <option value="Sensorial">Sensorial</option>
              <option value="Múltiple">Múltiple</option>
              <option value="Psicosocial">Psicosocial</option>
            </select>
          </div>
        </div>
        <div class="col-md-2">
          <div class="input-group mb-2 mt-3">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-pin-map"></i></i></span>
            <!-- <input class="form-control w-50" id="buscarFiltroPadronFull2" oninput="filtroPadronFull2(this.value)" placeholder="Buscar..."> -->
            <select class="form-select" id="municipiosList2" placeholder="Municipio...">

            </select>
          </div><!-- input group -->
        </div>
        <div class="col-md-2 mt-3">
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button" onclick="filtroPadronFull(pagina = 1)">Buscar</button>
          </div>
        </div>
      </div>
      
      <hr>
      <!-- <h4 class="text-muted mt-4">Últimos documentos generados</h4> -->
      <div class="table-responsive mb-2" id="myTablePCD">
          
      
      </div>
      <!-- <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
          <li class="page-item disabled">
            <a class="page-link">Anterior</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Siguiente</a>
          </li>
        </ul>
      </nav> -->

    </main>

    <script src="sidebars.js"></script>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
  </div>
</div>



</body>

<?php
    include("modals/credenciales.php");
    include("modals/editarInfoVehiculo.php");
    include("modals/editarUser.php");
    include("modals/familiaresModals.php");
    include("modals/imprimirQRtarjeton.php");
    include("modals/reemplazarTarjetonP.php");
    include("modals/referenciasModals.php");
    include("modals/solicitudes.php");
    include("modals/tarjetonesPadron.php");
    include("modals/tarjetonesTemp.php");
    include("modals/tarjetonExpedienteNuevo.php");
    include("modals/uploadDocsModals.php");
  ?>
<script src="js/sueltitos.js"></script>

</html>