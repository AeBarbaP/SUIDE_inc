<?php

    echo '
    <!-- Modal -->
    <div class="modal fade bg-info" id="actualizarCurp" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar CURP</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
    
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-credit-card-2-front"></i></span>
                    <input type="text" class="form-control" placeholder="CURP" aria-label="CURP" id="curpCambiar" aria-describedby="basic-addon1" onblur="validarInputCurp(this)">
                </div>
                <span id="result-usernameUpdate" class="small"></span>

                <div class="alert alert-warning text-center mt-3" role="alert">
                    <i class="bi bi-eye me-2" style="font-size: 2rem;"></i><br>Se actualizará la CURP en toda la información del usuario.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnUpdateCURP2" onclick="actualizarCURP2()" disabled>Guardar</button>
            </div>
            </div>
        </div>
    </div>
    ';

?>