
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
        document.getElementById('fechaIni').disabled = false;
        document.getElementById('duracion').disabled = false;
    } else {
        document.getElementById('lugarRehab').disabled = true;
        document.getElementById('fechaIni').disabled = true;
        document.getElementById('duracion').disabled = true;
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
function viviendaDOp(x){
    var viviendaPD = x;

    if (viviendaPD == 1){
        document.getElementById('costoVivienda').disabled = false;
        
    } else {
        document.getElementById('costoVivienda').disabled = true;
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
        document.getElementById('otroTechoInput').disabled = false;
    } else {
        document.getElementById('otroTechoInput').disabled = true;
    }
}
function paredOp(x){
    var pared = x;

    if (pared == 4){
        document.getElementById('otroParedInput').disabled = false;
    } else {
        document.getElementById('otroParedInput').disabled = true;
    }
}

function alergiasOp(x){
    var alergia = x;
    console.log(x);

    if(alergia == 1){
        document.getElementById('tipoAlergia').disabled = false;
        document.getElementById('alergiasFull').disabled = false;
    } else if(alergia == 2){
        document.getElementById('tipoAlergia').disabled = false;
        document.getElementById('alergiasFull').disabled = false;
    } else if(alergia == 3){
        document.getElementById('tipoAlergia').disabled = false;
        document.getElementById('alergiasFull').disabled = false;
    } else if (alergia == 0){
        document.getElementById('tipoAlergia').disabled = true;
        document.getElementById('alergiasFull').disabled = true;
    }
}
function enfermedadesOp(x){
    var enfermedad = x;

    if(enfermedad == null){
        document.getElementById('enfermedadesFull').readonly = true;
    } else {
        document.getElementById('enfermedadesFull').readonly = false;
        document.getElementById('enfermedadesFull').required = true;
    }
}
function medicamentosOp(x){
    var medicamento = x;

    if(medicamento == null){
        document.getElementById('medicamentosFull').disabled = true;
    } else {
        document.getElementById('medicamentosFull').disabled = false;
        document.getElementById('medicamentosFull').required = true;
    }
}



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

function valoracionCheck(x){
    var num = x;
    console.log(num);
    if (num == 1){
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('registroNo').checked = false;
        document.getElementById('registroNA').checked = false;
        var checkSi = document.getElementById('registroSi');
        if (checkSi.checked) {
            document.getElementById('registroDoc1').disabled = false;
        } else {
            document.getElementById('registroDoc1').disabled = true;
        }
    } else if ( num == 2){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('registroSi').checked = false;
        document.getElementById('registroNA').checked = false;
        document.getElementById('registroDoc1').disabled = true;
    } else if (num ==3){
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('registroSi').checked = false;
        document.getElementById('registroNo').checked = false;
        document.getElementById('registroDoc1').disabled = true;
    } else if (num ==4){
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('valoracionNo').checked = false;
        document.getElementById('valoracionNA').checked = false;
        var checkSi1 = document.getElementById('valoracionSi');
        if (checkSi1.checked) {
            document.getElementById('registroDoc2').disabled = false;
        } else {
            document.getElementById('registroDoc2').disabled = true;
        }
    } else if (num ==5){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('valoracionSi').checked = false;
        document.getElementById('valoracionNA').checked = false;
        document.getElementById('registroDoc2').disabled = true;
    } else if (num ==6){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('valoracionSi').checked = false;
        document.getElementById('valoracionNo').checked = false;
        document.getElementById('registroDoc2').disabled = true;
    } else if (num ==7){
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('actaNo').checked = false;
        document.getElementById('actaNA').checked = false;
        var checkSi2 = document.getElementById('actaSi');
        if (checkSi2.checked) {
            document.getElementById('registroDoc3').disabled = false;
        } else {
            document.getElementById('registroDoc3').disabled = true;
        }
    } else if (num == 8){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('actaSi').checked = false;
        document.getElementById('actaNA').checked = false;
        document.getElementById('registroDoc3').disabled = true;
    } else if ( num == 9){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('actaSi').checked = false;
        document.getElementById('actaNo').checked = false;
        document.getElementById('registroDoc3').disabled = true;
    } else if (num ==10){
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('curpNo').checked = false;
        document.getElementById('curpNA').checked = false;
        var checkSi3 = document.getElementById('curpSi');
        if (checkSi3.checked) {
            document.getElementById('registroDoc4').disabled = false;
        } else {
            document.getElementById('registroDoc4').disabled = true;
        }
    } else if (num ==11){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('curpSi').checked = false;
        document.getElementById('curpNA').checked = false;
        document.getElementById('registroDoc4').disabled = true;
    } else if (num ==12){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('curpNo').checked = false;
        document.getElementById('curpSi').checked = false;
        document.getElementById('registroDoc4').disabled = true;
    } else if (num ==16){
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('comprobanteNo').checked = false;
        document.getElementById('comprobanteNA').checked = false;
        document.getElementById('registroDoc6').disabled = false;
        var checkSi5 = document.getElementById('comprobanteSi');
        if (checkSi5.checked) {
            document.getElementById('registroDoc6').disabled = false;
        } else {
            document.getElementById('registroDoc6').disabled = true;
        }
    } else if (num ==17){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('comprobanteSi').checked = false;
        document.getElementById('comprobanteNA').checked = false;
        document.getElementById('registroDoc6').disabled = true;
    } else if (num == 18){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('comprobanteNo').checked = false;
        document.getElementById('comprobanteSi').checked = false;
        document.getElementById('registroDoc6').disabled = true;
    } else if (num ==19){
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('fotosNo').checked = false;
        document.getElementById('fotosNA').checked = false;
    } else if (num ==20){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('fotosSi').checked = false;
        document.getElementById('fotosNA').checked = false;
    } else if (num ==21){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('fotosNo').checked = false;
        document.getElementById('fotosSi').checked = false;
    } else if (num ==22){
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('circulacionNo').checked = false;
        document.getElementById('circulacionNA').checked = false;
        document.getElementById('registroDoc7').disabled = false;
        var checkSi6 = document.getElementById('circulacionSi');
        if (checkSi6.checked) {
            document.getElementById('registroDoc7').disabled = false;
        } else {
            document.getElementById('registroDoc7').disabled = true;
        }
    } else if (num ==23){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('circulacionSi').checked = false;
        document.getElementById('circulacionNA').checked = false;
        document.getElementById('registroDoc7').disabled = true;
    } else if (num ==24){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('circulacionNo').checked = false;
        document.getElementById('circulacionSi').checked = false;
        document.getElementById('registroDoc7').disabled = true;
    } else if (num ==13){
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('ineNo').checked = false;
        document.getElementById('ineNA').checked = false;
        var checkSi4 = document.getElementById('ineSi');
        if (checkSi4.checked) {
            document.getElementById('registroDoc5').disabled = false;
        } else {
            document.getElementById('registroDoc5').disabled = true;
        }
    } else if (num ==14){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('ineSi').checked = false;
        document.getElementById('ineNA').checked = false;
        document.getElementById('registroDoc5').disabled = true;
    } else if (num ==15){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('ineNo').checked = false;
        document.getElementById('ineSi').checked = false;
        document.getElementById('registroDoc5').disabled = true;
    }
}
    
    function checkAll1() {
        var vm1 = document.getElementById('checkAllSi');
        if (vm1.checked){
            document.getElementById('checkAllNo').checked = false;
            checkAll2();
            document.getElementById('checkAllSi').checked = true;
            document.getElementById('registroSi').checked = true;
            document.getElementById('valoracionSi').checked = true;
            document.getElementById('actaSi').checked = true;
            document.getElementById('curpSi').checked = true;
            document.getElementById('comprobanteSi').checked = true;
            document.getElementById('fotosSi').checked = true;
            document.getElementById('circulacionSi').checked = true;
            document.getElementById('ineSi').checked = true;
            document.getElementById('registroDoc1').disabled = false;
            document.getElementById('registroDoc2').disabled = false;
            document.getElementById('registroDoc3').disabled = false;
            document.getElementById('registroDoc4').disabled = false;
            document.getElementById('registroDoc5').disabled = false;
            document.getElementById('registroDoc6').disabled = false;
            document.getElementById('registroDoc7').disabled = false;
        } else {
            document.getElementById('checkAllNo').checked = false;
            document.getElementById('registroSi').checked = false;
            document.getElementById('valoracionSi').checked = false;
            document.getElementById('actaSi').checked = false;
            document.getElementById('curpSi').checked = false;
            document.getElementById('comprobanteSi').checked = false;
            document.getElementById('fotosSi').checked = false;
            document.getElementById('circulacionSi').checked = false;
            document.getElementById('ineSi').checked = false;
            document.getElementById('registroNA').checked = false;
            document.getElementById('valoracionNA').checked = false;
            document.getElementById('actaNA').checked = false;
            document.getElementById('curpNA').checked = false;
            document.getElementById('comprobanteNA').checked = false;
            document.getElementById('fotosNA').checked = false;
            document.getElementById('circulacionNA').checked = false;
            document.getElementById('ineNA').checked = false;
            document.getElementById('registroDoc1').disabled = true;
            document.getElementById('registroDoc2').disabled = true;
            document.getElementById('registroDoc3').disabled = true;
            document.getElementById('registroDoc4').disabled = true;
            document.getElementById('registroDoc5').disabled = true;
            document.getElementById('registroDoc6').disabled = true;
            document.getElementById('registroDoc7').disabled = true;
        }
    }
    function checkAll2() {
        var vm2 = document.getElementById('checkAllNo');
        if (vm2.checked){
            document.getElementById('checkAllSi').checked = false;
            checkAll1();
            document.getElementById('checkAllNo').checked = true;
            document.getElementById('registroNo').checked = true;
            document.getElementById('valoracionNo').checked = true;
            document.getElementById('actaNo').checked = true;
            document.getElementById('curpNo').checked = true;
            document.getElementById('comprobanteNo').checked = true;
            document.getElementById('fotosNo').checked = true;
            document.getElementById('circulacionNo').checked = true;
            document.getElementById('ineNo').checked = true;
            document.getElementById('registroDoc1').disabled = true;
            document.getElementById('registroDoc2').disabled = true;
            document.getElementById('registroDoc3').disabled = true;
            document.getElementById('registroDoc4').disabled = true;
            document.getElementById('registroDoc5').disabled = true;
            document.getElementById('registroDoc6').disabled = true;
            document.getElementById('registroDoc7').disabled = true;
        } else {
            document.getElementById('checkAllSi').checked = false;
            document.getElementById('registroNo').checked = false;
            document.getElementById('valoracionNo').checked = false;
            document.getElementById('actaNo').checked = false;
            document.getElementById('curpNo').checked = false;
            document.getElementById('comprobanteNo').checked = false;
            document.getElementById('fotosNo').checked = false;
            document.getElementById('circulacionNo').checked = false;
            document.getElementById('ineNo').checked = false;
            document.getElementById('registroNA').checked = false;
            document.getElementById('valoracionNA').checked = false;
            document.getElementById('actaNA').checked = false;
            document.getElementById('curpNA').checked = false;
            document.getElementById('comprobanteNA').checked = false;
            document.getElementById('fotosNA').checked = false;
            document.getElementById('circulacionNA').checked = false;
            document.getElementById('ineNA').checked = false;
            document.getElementById('registroDoc1').disabled = true;
            document.getElementById('registroDoc2').disabled = true;
            document.getElementById('registroDoc3').disabled = true;
            document.getElementById('registroDoc4').disabled = true;
            document.getElementById('registroDoc5').disabled = true;
            document.getElementById('registroDoc6').disabled = true;
            document.getElementById('registroDoc7').disabled = true;
        }
    }

function familiarDisc(x){
    var discapFam = x;

    if (discapFam == 1){
        document.getElementById('discapacidadFam').disabled = false;
    }
    else {
        document.getElementById('discapacidadFam').disabled = true;
    }
}
function autoSeguroCheck(){
    var autoSeguroOp = document.getElementById('checkAutoS');

    if (autoSeguroOp.checked){
        document.getElementById('AutoSeguroInput').disabled = false;
        document.getElementById('AutoSeguroInput').required = true;
    }
    else {
        document.getElementById('AutoSeguroInput').disabled = true;
    }
}
