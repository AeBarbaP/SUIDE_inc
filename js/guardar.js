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
        var correo = document.getElementById('correo').value;
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
                correo:correo,
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
                var curpSaved = jsonData.curp;
                if (verificador = 1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos Generales han sido guardados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    document.getElementById('img1').hidden = true;
                    var qrcode = new QRCode(document.getElementById("imgQR"), {
                        text: curpSaved,
                        width: 250,
                        height: 250,
                        correctLevel: QRCode.CorrectLevel.H
                    });
                    document.getElementById('nav-medicos-tab').disabled = false;
                    document.getElementById('nav-generales-tab').disabled = true;
                    document.getElementById('curp_exp').value = curpSaved;
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

$(document).ready(function() {
    $('#medicosForm').submit(function(e) {
        /* Datos Médicos */
        /* var concatenado1 = document.querySelectorAll('#alergiasFull.badge').getAttribute('id'); */
        var curp_exp = document.getElementById('curp_exp').value;
        var discapacidad = document.getElementById('discapacidad').value;
        var gradoDisc = document.getElementById('gradoDisc').value;
        var tipoDisc = document.getElementById('tipoDisc').value;
        var causaDisc = document.getElementById('causaDisc').value;
        var especifiqueD = document.getElementById('especifiqueD').value;
        var temporalidad = document.getElementById('temporalidad').value;
        var fuente = document.getElementById('fuente').value;
        var fechaValoracion = document.getElementById('fechaValoracion').value;
        var rehabilitacionSi = document.getElementById('rehabilitacionSi');
        var rehabilitacionNo = document.getElementById('rehabilitacionNo');
        var tipoSangre = document.getElementById('tipoSangre').value;
        var cirugia = document.getElementById('cirugia').value;
        var tipoCirugia = document.getElementById('tipoCirugia').value;
        var protesis = document.getElementById('protesis').value;
        var tipoProtesis = document.getElementById('tipoProtesis').value;
        var alergias = document.getElementById('alergias').value;
        var alergiasFull = document.getElementById('alergiasFull').value;
        var enfermedades = document.getElementById('enfermedades').value;
        var enfermedadesFull = document.getElementById('enfermedadesFull').value;
        var medicamentos = document.getElementById('medicamentos').value;
        var medicamentosFull = document.getElementById('medicamentosFull').value;

        if(rehabilitacionSi.checked){
            var rehabilitacion = 1;
            var lugarRehab = document.getElementById('lugarRehab').value;
            var fechaIni = document.getElementById('fechaIni').value;
            var duracion = document.getElementById('duracion').value;
            document.getElementById('lugarRehab').required = true;
            document.getElementById('fechaIni').required = true;
            document.getElementById('duracion').required = true;
        }
        else if (rehabilitacionNo.checked){
            var rehabilitacion = 0;
            var lugarRehab = 0;
            var fechaIni = 0;
            var duracion = 0;
            document.getElementById('lugarRehab').required = false;
        }
        
        $.ajax({
            type: "POST",
            url: 'prcd/guardarmedicos.php',
            dataType:'json',
            data: {
                curp_exp:curp_exp,
                discapacidad:discapacidad,
                gradoDisc:gradoDisc,
                tipoDisc:tipoDisc,
                causaDisc:causaDisc,
                especifiqueD:especifiqueD,
                temporalidad:temporalidad,
                fuente:fuente,
                fechaValoracion:fechaValoracion,
                rehabilitacion:rehabilitacion,
                lugarRehab:lugarRehab,
                fechaIni:fechaIni,
                duracion:duracion,
                tipoSangre:tipoSangre,
                cirugia:cirugia,
                tipoCirugia:tipoCirugia,
                protesis:protesis,
                tipoProtesis:tipoProtesis,
                alergias:alergias,
                alergiasFull:alergiasFull,
                enfermedades:enfermedades,
                enfermedadesFull:enfermedadesFull,
                medicamentos:medicamentos,
                medicamentosFull:medicamentosFull
            },
            success: function(response){
                var jsonData = JSON.parse(JSON.stringify(response));

                var verificador = jsonData.succes;

                if (verificador = 1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos Médicos han sido guardados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    document.getElementById('nav-medicos-tab').disabled = true;
                    document.getElementById('nav-generales-tab').disabled = true;
                    document.getElementById('nav-vivienda-tab').disabled = false;
                }
                else if (verificador = 2){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Datos Médicos NO han sido guardados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });
        e.preventDefault();

    })
})

function queryTabAlergias(x){
    var alergias = x;
    $.ajax({
        type: "POST",
        url: 'prcd/guardarmedicos.php',
        dataType:'json',
        data: {
            alergias:alergias
        },
        success: function(response){
            
        }
    });
}

$(document).ready(function() {
    $('#viviendaForm').submit(function(e) {
        /* Datos Médicos */
        var curp_exp = document.getElementById('curp_exp').value;
        var vivienda = document.getElementById('vivienda').value;
        var montoVivienda = document.getElementById('montoVivienda').value;
        var viviendaP = document.getElementById('viviendaP').value;
        var tipoVivienda = document.getElementById('tipoVivienda').value;
        var numHabitaciones = document.getElementById('numHabitaciones').value;
        var cocina = document.getElementById('cocina').value;
        var sala = document.getElementById('sala').value;
        var bath = document.getElementById('bath').value;
        var otroRoom = document.getElementById('otroRoom');
        var otroRoomInput = document.getElementById('otroRoomInput');
        var lamina = document.getElementById('lamina').value;
        var cemento = document.getElementById('cemento').value;
        var otroTecho = document.getElementById('otroTecho').value;
        var block = document.getElementById('protesis').value;
        var ladrillo = document.getElementById('tipoProtesis').value;
        var adobe = document.getElementById('alergias').value;
        var otroPared = document.getElementById('alergiasFull').value;
        var otroParedInput = document.getElementById('enfermedades').value;
        var enfermedadesFull = document.getElementById('enfermedadesFull').value;
        var medicamentos = document.getElementById('medicamentos').value;
        var medicamentosFull = document.getElementById('medicamentosFull').value;

        if(lamina.checked){
            var techo = 1;
            
        }
        else if (cemento.checked){
            var techo = 2;
            
        }
        else if (otroTecho.checked){
            var techo = 3;
            var otroTechoInput = document.getElementById('otroTechoInput').value;
            
        }
        
        $.ajax({
            type: "POST",
            url: 'prcd/guardarvivienda.php',
            dataType:'json',
            data: {
                curp_exp:curp_exp,
                discapacidad:discapacidad,
                gradoDisc:gradoDisc,
                tipoDisc:tipoDisc,
                causaDisc:causaDisc,
                especifiqueD:especifiqueD,
                temporalidad:temporalidad,
                fuente:fuente,
                fechaValoracion:fechaValoracion,
                rehabilitacion:rehabilitacion,
                lugarRehab:lugarRehab,
                fechaIni:fechaIni,
                duracion:duracion,
                tipoSangre:tipoSangre,
                cirugia:cirugia,
                tipoCirugia:tipoCirugia,
                protesis:protesis,
                tipoProtesis:tipoProtesis,
                alergias:alergias,
                alergiasFull:alergiasFull,
                enfermedades:enfermedades,
                enfermedadesFull:enfermedadesFull,
                medicamentos:medicamentos,
                medicamentosFull:medicamentosFull
            },
            success: function(response){
                var jsonData = JSON.parse(JSON.stringify(response));

                var verificador = jsonData.succes;

                if (verificador = 1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos Médicos han sido guardados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    document.getElementById('nav-medicos-tab').disabled = true;
                    document.getElementById('nav-generales-tab').disabled = true;
                    document.getElementById('nav-vivienda-tab').disabled = false;
                }
                else if (verificador = 2){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Datos Médicos NO han sido guardados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });
        e.preventDefault();

    })
})

