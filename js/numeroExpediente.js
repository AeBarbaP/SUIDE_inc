
function numExpGenerator(x){
        var cveDiscapacidad = x.substr(0,2),
            curp = document.getElementById('curp_exp').value;
        $.ajax({
            type:"POST",
            url:"query/queryExpediente.php",
            data:{
                cveDiscapacidad:cveDiscapacidad,
                curp:curp
            },
            dataType: "html",
            cache: false,
                success: function(response)
                { 
                $('#numeroExpediente').fadeIn(1000).html(response);
                }
            });
    }
function numExpUpdate(x){
    var municipio = x;
    var numExpediente2 = document.getElementById('numeroExpediente').innerHTML;
    var expediente = numExpediente2.substr(0,7);
    var expedienteNum = numExpediente2.substr(7,5);
    var municipioClave = municipio.substr(3,2);
    var discapacidadClave = expediente.substr(4,2);
    var curp = document.getElementById('curp').value;
    document.getElementById('idUsuario').value = expedienteNum;
    document.getElementById('numeroTemporal2').value = expediente;
    document.getElementById('municipioChange').value = municipioClave;
    document.getElementById('discapacidadChange').value = discapacidadClave;
    var numeroNuevo = "C-"+municipioClave+discapacidadClave+'-'+expedienteNum;
    //var nuevoNumExp = trimEnd(numeroNuevo);
    document.getElementById('numeroExpediente').innerHTML = numeroNuevo;
    $.ajax({
            type:"POST",
            url:"prcd/editarNumExpediente.php",
            data:{
                numeroNuevo:numeroNuevo,
                expedienteNum:expedienteNum,
                curp:curp
            },
            dataType: "html",
            cache: false,
                success: function(response)
                { 
                    console.log('Numero Expediente actualizado');
                }
            });
}
function numExpUpdateDiscapacidad(x){
    var discapacidad = x;
    var numExpediente2 = document.getElementById('numeroExpediente').innerHTML;
    var expediente = numExpediente2.substr(0,7);
    var expedienteNum = numExpediente2.substr(7,5);
    var discapacidadClave = discapacidad.substr(0,2);
    var municipioClave = document.getElementById('municipioChange').value;
    var curp = document.getElementById('curp').value;
    document.getElementById('idUsuario').value = expedienteNum;
    document.getElementById('numeroTemporal2').value = expediente;
    document.getElementById('discapacidadChange').value = discapacidadClave;
    var numeroNuevo = "C-"+municipioClave+discapacidadClave+'-'+expedienteNum;
    document.getElementById('numeroExpediente').innerHTML = numeroNuevo;
    $.ajax({
        type:"POST",
        url:"prcd/editarNumExpediente.php",
        data:{
            numeroNuevo:numeroNuevo,
            expedienteNum:expedienteNum,
            curp:curp
        },
        dataType: "html",
        cache: false,
        success: function(response)
        { 
            console.log('Numero Expediente actualizado');
        }
    });
}
