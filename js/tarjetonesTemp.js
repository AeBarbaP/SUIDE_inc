function vehiculoTempAdd(){
    var curp = document.getElementById('curpTemp').value;
    var tipoTarjeton = 2;
    var modelo = document.getElementById('modeloTemp').value;
    var marca = document.getElementById('marcaTemp').value;
    var annio = document.getElementById('annioTemp').value;
    var numPlaca = document.getElementById('placasTemp').value;
    var serie = document.getElementById('serieTemp').value;
    var folioTarjeton = document.getElementById('folioTTemp').value;
    var vigencia = document.getElementById('vigenciaTemp').value;
    var autoSeguro = document.getElementById('AutoSeguroTemp').value;
    var expediente = "PRÉSTAMO";
    var folioExpediente = "PRÉSTAMO";
    
    $.ajax({
        type: "POST",
        url: 'prcd/guardarVehiculo.php',
        dataType:'json',
        data: {
            expediente:expediente,
            folioExpediente:folioExpediente,
            curp:curp,
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
            } else if (verificador == 0){
                alert('no muestra tabla');
            }
            limpiarInputsVehiculoTemp();
            document.getElementById('vehiculosTemp').hidden = false;
            document.getElementById('folioTTemp').disabled = true;
            document.getElementById('vigenciaTemp').disabled = true;
            mostrarTablaVehiculosTemp();
        }
        

    });
}

function habilitaBTNaddTemp(){
    document.getElementById('agregarVehiculoTempBtn').disabled = false;
}

function mostrarTablaVehiculosTemp(){
    var curpTarjeton = document.getElementById('curpTemp').value;

    $.ajax({
        type: "POST",
        url: 'query/queryTablaTarjetones.php',
        dataType:'html',
        data: {
            curpTarjeton:curpTarjeton,
        },
        success: function(data){
            $('#vehiculosTemp').fadeIn(1000).html(data);
        }
    });

}

function limpiarInputsVehiculoTemp(){
    document.getElementById('modeloTemp').value = "";
    document.getElementById('marcaTemp').value = "";
    document.getElementById('annioTemp').value = "";
    document.getElementById('placasTemp').value = "";
    document.getElementById('serieTemp').value = "";
    document.getElementById('checkAutoST').checked = false;
    document.getElementById('AutoSeguroTemp').value = "";
    document.getElementById('habilitaimprimirtt').disabled = false;
}

function limpiaModalTarjetonTemp(){
    document.getElementById('apPaterno').value = "";
    document.getElementById('apMaterno').value = "";
    document.getElementById('nombreTemp').value = "";
    document.getElementById('curpTemp').value = "";
    document.getElementById('idClaveTemp').value = "";
    document.getElementById('telcelTemp').value = "";
    document.getElementById('correoTemp').value = "";
    document.getElementById('calleTemp').value = "";
    document.getElementById('extTemp').value = "";
    document.getElementById('intTemp').value = "";
    document.getElementById('coloniaTemp').value = "";
    document.getElementById('CPTemp').value = "";
    document.getElementById('estadoTemp').value = "";
    document.getElementById('municipioTemp').value = "";
    document.getElementById('localidadTemp').value = "";
    document.getElementById('tipoDiscTemp').value = "";
    document.getElementById('discapacidadTemp').value = "";
    document.getElementById('gradoDiscTemp').value = "";
    document.getElementById('dxTemp').value = "";
    document.getElementById('temporalidad').value = "Selected";
    document.getElementById('institucionTemp').value = "";
    document.getElementById('medicoTemp').value = "";
    document.getElementById('cedulaTemp').value = "";
    document.getElementById('fechaValTemp').value = "";
    document.getElementById('modeloTemp').value = "";
    document.getElementById('marcaTemp').value = "";
    document.getElementById('annioTemp').value = "";
    document.getElementById('placasTemp').value = "";
    document.getElementById('serieTemp').value = "";
    document.getElementById('checkAutoST').checked = false;
    document.getElementById('AutoSeguroTemp').value = "";
    document.getElementById('modeloTemp').disabled = true;
    document.getElementById('marcaTemp').disabled = true;
    document.getElementById('annioTemp').disabled = true;
    document.getElementById('placasTemp').disabled = true;
    document.getElementById('serieTemp').disabled = true;
    document.getElementById('checkAutoST').disabled = true;
    document.getElementById('vehiculosTemp').hidden = true;
    document.getElementById('apPaterno').disabled = false;
    document.getElementById('apMaterno').disabled = false;
    document.getElementById('nombreTemp').disabled = false;
    document.getElementById('curpTemp').disabled = false;
    document.getElementById('idClaveTemp').disabled = false;
    document.getElementById('telcelTemp').disabled = false;
    document.getElementById('correoTemp').disabled = false;
    document.getElementById('calleTemp').disabled = false;
    document.getElementById('extTemp').disabled = false;
    document.getElementById('intTemp').disabled = false;
    document.getElementById('coloniaTemp').disabled = false;
    document.getElementById('CPTemp').disabled = false;
    document.getElementById('estadoTemp').disabled = false;
    document.getElementById('municipioTemp').disabled = false;
    document.getElementById('localidadTemp').disabled = false;
    document.getElementById('tipoDiscTemp').disabled = false;
    document.getElementById('discapacidadTemp').disabled = false;
    document.getElementById('gradoDiscTemp').disabled = false;
    document.getElementById('dxTemp').disabled = false;
    document.getElementById('temporalidad').disabled = false;
    document.getElementById('institucionTemp').disabled = false;
    document.getElementById('medicoTemp').disabled = false;
    document.getElementById('cedulaTemp').disabled = false;
    document.getElementById('fechaValTemp').disabled = false;
    document.getElementById('temporalidad').disabled = false;
    document.getElementById('habilitaimprimirtt').disabled = true;
}
