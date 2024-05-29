<html>
    <header>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>SUIDEV · Inclusión</title>

    <link rel="icon" type="image/png" href="img/inclusion.ico"/>

    <link rel="stylesheet" href="crop/css/cropper.css">
    <link rel="stylesheet" href="crop/css/index.css">
    <script src="crop/js/jquery.js"></script>
    <script src="crop/js/cropper.js"></script>
    <script src="crop/js/index.js"></script>
    </header>
    <body>

    <div class="container">
            <div class="group">
            <img src="img/no_profile.png" alt="" width="100%" class="crop-image" id="crop-image">
            <input type="file" name="input-file" id="input-file" accept=".png,.jpg,.jpeg" ">
            <label for="input-file" class="label-file">Haz click aquí para subir una imagen</label>
            </div>
            </div>
            <button class="btn-primary" type="button" id="inputfile">guardar foto</button>


<!-- modal -->
    <div class="modal fade cropModal" id="cropModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content contentCropModal">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Cortar Foto</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="content-imagen-cropper">
                                <img src="" alt="" class="img-cropper" id="img-cropper">
                            </div>
                            <div class="content-imagen-sample">
                                <div src="" alt="" class="img-sample" id="img-croppered">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="cut" class="btn btn-primary" data-bs-dismiss="modal">Recortar</button>
                            <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
          
        
    </body>
</html>