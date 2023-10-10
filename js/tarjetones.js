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

    if (modelo != "" && marca != "" && annio != "" && numPlaca != "" && serie != "" && folioTarjeton != "" && vigencia  != "") {
        
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
                //var curpTarjeton = jsonData.cuprTarjeton;
                //var numExpediente = jsonData.folioExpediente;
                var expediente = folioExpediente;
                if (verificador == 1) {
                    if (curp == "CURP no registrada"){
                        document.getElementById('agregarVehiculoBtn').disabled = true;
                        alert('No tiene registrada una CURP, actualice Expediente');
                    }
                    else {
                        // codigoQR(curp);
                        // document.getElementById('etiquetaNum').innerHTML = expediente;
                        //console.log(expediente);
                    }
                } else if (verificador == 0){
                    alert('no muestra tabla');
                }
                limpiarInputsVehiculo();
                document.getElementById('vehiculosTabla').hidden = false;
                document.getElementById('folioTPerm').disabled = true;
                document.getElementById('vigenciaPerm').disabled = true;
                document.getElementById('imprimirt').disabled = false;
                mostrarTablaVehiculos();
                document.getElementById('agregarVehiculoBtn').disabled = true;
            }
            

        });
    }
    else{
        alert("No se han llenado todos los campos, verifica...");
    }
}

function habilitaBTNadd(){
    document.getElementById('agregarVehiculoBtn').disabled = false;
}

function mostrarTablaVehiculos(){
    var curpTarjeton = document.getElementById('curpTarjeton').value;

    $.ajax({
        type: "POST",
        url: 'query/queryTablaTarjetones.php',
        dataType:'html',
        data: {
            curpTarjeton:curpTarjeton
        },
        success: function(data){
            $('#vehiculosTabla').fadeIn(1000).html(data);
        }
    });

}

function codigoQR(concatenado,expediente){
    var texto = concatenado.toString();
    /* document.getElementById('matriculaQR2').innerHTML = concatenado; */
    document.getElementById('qrTarjeton').innerHTML = "";
    
// aquí

    var qrcode = new QRCode(document.getElementById("qrTarjeton"), {
        text: texto,
        width: 80,
        height: 80,
        correctLevel: QRCode.CorrectLevel.H
    });

    // Obtener el elemento canvas generado por QRCode.js
    var canvas = document.querySelector("#codigo-qr canvas");

    // Crear un nuevo elemento de imagen para el logo
    //var logo = new Image();
    //logo.src = "imagen.png";

    // Esperar a que el logo se cargue antes de dibujarlo en el canvas
    //logo.onload = function() {
        // Calcular la posición del logo en el centro del código QR
        //var logoSize = qrcode._htOption.width * 0.2; // Tamaño relativo del logo (20%)
        //var xPos = (canvas.width - logoSize) / 2;
        //var yPos = (canvas.height - logoSize) / 2;

        // Dibujar el logo en el canvas
        //var ctx = canvas.getContext("2d");
        //ctx.drawImage(logo, xPos, yPos, logoSize, logoSize);
    //};


}

function limpiarInputsVehiculo(){
    document.getElementById('modeloPerm').value = "";
    document.getElementById('marcaPerm').value = "";
    document.getElementById('annioPerm').value = "";
    document.getElementById('placasPerm').value = "";
    document.getElementById('seriePerm').value = "";
/*     document.getElementById('folioTPerm').value = "";
    document.getElementById('vigenciaPerm').value = ""; */
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

function habilitarBtn(){
    document.getElementById('imprimirt').disabled = false;
}
function deshabilitarBtn(){
    document.getElementById('imprimirt').disabled = true;
}


// consulta de tarjetones si esta existente
function revisarTarjeton(){
    
    var tarjeton = document.getElementById('folioTarjeton').value;

    $.ajax({
        type: "POST",
        url: 'query/queryRevisarTarjeton.php',
        dataType:'json',
        data: {
            tarjeton:tarjeton
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            
            if (success == 1) {

                    document.getElementById('folioTPerm').disabled = true;
                    alert('No tiene registrada una CURP, actualice Expediente');
                
            } else if (verificador == 0){
                alert('no muestra tabla');
            }
            document.getElementById('imprimirt').disabled = false;
        }

    });
    
}

function folioTarjetonPositivo(){
        var folioT = document.getElementById("folioTarjeton").value;
        var vigenciaT = document.getElementById("vigenciaTarjeton").value;
        document.getElementById("folioTPerm").disabled = true;
        document.getElementById("vigenciaPerm").disabled = true;
        document.getElementById("folioTPerm").value = folioT;
        document.getElementById("vigenciaPerm").value = vigenciaT;

}
function folioTarjetonBloqueado(){
        document.getElementById("folioTPerm").disabled = true;
        document.getElementById("vigenciaPerm").disabled = true;


}

function folioTarjetonNegativo(){
    document.getElementById("folioTPerm").disabled = false;
    document.getElementById("folioTPerm").value = "";
    //document.getElementById("textoTarjeton").innerHTML = "<small class='text-primary'>Folio disponible</small>";

}

function borrarVehiculo(id,folio){
    var id = id;
    var folio = folio;

    Swal.fire({
    title: 'Desea eliminar el vehículo?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Sí',
    denyButtonText: 'No',
    }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
        borrarVehiculoDB(id,folio);
        
        Swal.fire('Vehículo eliminado!', '', 'success')
    } else if (result.isDenied) {
        Swal.fire('No se eliminó el vehículo', '', 'info')
    }
    })
}

function borrarVehiculoDB(id,folio){
    var idV = id;
    var folioDV = folio;

    
    $.ajax({
        type: "POST",
        url: 'prcd/borrarVehiculo.php',
        dataType:'json',
        data: {
            idV:idV,
            folioDV:folioDV
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            
            if (success == 1) {
                mostrarTablaVehiculos();
            } else if (success == 0){
                console.log(jsonData.error);
            }
        }

    });
}

function editarVehiculo(id){
    var idV = id;
    var folioDV = document.getElementById('folioDT'+idV).value;
    
    $.ajax({
        type: "POST",
        url: 'prcd/editarVehiculo.php',
        dataType:'json',
        data: {
            idV:idV,
            folioDV:folioDV
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            
            if (success == 1) {
                document.getElementById('marcaPerm2').value = jsonData.marca;
                document.getElementById('modeloPerm2').value = jsonData.modelo;
                document.getElementById('annioPerm2').value = jsonData.annio;
                document.getElementById('placasPerm2').value = jsonData.placa;
                document.getElementById('seriePerm2').value = jsonData.serie;
                document.getElementById('AutoSeguroInput').value = jsonData.autoSeguro;
                document.getElementById('folioDT').value = folioDV;
                document.getElementById('idVe').value = idV;

            } else if (success == 0){
                console.log(jsonData.error);
            }
        }

    });
}

function updateVehiculo(){
    var idV = document.getElementById('idVe').value;
    var folioDV = document.getElementById('folioDT').value;
    var marca =document.getElementById('marcaPerm2').value;
    var modelo =document.getElementById('modeloPerm2').value ;
    var annio =document.getElementById('annioPerm2').value;
    var placa =document.getElementById('placasPerm2').value;
    var serie =document.getElementById('seriePerm2').value;
    var aseguro =document.getElementById('AutoSeguroInput').value;
    $.ajax({
        type: "POST",
        url: 'prcd/actualizarVehiculo.php',
        dataType:'json',
        data: {
            idV:idV,
            folioDV:folioDV,
            marca:marca,
            modelo:modelo,
            annio:annio,
            placa:placa,
            serie:serie,
            aseguro:aseguro
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            console.log(idV);
            if (success == 1) {
                mostrarTablaVehiculos();
                alert('Vehiculo actualizado!');

            } else if (success == 0){
                console.log(jsonData.error);
            }
        }

    });
}

function editarTarjeton(folio){
    var folioTV = folio;
    
    $.ajax({
        type: "POST",
        url: 'prcd/editarVehiculo.php',
        dataType:'json',
        data: {
            idV:idV,
            folioTV:folioTV
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            
            if (success == 1) {
                document.getElementById('marcaPerm2').value = jsonData.marca;
                document.getElementById('modeloPerm2').value = jsonData.modelo;
                document.getElementById('annioPerm2').value = jsonData.annio;
                document.getElementById('placasPerm2').value = jsonData.placa;
                document.getElementById('seriePerm2').value = jsonData.serie;
                document.getElementById('AutoSeguroInput').value = jsonData.autoSeguro;
                document.getElementById('folioDT').value = folioDV;
                document.getElementById('idVe').value = idV;

            } else if (success == 0){
                console.log(jsonData.error);
            }
        }

    });
}

function reemplazaTarjeton(){
    var folioDV = document.getElementById('folioDT').value;
    var marca =document.getElementById('marcaPerm2').value;
    var modelo =document.getElementById('modeloPerm2').value ;
    var annio =document.getElementById('annioPerm2').value;
    var placa =document.getElementById('placasPerm2').value;
    var serie =document.getElementById('seriePerm2').value;
    var aseguro =document.getElementById('AutoSeguroInput').value;
    $.ajax({
        type: "POST",
        url: 'prcd/cambiarTarjeton.php',
        dataType:'json',
        data: {
            idV:idV,
            folioDV:folioDV,
            marca:marca,
            modelo:modelo,
            annio:annio,
            placa:placa,
            serie:serie,
            aseguro:aseguro
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            console.log(idV);
            if (success == 1) {
                mostrarTablaVehiculos();
                alert('Vehiculo actualizado!');

            } else if (success == 0){
                console.log(jsonData.error);
            }
        }

    });
}

function desbloquearInputsT(x){
    var z = x.length;

    if (z >= 1){
        document.getElementById('marcaPerm').disabled = false;
        document.getElementById('modeloPerm').disabled = false;
        document.getElementById('placasPerm').disabled = false;
        document.getElementById('annioPerm').disabled = false;
        document.getElementById('seriePerm').disabled = false;
        document.getElementById('folioTPerm').disabled = false; 
        document.getElementById('vigenciaPerm').disabled = false; 
    }
    else{
        document.getElementById('marcaPerm').disabled = true;
        document.getElementById('modeloPerm').disabled = true;
        document.getElementById('placasPerm').disabled = true;
        document.getElementById('annioPerm').disabled = true;
        document.getElementById('seriePerm').disabled = true;
        document.getElementById('folioTPerm').disabled = true; 
        document.getElementById('vigenciaPerm').disabled = true; 
    }
}