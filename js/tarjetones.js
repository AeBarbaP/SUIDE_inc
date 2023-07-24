function vehiculoAdd(){
    var curp_exp = document.getElementById('curp_exp').value;
    var unitario = document.getElementById('numExpediente').value;

    var tipoSolicitud = document.getElementById('tipoTarjeton').value;
    var fechaSolicitud = document.getElementById('marcaPerm').value;
    var folioSolicitud = document.getElementById('annioPerm').value;
    var detalleSolicitud = document.getElementById('placasPerm').value;
    var cantidadArt = document.getElementById('seriePerm').value;
    var monto_solicitud = document.getElementById('folioTPerm').value;
    
    $.ajax({
        type: "POST",
        url: 'prcd/guardarApoyo.php',
        dataType:'json',
        data: {
            curp_exp:curp_exp,
            tipoSolicitud:tipoSolicitud,
            fechaSolicitud:fechaSolicitud,
            folioSolicitud:folioSolicitud,
            detalleSolicitud:detalleSolicitud,
            cantidadArt:cantidadArt,
            unitario:unitario,
            monto_solicitud:monto_solicitud
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var verificador = jsonData.success;
            if (verificador == 1) {
                mostrarTabla();
                mostrarTablaServicios();
                limpiaInputsFunc();
                
            } else if (verificador == 0){
                alert('no muestra tabla');
            }
            document.getElementById('btnEntregaApoyo').disabled = false;
        }

    });
}
