<?php
    echo '
    <div class="modal fade" id="credgen" tabindex="-1" aria-labelledby="generacredencial" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generar Credencial con QR</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="height: 620px;">
                <div class="input-group mb-1 mt-2 w-50">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                    <input class="form-control" id="searchDBcredencial" oninput="buscarExpediente(this.value)" onkeypress="ValidaSoloNumeros()"  placeholder="Buscar...">
                </div><!-- input group -->
                <br>
                <div class="container text-center">
                    <div class="card mb-3" style="width: 100%;">
                    <form action="prcd/generaqrcredencial2.php" target="_blank" id="form-id"  method="POST"><!--form-->
                    <div class="row g-0" id="credencial">
                        
                    </div><!-- row -->
                    </form>
                    </div><!-- card -->
                </div><!-- container -->
                </div><!-- modal body -->
                
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="habilitaimprimirc" onclick="swaldatoscrd();"><i class="bi bi-save2"></i> Generar Credencial</button>
                <!-- <button type="button" class="btn btn-primary" id="imprimirc" data-bs-target="#credencialpreview" data-bs-toggle="modal" disabled><i class="bi bi-printer"></i> Imprimir</button> -->
                </div><!-- modal footer -->
            </div><!-- modal content -->
        </div><!-- modal dialog -->
    </div><!-- modal -->
    ';
?>