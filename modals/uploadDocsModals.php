<?php

echo'

<!-- Inician Modales para cargar archivos en pdf o jpg en Tab Documentos -->

<div class="modal fade" id="docUpload1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Archivo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="upload_form" enctype="multipart/form-data" method="post">
                    <div class="input-group mb-3">
                    <input type="file" name="file1" id="file1" accept="application/pdf" class="form-control">
                    </div>
                    <div class="progress" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" value="0">
                    <div class="progress-bar progress-bar" style="background-color:#917799" id="progressBar1" value="0" max="100" style="height: 20px">
                        <p id="loaded_n_total1"></p>
                    </div>
                    </div>
                    <small id="status1"></small>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnModal1" onclick="uploadFile(1,1)">Subir Archivo</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="docUpload2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Subir Archivo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="upload_form" enctype="multipart/form-data" method="post">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" name="file2" id="file2" accept="application/pdf">
                    </div>
                    <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="height: 20px">
                        <div class="progress-bar progress-bar" style="background-color:#917799" id="progressBar2" value="0" max="100">
                            <p id="loaded_n_total2"></p>
                        </div>
                    </div>
                    <small id="status2"></small>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnModal2" onclick="uploadFile(2)">Subir Archivo</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="docUpload3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Subir Archivo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="upload_form" enctype="multipart/form-data" method="post">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" name="file3" id="file3" accept="application/pdf">
                    </div>
                    <div class="progress" role="progressbar" aria-valuemin="0" aria-valuenow="0" aria-valuemax="100" style="height: 20px">
                        <div class="progress-bar progress-bar" style="background-color:#917799" id="progressBar3" value="0" max="100">
                            <p id="loaded_n_total3"></p>
                        </div>
                    </div>
                    <small id="status3"></small>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnModal3" onclick="uploadFile(3)" >Subir Archivo</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="docUpload4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Subir Archivo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="upload_form" enctype="multipart/form-data" method="post">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" name="file4" id="file4" accept="application/pdf">
                    </div>
                    <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria.valuenow="0" style="height: 20px">
                        <div class="progress-bar progress-bar" style="background-color:#917799" id="progressBar4" value="0" max="100">
                            <p id="loaded_n_total4"></p>
                        </div>
                    </div>
                    <small id="status4"></small>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnModal4" onclick="uploadFile(4)">Subir Archivo</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="docUpload5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Subir Archivo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="upload_form" enctype="multipart/form-data" method="post">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" name="file5" id="file5" accept="application/pdf">
                    </div>
                    <div class="progress" role="progressbar" aria-valuemin="0" aria-valuenow="0" aria-valuemax="100" style="height: 20px">
                        <div class="progress-bar progress-bar" style="background-color:#917799" id="progressBar5" value="0" max="100">
                            <p id="loaded_n_total5"></p>
                        </div>
                    </div>
                    <small id="status5"></small>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnModal5" onclick="uploadFile(5)">Subir Archivo</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="docUpload6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Subir Archivo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="upload_form" enctype="multipart/form-data" method="post">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" name="file6" id="file6" accept="application/pdf">
                    </div>
                    <div class="progress" role="progressbar" aria-valuemin="0" aria-valuenow="0" aria-valuemax="100" style="height: 20px">
                        <div class="progress-bar progress-bar" style="background-color:#917799" id="progressBar6" value="0" max="100">
                            <p id="loaded_n_total6"></p>
                        </div>
                    </div>
                    <small id="status6"></small>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnModal6" onclick="uploadFile(6)">Subir Archivo</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="docUpload7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><strong><i class="bi bi-cloud-arrow-up h2"></i> Subir Tarjeta de Circulación</strong></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="upload_form" enctype="multipart/form-data" method="post">
                    <div class="input-group mb-3">
                    <input type="file" class="form-control" name="file7" id="file7" accept="application/pdf">
                    </div>
                    <div class="progress" role="progressbar" aria-valuemin="0" aria-valuenow="0" aria-valuemax="100" style="height: 20px">
                    <div class="progress-bar progress-bar" style="background-color:#917799" id="progressBar7" value="0" max="100">
                        <small id="status7"></small>
                    </div>
                    </div>
                    <p id="loaded_n_total7"></p>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnModal7" onclick="uploadFile(7)">Subir Archivo</button>
            </div>
        </div>
    </div>
</div>

<!-- Terminan Modales para cargar archivo en pdf o jpg en Tab Documentos -->

';

?>