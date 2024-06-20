<?php
echo'
    <!-- Inicia modal para reemplazar tarjetón de padrón asignado-->
    
    <div class="modal fade" id="reemplazarTarjeton" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Reemplazar Tarjetón</h1>
                    <button type="button" class="btn-close" aria-label="Close" data-bs-toggle="modal" data-bs-target="#tarjetongen"></button>
                </div>
                <div class="modal-body">
                    <label>Folio Tarjetón:</label>
                    <div class="input-group mt-2">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-123 "></i></span>
                        <input type="text" class="form-control" onkeypress="ValidaSoloNumeros()" placeholder="# de del tarjetón a asignar" aria-label="folioTarjeton" aria-describedby="basic-addon1" id="folioTPermC">
                    </div>
                    <label class="mt-1">Vigencia:</label>
                    <div class="input-group mt-2">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar4-range me-2"></i></span>
                        <select class="form-select" id="vigenciaPermC" aria-label="Default select example">
                            <option selected>Selecciona...</option>
                            <option value="730">2 años</option>
                            <option value="2190">6 años</option>
                        </select>
                    </div>
                    <input type="text" id="folioDT" hidden>
                    <input type="text" id="idVe" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#tarjetongen">Cerrar</button>
                    <button type="button" onclick="reemplazaTarjeton(); buscarExpediente2()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tarjetongen">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Termina modal para editar folio de tarjetón de padrón asignado -->

';
?>