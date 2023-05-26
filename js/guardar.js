$(document).ready(function() {
    $('#generalesForm').submit(function(e) {
        /* Datos Generales */
        var nombre = document.getElementById('nombre').value;
        var apellidoP = document.getElementById('apellidoP').value;
        var apellidoM = document.getElementById('apellidoM').value;
        var genero = document.getElementById('genero').value;
        var edad = document.getElementById('edad').value;
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
        var estudia = document.getElementById('estudia').value;
        var habilidad = document.getElementById('habilidad').value;
        var profesion = document.getElementById('profesion').value;
        var trabaja = document.getElementById('trabaja').value;
        var ingresoMensual = document.getElementById('ingresoMensual').value;
        var asociacion = document.getElementById('asociacion').value;
        var sindicato = document.getElementById('sindicato').value;
        var pension = document.getElementById('pension').value;
        var seguridadsocial = document.getElementById('seguridadsocial').value;

        e.preventDefault();

        $.ajax({
            type: "POST",
            url: '',
            dataType:'json',
            data: {
                nombre:nombre,
                apellidoP:apellidoP,
                apellidoM:apellidoM,
                genero:genero,
                edad:edad,
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
                lugarEstudia:lugarEstudia,
                habilidad:habilidad,
                profesion:profesion,
                trabaja:trabaja,
                lugarTrabajo:lugarTrabajo,
                ingresoMensual:ingresoMensual,
                asociacion:asociacion,
                nombreAC:nombreAC,
                sindicato:sindicato,
                nombreSindicato:nombreSindicato,
                pension:pension,
                montoP:montoP,
                periodo:periodo,
                seguridadsocial:seguridadsocial,
                otroSS:otroSS
            }

        })
    })
})

function estudiaOp(x){
    var estudia = x;

    if (estudia == 1){
        document.getElementById('lugarEstudia').disabled = false;
        
    } else {
        document.getElementById('lugarEstudia').disabled = true;
    }
}
function trabajaOp(x){
    var trabaja = x;

    if (trabaja == 1){
        document.getElementById('lugarTrabajo').disabled = false;
        document.getElementById('ingresoMensual').disabled = false;
    } else {
        document.getElementById('lugarTrabajo').disabled = true;
        document.getElementById('ingresoMensual').disabled = true;
    }
}
function asociacionOp(x){
    var asociacion = x;

    if (asociacion == 1){
        document.getElementById('nombreAC').disabled = false;
    } else {
        document.getElementById('nombreAC').disabled = true;
    }
}
function sindicatoOp(x){
    var sindicato = x;

    if (sindicato == 1){
        document.getElementById('nombreSindicato').disabled = false;
    } else {
        document.getElementById('nombreSindicato').disabled = true;
    }
}
function pensionOp(x){
    var pension = x;

    if (pension == 1){
        document.getElementById('instPension').disabled = false;
        document.getElementById('montoP').disabled = false;
        document.getElementById('periodo').disabled = false;
    } else {
        document.getElementById('instPension').disabled = true;
        document.getElementById('montoP').disabled = true;
        document.getElementById('periodo').disabled = true;
    }
}
function seguridadOp(x){
    var seguridadsocial = x;

    if (seguridadsocial == 5){
        document.getElementById('otroSS').disabled = false;
    } else {
        document.getElementById('otroSS').disabled = true;
    }
}

function causaDiscOp(x){
    var causaDisc = x;

    if (causaDisc == 7){
        document.getElementById('especifiqueD').disabled = false;
    } else {
        document.getElementById('especifiqueD').disabled = true;
    }
}

function cirugiasOp(x){
    var cirugia = x;

    if (cirugia == 1){
        document.getElementById('tipoCirugia').disabled = false;
    } else {
        document.getElementById('tipoCirugia').disabled = true;
    }
}

function protesisOp(x){
    var protesis = x;

    if (protesis == 1){
        document.getElementById('tipoProtesis').disabled = false;
    } else {
        document.getElementById('tipoProtesis').disabled = true;
    }
}
function rehabOp(x){
    var rehabilitacion = x;

    if (rehabilitacion == 1){
        document.getElementById('lugarRehab').disabled = false;
    } else {
        document.getElementById('lugarRehab').disabled = true;
    }
}
function deudasOp(x){
    var deudas = x;

    if (deudas == 1){
        document.getElementById('deudasInput').disabled = false;
    } else {
        document.getElementById('deudasInput').disabled = true;
    }
}
function viviendaOp(x){
    var vivienda = x;

    if (vivienda == 3){
        document.getElementById('montoVivienda').disabled = false;
        
    } else {
        document.getElementById('montoVivienda').disabled = true;
    }
}

function tipoViviendaOp(x){
    var tipoVivienda = x;

    if (tipoVivienda == 4){
        document.getElementById('viviendaOtro').disabled = false;
        
    } else {
        document.getElementById('viviendaOtro').disabled = true;
    }
}
function techoOp(x){
    var techo = x;

    if (techo == 3){
        document.getElementById('otroTecho').disabled = false;
    } else {
        document.getElementById('otroTecho').disabled = true;
    }
}

/* Datos Médicos */
$(document).ready(function() {
    $('#medicosForm').submit(function(e) {
        var discapacidad = document.getElementById('discapacidad').value;
        var gradoDisc = document.getElementById('gradoDisc').value;
        var tipoDisc = document.getElementById('tipoDisc').value;
        var causaDisc = document.getElementById('causaDisc').value;
        var especifiqueD = document.getElementById('especifiqueD').value;
        var temporalidad = document.getElementById('temporalidad').value;
        var fuente = document.getElementById('fuente').value;
        var fechaValoracion = document.getElementById('fechaValoracion').value;
        var rehabilitacion = document.getElementById('rehabilitacion').value;
        var tipoSangre = document.getElementById('tipoSangre').value;
        var cirugia = document.getElementById('cirugia').value;
        var protesis = document.getElementById('protesis').value;
        var alergias = document.getElementById('alergias').value;
        var tipoAlergia = document.getElementById('tipoAlergia').value;
        var alergiasFull = document.getElementById('alergiasFull').value;
        var enfermedades = document.getElementById('enfermedades').value;
        var enfermedadesFull = document.getElementById('enfermedadesFull').value;
        var medicamentos = document.getElementById('medicamentos').value;
        var medicamentosFull = document.getElementById('medicamentosFull').value;

        e.preventDefault();

        $.ajax({
            type: "POST",
            url: '',
            dataType:'json',
            data: {
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
                tipoAlergia:tipoAlergia,
                alergiasFull:alergiasFull,
                enfermedades:enfermedades,
                enfermedadesFull:enfermedadesFull,
                medicamentos:medicamentos,
                medicamentosFull:medicamentosFull
            }
        })
    })
})


    
    var tipoVivienda = document.getElementById('tipoVivienda').value;
    var viviendaOtro = document.getElementById('viviendaOtro').value;
    var numHabitaciones = document.getElementById('numHabitaciones').value;
    var techo = document.getElementById('techo').value;
    var pared = document.getElementById('pared').value;
    var dependenciaEconomica = document.getElementById('dependenciaEconomica').value;
    var deudas = document.getElementById('deudas').value;

/*         e.preventDefault(); */

        /* $.ajax({
            type: "POST",
            url: '',
            dataType:'json',
            data: {
                vivienda:vivienda,
                montoVivienda:montoVivienda,
                tipoVivienda:tipoVivienda,
                viviendaOtro:viviendaOtro,
                numHabitaciones:numHabitaciones,
                checkAllRooms:checkAllRooms,
                cocina:cocina,
                sala:sala,
                bath:bath,
                otrosRoom:otrosRoom,
                otroRoomInput:otroRoomInput,
                techo:techo,
                otroTecho:otroTecho,
                pared:pared,
                otroPared:otroPared,
                checkAllServices:checkAllServices,
                agua:agua,
                luz:luz,
                drenaje:drenaje,
                cable:cable,
                internet:internet,
                celular:celular,
                carro:carro,
                gas:gas,
                telefono:telefono,
                otroServicios:otroServicios,
                otroServiciosInput:otroServiciosInput,
                checkAllElectro:checkAllElectro,
                tv:tv,
                lavadora:lavadora,
                estereo:estereo,
                microondas:microondas,
                computadora:computadora,
                licuadora:licuadora,
                dvd:dvd,
                estufa:estufa,
                otroElectro:otroElectro,
                otroElectroInput:otroElectroInput,
                dependenciaEconomica:dependenciaEconomica,
                deudas:deudas,
                deudasInput:deudasInput
            }
        }) */
    /* }) */
/* }*/

function roomsCheck(){
    var checkAllRooms = document.getElementById('checkAllRooms');

        if (checkAllRooms.checked){
            document.getElementById('cocina').checked = true;
            document.getElementById('sala').checked = true;
            document.getElementById('bath').checked = true;

        } else {
            document.getElementById('cocina').checked = false;
            document.getElementById('sala').checked = false;
            document.getElementById('bath').checked = false;

        }
}
function otrosRoom(){
    var otroRoom = document.getElementById('otroRoom');

        if (otroRoom.checked){
            document.getElementById('otroRoomInput').disabled = false;
        } else {
            document.getElementById('otroRoomInput').disabled = true;
        }
}

function servicios(){
var checkAllServices = document.getElementById('checkAllServices');

        if (checkAllServices.checked){
            document.getElementById('agua').checked = true;
            document.getElementById('luz').checked = true;
            document.getElementById('drenaje').checked = true;
            document.getElementById('cable').checked = true;
            document.getElementById('internet').checked = true;
            document.getElementById('checkCelular').checked = true;
            document.getElementById('carro').checked = true;
            document.getElementById('gas').checked = true;
            document.getElementById('telefono').checked = true;
        } else {
            document.getElementById('agua').checked = false;
            document.getElementById('luz').checked = false;
            document.getElementById('drenaje').checked = false;
            document.getElementById('cable').checked = false;
            document.getElementById('internet').checked = false;
            document.getElementById('checkCelular').checked = false;
            document.getElementById('carro').checked = false;
            document.getElementById('gas').checked = false;
            document.getElementById('telefono').checked = false;
        }
    }

    function otroServicio(){
        var otroServicios = document.getElementById('otroServicios');
/*         var otroServiciosInput = document.getElementById('otroServiciosInput'); */
        if (otroServicios.checked){
            document.getElementById('otroServiciosInput').disabled = false;
/*             var otroServiciosInput = document.getElementById('otroServiciosInput').value; */
        } else {
            document.getElementById('otroServiciosInput').disabled = true;
/*             var otroServiciosInput = ""; */
        }
    }

function electrodomesticos(){
    var checkAllElectro = document.getElementById('checkAllElectro');

    if (checkAllElectro.checked){
        document.getElementById('tv').checked = true;
        document.getElementById('lavadora').checked = true;
        document.getElementById('estereo').checked = true;
        document.getElementById('microondas').checked = true;
        document.getElementById('computadora').checked = true;
        document.getElementById('licuadora').checked = true;
        document.getElementById('dvd').checked = true;
        document.getElementById('estufa').checked = true;
    } else {
        document.getElementById('tv').checked = false;
        document.getElementById('lavadora').checked = false;
        document.getElementById('estereo').checked = false;
        document.getElementById('microondas').checked = false;
        document.getElementById('computadora').checked = false;
        document.getElementById('licuadora').checked = false;
        document.getElementById('dvd').checked = false;
        document.getElementById('estufa').checked = false;
    }
}

function otroElectros(){
    var otroElectro = document.getElementById('otroElectro');

    if (otroElectro.checked){
        document.getElementById('otroElectroInput').disabled = false;
    } else {
        document.getElementById('otroElectroInput').disabled = true;
    }
}

$(document).ready(function() {
    $('#familiaForm').submit(function(e) {
        /* Integración Familiar */
        var idFam = document.getElementById('idFam').value;
        var nombreFamiliar = document.getElementById('nombreFamiliar').value;
        var parentescoFam = document.getElementById('parentescoFam').value;
        var edadFam = document.getElementById('edadFam').value;
        var escolaridadFam = document.getElementById('escolaridadFam').value;
        var profesionFam = document.getElementById('profesionFam').value;
        var discapacidadFam = document.getElementById('discapacidadFam').value;
        var ingresoFam = document.getElementById('ingresoFam').value;

        e.preventDefault();

        $.ajax({
            type: "POST",
            url: '',
            dataType:'json',
            data: {
                idFam:idFam,
                nombreFamiliar:nombreFamiliar,
                parentescoFam:parentescoFam,
                edadFam:edadFam,
                escolaridadFam:escolaridadFam,
                profesionFam:profesionFam,
                discapacidadFam:discapacidadFam,
                ingresoFam:ingresoFam
            }
        })
    })
})

$(document).ready(function() {
    $('#referenciasForm').submit(function(e) {
        /* Referencias */
        var idRef = document.getElementById('idRef').value;
        var nombreReferencia = document.getElementById('nombreReferencia').value;
        var parentescoRef = document.getElementById('parentescoRef').value;
        var edadRef = document.getElementById('edadRef').value;
        var escolaridadRef = document.getElementById('escolaridadRef').value;
        var profesionRef = document.getElementById('profesionRef').value;
        var discapacidadRef = document.getElementById('discapacidadRef').value;
        var ingresoRef = document.getElementById('ingresoRef').value;

        e.preventDefault();

        $.ajax({
            type: "POST",
            url: '',
            dataType:'json',
            data: {
                idRef:idRef,
                nombreReferencia:nombreReferencia,
                parentescoRef:parentescoRef,
                edadRef:edadRef,
                escolaridadRef:escolaridadRef,
                profesionRef:profesionRef,
                discapacidadRef:discapacidadRef,
                ingresoRef:ingresoRef
            }
        })
    })
})

$(document).ready(function() {
    $('#serviciosForm').submit(function(e) {
        /* Servicios Otorgados */
        var folioSolicitud = document.getElementById('folioSolicitud').value;
        var fechaSolicitud = document.getElementById('fechaSolicitud').value;
        var tipoSolicitud = document.getElementById('tipoSolicitud').value;
        var descripcionSolicitud = document.getElementById('descripcionSolicitud').value;
        var estatusSolicitud = document.getElementById('estatusSolicitud').value;
        var fechaEntrega = document.getElementById('fechaEntrega').value;
        var articuloSolicitud = document.getElementById('articuloSolicitud').value;
        var cantidadArt = document.getElementById('cantidadArt').value;
        var costoUnitarioArt = document.getElementById('costoUnitarioArt').value;

        e.preventDefault();

        $.ajax({
            type: "POST",
            url: '',
            dataType:'json',
            data: {
                folioSolicitud:folioSolicitud,
                fechaSolicitud:fechaSolicitud,
                tipoSolicitud:tipoSolicitud,
                descripcionSolicitud:descripcionSolicitud,
                estatusSolicitud:estatusSolicitud,
                fechaEntrega:fechaEntrega,
                articuloSolicitud:articuloSolicitud,
                cantidadArt:cantidadArt,
                costoUnitarioArt:costoUnitarioArt
            }

        })
    })
})

$(document).ready(function() {
    $('#documentosForm').submit(function(e) {
        /* Documentos Checklist */
        var checkAllSi = document.getElementById('checkAllSi').value;
        var checkAllNo = document.getElementById('checkAllNo').value;
        var checkAllNA = document.getElementById('checkAllNA').value;

        var valoracionSi = document.getElementById('valoracionSi').value;
        var valoracionNo = document.getElementById('valoracionNo').value;
        var valoracionNA = document.getElementById('valoracionNA').value;
        
        if (valoracionSi = checked){
            document.getElementById('valoracionNo').checked = false;
            document.getElementById('valoracionNA').checked = false;
        } 
        if (valoracionNo = checked){
            document.getElementById('valoracionSi').checked = false;
            document.getElementById('valoracionNA').checked = false;
        } 
        if (valoracionNA = checked){
            document.getElementById('valoracionNo').checked = false;
            document.getElementById('valoracionSi').checked = false;
        } 
        
        var actaSi = document.getElementById('actaSi').value;
        var actaNo = document.getElementById('actaNo').value;
        var actaNA = document.getElementById('actaNA').value;
        
        if (actaSi.checked){
            document.getElementById('actaNo').checked = false;
            document.getElementById('actaNA').checked = false;
        } 
        if (actaNo.checked){
            document.getElementById('actaSi').checked = false;
            document.getElementById('actaNA').checked = false;
        } 
        if (actaNA.checked){
            document.getElementById('actaNo').checked = false;
            document.getElementById('actaSi').checked = false;
        } 
        
        var curpSi = document.getElementById('curpSi').value;
        var curpNo = document.getElementById('curpNo').value;
        var curpNA = document.getElementById('curpNA').value;
        
        if (curpSi.checked){
            document.getElementById('curpNo').checked = false;
            document.getElementById('curpNA').checked = false;
        } 
        if (curpNo.checked){
            document.getElementById('curpSi').checked = false;
            document.getElementById('curpNA').checked = false;
        } 
        if (curpNA.checked){
            document.getElementById('curpNo').checked = false;
            document.getElementById('curpSi').checked = false;
        } 
        
        var comprobanteSi = document.getElementById('comprobanteSi').value;
        var comprobanteNo = document.getElementById('comprobanteNo').value;
        var comprobanteNA = document.getElementById('comprobanteNA').value;
        
        if (comprobanteSi.checked){
            document.getElementById('comprobanteNo').checked = false;
            document.getElementById('comprobanteNA').checked = false;
        } 
        if (comprobanteNo.checked){
            document.getElementById('comprobanteSi').checked = false;
            document.getElementById('comprobanteNA').checked = false;
        } 
        if (comprobanteNA.checked){
            document.getElementById('comprobanteNo').checked = false;
            document.getElementById('comprobanteSi').checked = false;
        } 
        
        var fotosSi = document.getElementById('fotosSi').value;
        var fotosNo = document.getElementById('fotosNo').value;
        var fotosNA = document.getElementById('fotosNA').value;

        if (fotosSi.checked){
            document.getElementById('fotosNo').checked = false;
            document.getElementById('fotosNA').checked = false;
        } 
        if (fotosNo.checked){
            document.getElementById('fotosSi').checked = false;
            document.getElementById('fotosNA').checked = false;
        } 
        if (fotosNA.checked){
            document.getElementById('fotosNo').checked = false;
            document.getElementById('fotosSi').checked = false;
        }

        var circulacionSi = document.getElementById('circulacionSi').value;
        var circulacionNo = document.getElementById('circulacionNo').value;
        var circulacionNA = document.getElementById('circulacionNA').value;

        if (circulacionSi.checked){
            document.getElementById('circulacionNo').checked = false;
            document.getElementById('circulacionNA').checked = false;
        } 
        if (circulacionNo.checked){
            document.getElementById('circulacionSi').checked = false;
            document.getElementById('circulacionNA').checked = false;
        } 
        if (circulacionNA.checked){
            document.getElementById('circulacionNo').checked = false;
            document.getElementById('circulacionSi').checked = false;
        }

        var ineSi = document.getElementById('ineSi').value;
        var ineNo = document.getElementById('ineNo').value;
        var ineNA = document.getElementById('ineNA').value;/* terminan checks con funcionamiento de radio */

        if (ineSi.checked){
            document.getElementById('ineNo').checked = false;
            document.getElementById('ineNA').checked = false;
        } 
        if (circulacionNo.checked){
            document.getElementById('ineSi').checked = false;
            document.getElementById('ineNA').checked = false;
        } 
        if (ineNA.checked){
            document.getElementById('ineNo').checked = false;
            document.getElementById('ineSi').checked = false;
        }
        
        if (checkAllSi.checked){
            document.getElementById('valoracionSi').checked = true;
            document.getElementById('actaSi').checked = true;
            document.getElementById('curpSi').checked = true;
            document.getElementById('comprobanteSi').checked = true;
            document.getElementById('fotosSi').checked = true;
            document.getElementById('circulacionSi').checked = true;
            document.getElementById('ineSi').checked = true;
        } else {
            document.getElementById('valoracionSi').checked = false;
            document.getElementById('actaSi').checked = false;
            document.getElementById('curpSi').checked = false;
            document.getElementById('comprobanteSi').checked = false;
            document.getElementById('fotosSi').checked = false;
            document.getElementById('circulacionSi').checked = false;
            document.getElementById('ineSi').checked = false;
        }

        if (checkAllNo.checked){
            document.getElementById('valoracionNo').checked = true;
            document.getElementById('actaNo').checked = true;
            document.getElementById('curpNo').checked = true;
            document.getElementById('comprobanteNo').checked = true;
            document.getElementById('fotosNo').checked = true;
            document.getElementById('circulacionNo').checked = true;
            document.getElementById('ineNo').checked = true;
        } else {
            document.getElementById('valoracionNo').checked = false;
            document.getElementById('actaNo').checked = false;
            document.getElementById('curpNo').checked = false;
            document.getElementById('comprobanteNo').checked = false;
            document.getElementById('fotosNo').checked = false;
            document.getElementById('circulacionNo').checked = false;
            document.getElementById('ineNo').checked = false;
        }

        if (checkAllNA.checked){
            document.getElementById('valoracionNA').checked = true;
            document.getElementById('actaNA').checked = true;
            document.getElementById('curpNA').checked = true;
            document.getElementById('comprobanteNA').checked = true;
            document.getElementById('fotosNA').checked = true;
            document.getElementById('circulacionNA').checked = true;
            document.getElementById('ineNA').checked = true;
        } else {
            document.getElementById('valoracionNA').checked = false;
            document.getElementById('actaNA').checked = false;
            document.getElementById('curpNA').checked = false;
            document.getElementById('comprobanteNA').checked = false;
            document.getElementById('fotosNA').checked = false;
            document.getElementById('circulacionNA').checked = false;
            document.getElementById('ineNA').checked = false;
        }

        e.preventDefault();

        $.ajax({
            type: "POST",
            url: '',
            dataType:'json',
            data: {
                checkAllSi:checkAllSi,
                checkAllNo:checkAllNo,
                checkAllNA:checkAllNA,
                valoracionSi:valoracionSi,
                valoracionNo:valoracionNo,
                valoracionNA:valoracionNA,
                actaSi:actaSi,
                actaNo:actaNo,
                actaNA:actaNA,
                curpSi:curpSi,
                curpNo:curpNo,
                curpNA:curpNA,
                comprobanteSi:comprobanteSi,
                comprobanteNo:comprobanteNo,
                comprobanteNA:comprobanteNA,
                fotosSi:fotosSi,
                fotosNo:fotosNo,
                fotosNA:fotosNA,
                circulacionSi:circulacionSi,
                circulacionNo:circulacionNo,
                circulacionNA:circulacionNA,
                ineSi:ineSi,
                ineNo:ineNo,
                ineNA:ineNA
            }

        })
    })
})