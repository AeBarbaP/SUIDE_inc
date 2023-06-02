$(document).ready(function() {
    $('#generalesForm').submit(function(e) {
        
        /* Datos Generales */
        var nombre = document.getElementById('nombre').value;
        var apellidoP = document.getElementById('apellidoP').value;
        var apellidoM = document.getElementById('apellidoM').value;
        var generoF = document.getElementById('generoF');
        var generoM = document.getElementById('generoM');
        var generoO = document.getElementById('generoO');
        var edad = document.getElementById('edad').value;
        var edoCivil = document.getElementById('edoCivil').value;
        var curp = document.getElementById('curp').value;
        var rfc = document.getElementById('rfc').value;
        var fechaNacimiento = document.getElementById('fechaNacimiento').value;
        var lugarNacimiento = document.getElementById('lugarNacimiento').value;
        var domicilio = document.getElementById('domicilio').value;
        var numExt = document.getElementById('numExt').value;
        var numInt = document.getElementById('numInt').value;
        var colonia = document.getElementById('colonia').value;
        var entreVialidades = document.getElementById('entreVialidades').value;
        var descripcionLugar = document.getElementById('descripcionLugar').value;
        var localidad = document.getElementById('localidad').value;
        var municipio = document.getElementById('municipio').value;
        var codigoPostal = document.getElementById('codigoPostal').value;
        var telFijo = document.getElementById('telFijo').value;
        var celular = document.getElementById('celular').value;
        var escolaridad = document.getElementById('escolaridad').value;
        var estudiaSi = document.getElementById('estudiaSi');
        var estudiaNo = document.getElementById('estudiaNo');
        var habilidad = document.getElementById('habilidad').value;
        var profesion = document.getElementById('profesion').value;
        var trabajaSi = document.getElementById('trabajaSi');
        var trabajaNo = document.getElementById('trabajaNo');
        var ingresoMensual = document.getElementById('ingresoMensual').value;
        var asociacionSi = document.getElementById('asociacionSi');
        var asociacionNo = document.getElementById('asociacionNo');
        var sindicatoSi = document.getElementById('sindicatoSi');
        var sindicatoNo = document.getElementById('sindicatoNo');
        var pensionSi = document.getElementById('pensionSi');
        var pensionNo = document.getElementById('pensionNo');
        var seguridadsocial = document.getElementById('seguridadsocial').value;
        var otroSS = document.getElementById('otroSS').value;


        if(generoF.checked){
            var genero = 1;
        }
        else if (generoM.checked){
            var genero = 0;
        }
        else if (generoO.checked){
            var genero = 2;
        }
        if(estudiaSi.checked){
            var estudia = 1;
            var estudiaLugar = document.getElementById('lugarEstudia').value;
            document.getElementById('lugarEstudia').required = true;
        }
        else if (estudiaNo.checked){
            var estudia = 0;
            document.getElementById('lugarEstudia').required = false;
        }
        if(trabajaSi.checked){
            var trabaja = 1;
            var trabajaLugar = document.getElementById('lugarTrabajo').value;
            document.getElementById('lugarTrabajo').required = true;
        }
        else if (trabajaNo.checked){
            var trabaja = 0;
            document.getElementById('lugarTrabajo').required = false;
        }
        if(asociacionSi.checked){
            var asociacion = 1;
            var nombreAC = document.getElementById('nombreAC').value;
            document.getElementById('nombreAC').required = true;
        }
        else if(asociacionNo.checked){
            var asociacion = 0;
            document.getElementById('nombreAC').required = false;
        }
        if(sindicatoSi.checked){
            var sindicato = 1;
            var nombreSindicato = document.getElementById('nombreSindicato').value;
            document.getElementById('nombreSindicato').required = true;
        }
        else if(sindicatoNo.checked){
            var sindicato = 0;
            document.getElementById('nombreSindicato').required = false;
        }
        if(pensionSi.checked){
            var pension = 1;
            var pensionInst = document.getElementById('instPension').value;
            var pensionMonto = document.getElementById('montoP').value;
            var pensionTemporalidad = document.getElementById('periodo').value;
            document.getElementById('instPension').required = true;
            document.getElementById('montoP').required = true;
            document.getElementById('periodo').required = true;
        }
        else if (pensionNo.checked){
            var pension = 0;
            document.getElementById('instPension').required = false;
            document.getElementById('montoP').required = false;
            document.getElementById('periodo').required = false;
        }
        /* e.preventDefault(); */
        $.ajax({
            type: "POST",
            url: 'prcd/guardar.php',
            dataType:'json',
            data: {
                nombre:nombre,
                apellidoP:apellidoP,
                apellidoM:apellidoM,
                genero:genero,
                edad:edad,
                edoCivil:edoCivil,
                curp:curp,
                rfc:rfc,
                fechaNacimiento:fechaNacimiento,
                lugarNacimiento:lugarNacimiento,
                domicilio:domicilio,
                numExt:numExt,
                numInt:numInt,
                colonia:colonia,
                entreVialidades:entreVialidades,
                descripcionLugar:descripcionLugar,
                localidad:localidad,
                municipio:municipio,
                codigoPostal:codigoPostal,
                telFijo:telFijo,
                celular:celular,
                escolaridad:escolaridad,
                estudia:estudia,
                estudiaLugar:estudiaLugar,
                habilidad:habilidad,
                profesion:profesion,
                trabaja:trabaja,
                trabajaLugar:trabajaLugar,
                ingresoMensual:ingresoMensual,
                asociacion:asociacion,
                nombreAC:nombreAC,
                sindicato:sindicato,
                nombreSindicato:nombreSindicato,
                pension:pension,
                pensionInst:pensionInst,
                pensionMonto:pensionMonto,
                pensionTemporalidad:pensionTemporalidad,
                seguridadsocial:seguridadsocial,
                otroSS:otroSS,
            },
            success: function(response){
                var jsonData = JSON.parse(JSON.stringify(response));
                
                var verificador = jsonData.succes;
                if (verificador = 1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos Generales han sido guardados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    document.getElementById('img1').hidden = true;
                    var texto = 'BAPA821212MJCRNN04';
                    var qrcode = new QRCode(document.getElementById("imgQR"), {
                        text: texto,
                        width: 250,
                        height: 250,
                        correctLevel: QRCode.CorrectLevel.H
                    });
                    document.getElementById('nav-medicos-tab').disabled = false;
                    document.getElementById('nav-generales-tab').disabled = true;
                }
                else if (verificador = 2){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Datos Generales NO han sido guardados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });
        e.preventDefault();

    })
})

