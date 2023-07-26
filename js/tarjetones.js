function vehiculoAdd(){
    var expediente = document.getElementById('searchDBInclusion2').value;
    var curp = document.getElementById('curpShows').innerHTML;
    var folioExpediente = document.getElementById('numExpediente').innerHTML;
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
/*             var curpTarjeton = jsonData.cuprTarjeton;
            var numExpediente = jsonData.numExpediente; */
            if (verificador == 1) {
            } else if (verificador == 0){
                alert('no muestra tabla');
            }
            limpiarInputsVehiculo();
            document.getElementById('vehiculosTabla').hidden = false;
            document.getElementById('folioTPerm').disabled = true;
            document.getElementById('vigenciaPerm').disabled = true;
            mostrarTablaVehiculos();
        }
        

    });
}

function habilitaBTNadd(){
    document.getElementById('agregarVehiculoBtn').disabled = false;
}

function mostrarTablaVehiculos(){
    var curpTarjeton = document.getElementById('curpShows').innerHTML;

    $.ajax({
        type: "POST",
        url: 'query/queryTablaTarjetones.php',
        dataType:'html',
        data: {
            curpTarjeton:curpTarjeton,
        },
        success: function(data){
            $('#vehiculosTabla').fadeIn(1000).html(data);
        }
    });

}

function limpiarInputsVehiculo(){
    document.getElementById('modeloPerm').value = "";
    document.getElementById('marcaPerm').value = "";
    document.getElementById('annioPerm').value = "";
    document.getElementById('placasPerm').value = "";
    document.getElementById('seriePerm').value = "";
    /* document.getElementById('folioTPerm').value = ""; */
    /* document.getElementById('vigenciaPerm').value = ""; */
    document.getElementById('checkAutoS').checked = false;
    document.getElementById('AutoSeguroInput').value = "";
}

function limpiaModalTarjeton(){
    document.getElementById('searchDBInclusion2').value = "";
    document.getElementById('modeloPerm').value = "";
    document.getElementById('marcaPerm').value = "";
    document.getElementById('annioPerm').value = "";
    document.getElementById('placasPerm').value = "";
    document.getElementById('seriePerm').value = "";
    document.getElementById('folioTPerm').value = "";
    document.getElementById('vigenciaPerm').value = "";
    document.getElementById('checkAutoS').checked = false;
    document.getElementById('AutoSeguroInput').value = "";
    document.getElementById('curpTarjeton').value = "";
    document.getElementById('numExpediente').value = "";
    document.getElementById('agregarVehiculoBtn').disabled = true;
    document.getElementById('tarjeton').hidden = true;
    document.getElementById('vehiculosTabla').hidden = true;
}
