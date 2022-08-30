<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title>Generar llave GO!</title>

    <link rel="stylesheet" href="css/style.css">
    <script src="../QR/ajax_generate_code.js"></script>
    <link rel="icon" type="image/png" href="../Images/LogoGO.png" sizes="90x90">

</head>

<body class="">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="../Images/LogoGO.png" alt="" width="30" height="auto" style="background-color:white; ">
            </a>
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="bi bi-speedometer"></i> Administrador</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-house-fill"></i>
                                Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-upc-scan"></i> Generar QR</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-clock-history"></i> Historial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-question-circle"></i> Acerca de</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container" style="min-height:500px;">
        <div class="container">
            <div class="row">
                <h2>Generar códigos QR GO!</h2>
            </div>

            <div class="input-group col-md-12">
                <form class="form-horizontal" method="post" id="codeForm" onsubmit="return false">

                    <label for="basic-url" class="form-label">Datos para generar QR <strong><i
                                class="bi bi-upc-scan"></i></strong></label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3"><i class="bi bi-person-circle"></i></span>
                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3"
                            placeholder="Nombre">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3"><i class="bi bi-phone"></i></span>
                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3"
                            placeholder="Celular">
                    </div>

                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01"><i
                                class="bi bi-calendar-check-fill"></i></label>
                        <select class="form-select" id="inputGroupSelect01">
                            <option selected>Tiempo</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <hr>

                    <div class="input-group-text">
                        <label class="control-label">Información : </label>
                        <input class="form-control col-xs-1" id="content" type="text" required="required">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nivel del código (ECC) : </label>
                        <select class="form-control col-xs-10" id="ecc">
                            <option value="H">H - Mejor</option>
                            <option value="M">M</option>
                            <option value="Q">Q</option>
                            <option value="L">L - Peor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tamaño : </label>
                        <input type="number" min="1" max="10" step="1" class="form-control col-xs-10" id="size"
                            value="5">
                    </div>
                    <div class="form-group">
                        <label class="control-label"></label>
                        <input type="submit" name="submit" id="submit" class="btn btn-success"
                            value="Generar código QR">
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <div class="showQRCode"></div>
            </div>
        </div>
    </div>
    </div>
    <div class="insert-post-ads1" style="margin-top:20px;">

    </div>
    </div>
</body>

</html>