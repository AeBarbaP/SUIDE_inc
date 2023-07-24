function vehiculoAdd(){
    var cuprTarjeton = document.getElementById('cuprTarjeton').value;
    var numExpediente = document.getElementById('numExpediente').value;

    var tipoTarjeton = document.getElementById('tipoTarjeton').value;
    var modelo = document.getElementById('modeloPerm').value;
    var marca = document.getElementById('marcaPerm').value;
    var annio = document.getElementById('annioPerm').value;
    var numPlaca = document.getElementById('placasPerm').value;
    var serie = document.getElementById('seriePerm').value;
    var folioTarjeton = document.getElementById('folioTPerm').value;
    var vigencia = document.getElementById('vigenciaPerm').value;
    var autoSeguro = document.getElementById('AutoSeguroInput').value;
    
    $.ajax({
        type: "POST",
        url: 'prcd/guardarVehiculo.php',
        dataType:'json',
        data: {
            cuprTarjeton:cuprTarjeton,
            numExpediente:numExpediente,
            tipoTarjeton:tipoTarjeton,
            modelo:modelo,
            marca:marca,
            annio:annio,
            numPlaca:numPlaca,
            serie:serie,
            folioTarjeton:folioTarjeton,
            vigencia:vigencia,
            autoSeguro:autoSeguro
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
