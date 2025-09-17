<?php

    echo '
    <!-- Modal -->
    <div class="modal fade bg-info" id="curpActualizar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar CURP</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="window.location.reload()"></button>
            </div>
            <div class="modal-body">
    
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-credit-card-2-front"></i></span>
                    <input type="text" class="form-control" placeholder="CURP" aria-label="CURP" id="sinCurpUpdate" aria-describedby="basic-addon1" onkeyup="javascript:this.value=this.value.toUpperCase()" onblur="validarInputCurpSinCurp(this)">
                    <input type="text" class="form-control" placeholder="id" aria-label="id" id="idUpdate" aria-describedby="basic-addon1" hidden>
                </div>

                <div class="alert alert-warning text-center" role="alert">
                    <i class="bi bi-exclamation-diamond me-2" style="font-size: 3rem;"></i><br>Usuario(a) sin CURP registrada, es necesario capturarla para continuar.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="window.location.reload()">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnUpdateCURP" onclick="actualizarCURP()" disabled>Guardar</button>
            </div>
            </div>
        </div>
    </div>
    ';

?>