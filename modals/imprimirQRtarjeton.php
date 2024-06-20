<?php
echo '

<!-- Inicia modal para imprimir qr -->

    <div class="modal fade" id="qrShows" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Código QR Tarjetón</h1>
                    <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#tarjetongen" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <strong>
                        <div class="text-center" style="font-family: Verdana, Geneva, Tahoma, sans-serif;  font-size:large" id="etiquetaNum">
                    
                        </div>
                    </strong>
                    <div class="text-center" id="qrTarjeton">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" id="etiquetanumbtn"  class="btn btn-primary" onclick="imprimirEtiqueta(\'etiquetaNum\')"><i class="bi bi-printer"></i> # Expediente</button>
                    <button type="button" id="qrTarjetonbtn" class="btn btn-primary" onclick="imprimirSeleccion(\'qrTarjeton\')"><i class="bi bi-printer-fill"></i> Imprimir QR</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Termina modal para imprimir qr -->

';
?>