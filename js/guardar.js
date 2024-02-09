function _(el) {
    return document.getElementById(el);
}

function foto() {
    var doc = "_photo";
    var idUsr = document.getElementById('curp_exp').value;
    var file = _("file"+doc).files[0];
    var documento = doc;
    var idUsuario = idUsr;
    var formdata = new FormData();
    // variable del name file
    formdata.append("file", file);
    // variables post
    // formdata.append("documento", documento);
    formdata.append("idUsuario", idUsuario);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);
    ajax.open("POST", "prcd/upload_photo.php"); 
    
    ajax.send(formdata);
    
    function progressHandler(event) {

        _("loaded_n_total"+doc).innerHTML = "Cargado " + event.loaded + " bytes de " + event.total;
        var percent = (event.loaded / event.total) * 100;
        _("progressBar"+doc).value = Math.round(percent);
        _("status"+doc).innerHTML = Math.round(percent) + "% subido... espere un momento";
        document.getElementById('flagFoto').value = 1;
    }
    
    function completeHandler(event) {
        _("status"+doc).innerHTML = event.target.responseText;
        _("progressBar"+doc).value = 100; //wil clear progress bar after successful upload
        _("file"+doc).style.display='none';
        _("progressBar"+doc).style.display='none';
        // document.getElementById('registroDoc'+doc).disabled = true;
        // document.getElementById('registroDoc'+doc).setAttribute('style','color: #59c965');
        // document.getElementById('profile').setAttribute('src','assets/docs_expedientes/photos/photosarchivo_'+idUsr+'.*');
        // document.getElementById('btnModal'+doc).disabled = true;
        // $(".bloqueo"+doc).attr("disabled", true);
        buscarPhoto(idUsr);
    }
    
    function errorHandler(event) {
        _("status"+doc).innerHTML = "Fallo en la subida";
    }
    
    function abortHandler(event) {
        _("status"+doc).innerHTML = "Fallo en la subida";
    }
}

function fotoUpload() {
    var doc = "_photo";
    var idUsr = document.getElementById('curp_exp').value;
    var file = _("file"+doc).files[0];
    var documento = doc;
    var idUsuario = idUsr;
    var formdata = new FormData();
    // variable del name file
    formdata.append("file", file);
    // variables post
    // formdata.append("documento", documento);
    formdata.append("idUsuario", idUsuario);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);
    ajax.open("POST", "prcd/upload_photo.php"); 
    
    ajax.send(formdata);
    
    function progressHandler(event) {

        _("loaded_n_total"+doc).innerHTML = "Cargado " + event.loaded + " bytes de " + event.total;
        var percent = (event.loaded / event.total) * 100;
        _("progressBar"+doc).value = Math.round(percent);
        _("status"+doc).innerHTML = Math.round(percent) + "% subido... espere un momento";
        document.getElementById('flagFoto').value = 3;
    }
    
    function completeHandler(event) {
        _("status"+doc).innerHTML = event.target.responseText;
        _("progressBar"+doc).value = 100; //wil clear progress bar after successful upload
        _("file"+doc).style.display='none';
        _("progressBar"+doc).style.display='none';
        // document.getElementById('registroDoc'+doc).disabled = true;
        // document.getElementById('registroDoc'+doc).setAttribute('style','color: #59c965');
        // document.getElementById('profile').setAttribute('src','assets/docs_expedientes/photos/photosarchivo_'+idUsr+'.*');
        // document.getElementById('btnModal'+doc).disabled = true;
        // $(".bloqueo"+doc).attr("disabled", true);
        buscarPhoto(idUsr);
    }
    
    function errorHandler(event) {
        _("status"+doc).innerHTML = "Fallo en la subida";
    }
    
    function abortHandler(event) {
        _("status"+doc).innerHTML = "Fallo en la subida";
    }
}


function foto3() {
    const canvas = document.querySelector("#crop-image");
    //const canvas = document.createElement("crop-image")
    fetch(canvas.src)
    .then(
        res => res.blob()
    )
    .then(
        blob => {
        const file = new File([blob], "capture.jpg", {
            type: 'image/jpeg'
        });
        var fd = new FormData();
        fd.append("file", file);
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "../prcd/upload_photoTest.php",
            data: fd,
            processData: false,
            contentType: false,
            cache: false,
            success: (data) => {
                alert("yes");
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    });
}

function foto2() {
    var doc = "_photo";
    var idUsr = document.getElementById('crop-image').value;
    //var file = _("file"+doc).files[0];
    //var file = _("file"+doc).files[0];
    /* var documento = doc;
    var idUsuario = idUsr; */
    var formdata = new FormData();
    var files = $('#crop-image').fileInputElement.files[0];
    // variable del name file
    formdata.append("file", files);
    // variables post
    /* formdata.append("documento", documento);
    formdata.append("idUsuario", idUsuario); */
    var ajax = new XMLHttpRequest();
    /* ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false); */
    ajax.open("POST", "../prcd/upload_photoTest.php");
    
    ajax.send(formdata);
    
    function progressHandler(event) {

        _("loaded_n_total"+doc).innerHTML = "Cargado " + event.loaded + " bytes de " + event.total;
        var percent = (event.loaded / event.total) * 100;
        _("progressBar"+doc).value = Math.round(percent);
        _("status"+doc).innerHTML = Math.round(percent) + "% subido... espere un momento";
    }
    
    function completeHandler(event) {
        _("status"+doc).innerHTML = event.target.responseText;
        _("progressBar"+doc).value = 100; //wil clear progress bar after successful upload
        _("file"+doc).style.display='none';
        _("progressBar"+doc).style.display='none';
        // document.getElementById('registroDoc'+doc).disabled = true;
        // document.getElementById('registroDoc'+doc).setAttribute('style','color: #59c965');
        // document.getElementById('profile').setAttribute('src','assets/docs_expedientes/photos/photosarchivo_'+idUsr+'.*');
        // document.getElementById('btnModal'+doc).disabled = true;
        // $(".bloqueo"+doc).attr("disabled", true);
        buscarPhoto(idUsr);
    }
    
    function errorHandler(event) {
        _("status"+doc).innerHTML = "Fallo en la subida";
    }
    
    function abortHandler(event) {
        _("status"+doc).innerHTML = "Fallo en la subida";
    }
}


function buscarPhoto(curp){
    $.ajax({
        type: "POST",
        url: 'query/buscarPhoto.php',
        dataType:'json',
        data: {
            curp:curp
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            var ruta = jsonData.ruta;
            
            if (success == 1) {
                document.getElementById("profile").setAttribute('src','fotos_expedientes/'+ruta);
            } else if (success == 0){
                console.log("Sin foto");
            }
        }
    });
}

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
        var rfcCutted = curp.substr(0,10);
        var rfcHomo = document.getElementById('rfcHomo').value;
        var rfc = rfcCutted + rfcHomo;
        var fechaNacimiento = document.getElementById('fechaNacimiento').value;
        var lugarNacimiento = document.getElementById('lugarNacimiento').value;
        var domicilio = document.getElementById('domicilio').value;
        var numExt = document.getElementById('numExt').value;
        var numInt = document.getElementById('numInt').value;
        var tipoVialidad = document.getElementById('tipoVialidad').value;
        var colonia = document.getElementById('colonia').value;
        var entreVialidades = document.getElementById('entreVialidades').value;
        var descripcionLugar = document.getElementById('descripcionLugar').value;
        var estado = document.getElementById('estadosList').value;
        var municipio = document.getElementById('municipiosList').value;
        var localidad = document.getElementById('localidades').value;
        var asentamiento = document.getElementById('asentamiento').value;
        var codigoPostal = document.getElementById('codigoPostal').value;
        var correo = document.getElementById('correo').value;
        var telFijo = document.getElementById('telFijo').value;
        var celular = document.getElementById('celular').value;
        var leerSi = document.getElementById('leerSi');
        var leerNo = document.getElementById('leerNo');
        var escolaridad = document.getElementById('escolaridad').value;
        var concluidaSi = document.getElementById('concluidoSi');
        var concluidaNo = document.getElementById('concluidoNo');
        var concluidaNA = document.getElementById('concluidoNA');
        var concluidaCur = document.getElementById('concluidoCur');
        var estudiaSi = document.getElementById('estudiaSi');
        var estudiaNo = document.getElementById('estudiaNo');
        var habilidad = document.getElementById('habilidad').value;
        var profesion = document.getElementById('profesion').value;
        var trabajaSi = document.getElementById('trabajaSi');
        var trabajaNo = document.getElementById('trabajaNo');
        var ingresoMensual = document.getElementById('ingresoMensual').value;
        var asociacionSi = document.getElementById('asociacionSi');
        var asociacionNo = document.getElementById('asociacionNo');
        var pensionSi = document.getElementById('pensionSi');
        var pensionNo = document.getElementById('pensionNo');
        var seguridadsocial = document.getElementById('seguridadsocial').value;
        var otroSS = document.getElementById('otroSS').value;
        var numSS = document.getElementById('numss').value;
        var gruposFull = document.getElementById('numeroG').value;
        var informanteCheck = document.getElementById('informante').value;
        var informante = document.getElementById('nombreInformante').value;
        var informanteRelacion1 = document.getElementById('informanteRel').value;
        var informanteRelacionOtro = document.getElementById('otraRel').value;

        if(generoF.checked){
            var genero = "Femenino";
        }
        else if (generoM.checked){
            var genero = "Masculino";
        }
        else if (generoO.checked){
            var genero = "Otro";
        }

        if (leerSi.checked){
            var leer = 1;
        }
        else if (leerNo.checked){
            var leer = 0;
        }
        
        var carrera1 = document.getElementById('carrera').value;
        if (carrera1 == null || carrera1 == ""){
            var escolaridadNombre = "";
        }
        else {
            var escolaridadNombre = carrera1;
        }

        if (concluidaSi.checked){
            var concluida = 1;
        }
        else if (concluidaNo.checked){
            var concluida = 0;
        }
        else if (concluidaNA.checked){
            var concluida = 2;
        }
        else if (concluidaCur.checked){
            var concluida = 3;
        }

        if(estudiaSi.checked){
            var estudia = 1;
            var estudiaLugar = document.getElementById('lugarEstudia').value;
            document.getElementById('lugarEstudia').required = true;
        }
        else if (estudiaNo.checked){
            var estudia = 0;
            estudiaLugar = "N/A";
            document.getElementById('lugarEstudia').required = false;
        }
        if(trabajaSi.checked){
            var trabajaLugar = document.getElementById('lugarTrabajo').value;
            if (trabajaLugar == "Otro"){
                document.getElementById('lugarTrabajoOtro').required = true;
                var lugarTrabajoOtro = document.getElementById('lugarTrabajoOtro').value;
            }else{
                document.getElementById('lugarTrabajoOtro').required = false;
                var lugarTrabajoOtro = "N/A";
            }
        }
        else if (trabajaNo.checked){
            var trabajaLugar = "N/A";
            lugarTrabajoOtro = "N/A";
            document.getElementById('lugarTrabajo').required = false;
        }

        if(asociacionSi.checked){
            var asociacion = 1;
            var nombreAC = document.getElementById('nombreAC').value;
            document.getElementById('nombreAC').required = true;
        }
        else if(asociacionNo.checked){
            var asociacion = 0;
            var nombreAC = "N/A";
            document.getElementById('nombreAC').required = false;
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
            var pensionInst = "N/A";
            var pensionMonto = 0;
            var pensionTemporalidad = "N/A";
            document.getElementById('instPension').required = false;
            document.getElementById('montoP').required = false;
            document.getElementById('periodo').required = false;
        }

        if (informanteCheck == 1){
            var informanteLog = nombre+' '+apellidoP+' '+apellidoM;
            var informanteRelacion = "";
            var informanteRelacionOtro1 = ""; 
        } else if (informanteCheck == 2){
            var informanteLog = informante;
            var informanteRelacion = informanteRelacion1;
            var informanteRelacionOtro1 = informanteRelacionOtro;
        } else {
            var informanteLog = "";
            var informanteRelacion = "";
            var informanteRelacionOtro1 = "";
        }
        //e.preventDefault();
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
                tipoVialidad:tipoVialidad,
                colonia:colonia,
                entreVialidades:entreVialidades,
                descripcionLugar:descripcionLugar,
                estado:estado,
                municipio:municipio,
                localidad:localidad,
                asentamiento:asentamiento,
                codigoPostal:codigoPostal,
                correo:correo,
                telFijo:telFijo,
                celular:celular,
                leer:leer,
                escolaridad:escolaridad,
                escolaridadNombre:escolaridadNombre,
                concluida:concluida,
                estudia:estudia,
                estudiaLugar:estudiaLugar,
                habilidad:habilidad,
                profesion:profesion,
                trabajaLugar:trabajaLugar,
                lugarTrabajoOtro:lugarTrabajoOtro,
                ingresoMensual:ingresoMensual,
                asociacion:asociacion,
                nombreAC:nombreAC,
                pension:pension,
                pensionInst:pensionInst,
                pensionMonto:pensionMonto,
                pensionTemporalidad:pensionTemporalidad,
                informanteLog:informanteLog,
                informanteRelacion:informanteRelacion,
                informanteRelacionOtro1:informanteRelacionOtro1,
                seguridadsocial:seguridadsocial,
                otroSS:otroSS,
                numSS:numSS,
                gruposFull:gruposFull
            },
            success: function(response){
                var jsonData = JSON.parse(JSON.stringify(response));
                var verificador = jsonData.succes;
                var curpSaved = jsonData.curp;
                console.log(foto);
                if (verificador = 1){
                    document.getElementById('btnGuardarGeneral').hidden = true;
                    document.getElementById('btnGuardarGeneralUpdate').hidden = false;
                    document.getElementById('generalesForm').setAttribute('id','updateGeneralesForm');
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
                    //document.getElementById('nav-generales-tab').disabled = true;
                    document.getElementById('curp_exp').value = curpSaved;
                    document.getElementById('file_photo').disabled = false;
                    cambiarTab();
                    /* var curpExp = document.getElementById('curp_exp').value;
                    document.getElementById('buttonCheck').setAttribute('href','prcd/checkListPDF.php?curp='+curpExp); */
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


function updateGeneralesForm(){
        /* Datos Generales */
        var numExp = document.getElementById('numeroExpediente').innerText;
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
        var rfcCutted = curp.substr(0,10);
        var rfcHomo = document.getElementById('rfcHomo').value;
        var rfc = rfcCutted + rfcHomo;
        var fechaNacimiento = document.getElementById('fechaNacimiento').value;
        var lugarNacimiento = document.getElementById('lugarNacimiento').value;
        var domicilio = document.getElementById('domicilio').value;
        var numExt = document.getElementById('numExt').value;
        var numInt = document.getElementById('numInt').value;
        var tipoVialidad = document.getElementById('tipoVialidad').value;
        var colonia = document.getElementById('colonia').value;
        var entreVialidades = document.getElementById('entreVialidades').value;
        var descripcionLugar = document.getElementById('descripcionLugar').value;
        var estado = document.getElementById('estadosList').value;
        var municipio = document.getElementById('municipiosList').value;
        var localidad = document.getElementById('localidades').value;
        var asentamiento = document.getElementById('asentamiento').value;
        var codigoPostal = document.getElementById('codigoPostal').value;
        var correo = document.getElementById('correo').value;
        var telFijo = document.getElementById('telFijo').value;
        var celular = document.getElementById('celular').value;
        var leerSi = document.getElementById('leerSi');
        var leerNo = document.getElementById('leerNo');
        var escolaridad = document.getElementById('escolaridad').value;
        var concluidaSi = document.getElementById('concluidoSi');
        var concluidaNo = document.getElementById('concluidoNo');
        var concluidaNA = document.getElementById('concluidoNA');
        var concluidaCur = document.getElementById('concluidoCur');
        var estudiaSi = document.getElementById('estudiaSi');
        var estudiaNo = document.getElementById('estudiaNo');
        var habilidad = document.getElementById('habilidad').value;
        var profesion = document.getElementById('profesion').value;
        var trabajaSi = document.getElementById('trabajaSi');
        var trabajaNo = document.getElementById('trabajaNo');
        var ingresoMensual = document.getElementById('ingresoMensual').value;
        var asociacionSi = document.getElementById('asociacionSi');
        var asociacionNo = document.getElementById('asociacionNo');
        var pensionSi = document.getElementById('pensionSi');
        var pensionNo = document.getElementById('pensionNo');
        var seguridadsocial = document.getElementById('seguridadsocial').value;
        var otroSS = document.getElementById('otroSS').value;
        var numSS = document.getElementById('numss').value;
        var gruposFull = document.getElementById('numeroG').value;
        var informanteCheck = document.getElementById('informante').value;
        var informante = document.getElementById('nombreInformante').value;
        var informanteRelacion1 = document.getElementById('informanteRel').value;
        var informanteRelacionOtro = document.getElementById('otraRel').value;
        var estatus = 3;

        /* if (estatus != 2 || estatus != 3) {
            estatus = 1;
        } */

        if(generoF.checked){
            var genero = "Femenino";
        }
        else if (generoM.checked){
            var genero = "Masculino";
        }
        else if (generoO.checked){
            var genero = "Otro";
        }

        if (leerSi.checked){
            var leer = 1;
        }
        else if (leerNo.checked){
            var leer = 0;
        }
        
        var carrera = document.getElementById('carrera').value;
        if (carrera != null || carrera != ""){
            var escolaridad_nombre = carrera;
        }
        else {
            var escolaridad_nombre = "";
        }

        if (concluidaSi.checked){
            var concluida = 1;
        }
        else if (concluidaNo.checked){
            var concluida = 0;
        }
        else if (concluidaNA.checked){
            var concluida = 2;
        }
        else if (concluidaCur.checked){
            var concluida = 3;
        }
        else {
            var concluida = 0;
        }

        if(estudiaSi.checked){
            var estudia = 1;
            var estudiaLugar = document.getElementById('lugarEstudia').value;
            document.getElementById('lugarEstudia').required = true;
        }
        else if (estudiaNo.checked){
            var estudia = 0;
            estudiaLugar = "N/A";
            document.getElementById('lugarEstudia').required = false;
        }
        if(trabajaSi.checked){
            var trabajaLugar = document.getElementById('lugarTrabajo').value;
            if (trabajaLugar == "Otro"){
                var trabaja = 1;
                document.getElementById('lugarTrabajoOtro').required = true;
                var lugarTrabajoOtro = document.getElementById('lugarTrabajoOtro').value;
            }else{
                document.getElementById('lugarTrabajoOtro').required = false;
                var lugarTrabajoOtro = "N/A";
                var trabaja = '';
            }
        }
        else if (trabajaNo.checked){
            var trabajaLugar = "N/A";
            var trabaja = 0;
            lugarTrabajoOtro = "N/A";
            document.getElementById('lugarTrabajo').required = false;
        }
        else {
            var trabajaLugar = "";
            var trabaja = "";
            lugarTrabajoOtro = "";
            document.getElementById('lugarTrabajo').required = false;
        }

        if(asociacionSi.checked){
            var asociacion = 1;
            var nombreAC = document.getElementById('nombreAC').value;
            document.getElementById('nombreAC').required = true;
        }
        else if(asociacionNo.checked){
            var asociacion = 0;
            var nombreAC = "N/A";
            document.getElementById('nombreAC').required = false;
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
            var pensionInst = "N/A";
            var pensionMonto = 0;
            var pensionTemporalidad = "N/A";
            document.getElementById('instPension').required = false;
            document.getElementById('montoP').required = false;
            document.getElementById('periodo').required = false;
        }

        if (informanteCheck == 1){
            var informanteLog = nombre+' '+apellidoP+' '+apellidoM;
            var informanteRelacion = "";
            var informanteRelacionOtro1 = ""; 
        } else if (informanteCheck == 2){
            var informanteLog = informante;
            var informanteRelacion = informanteRelacion1;
            var informanteRelacionOtro1 = informanteRelacionOtro;
        } else {
            var informanteLog = "";
            var informanteRelacion = "";
            var informanteRelacionOtro1 = "";
        }

        $.ajax({
            type: "POST",
            url: 'prcd/editar_guardar.php',
            dataType:'json',
            data: {
                numExp:numExp,
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
                tipoVialidad:tipoVialidad,
                colonia:colonia,
                entreVialidades:entreVialidades,
                descripcionLugar:descripcionLugar,
                estado:estado,
                municipio:municipio,
                localidad:localidad,
                asentamiento:asentamiento,
                codigoPostal:codigoPostal,
                correo:correo,
                telFijo:telFijo,
                celular:celular,
                leer:leer,
                escolaridad:escolaridad,
                escolaridad_nombre:escolaridad_nombre,
                concluida:concluida,
                estudia:estudia,
                estudiaLugar:estudiaLugar,
                habilidad:habilidad,
                profesion:profesion,
                trabaja:trabaja,
                trabajaLugar:trabajaLugar,
                lugarTrabajoOtro:lugarTrabajoOtro,
                ingresoMensual:ingresoMensual,
                asociacion:asociacion,
                nombreAC:nombreAC,
                pension:pension,
                pensionInst:pensionInst,
                pensionMonto:pensionMonto,
                pensionTemporalidad:pensionTemporalidad,
                informanteLog:informanteLog,
                informanteRelacion:informanteRelacion,
                informanteRelacionOtro1:informanteRelacionOtro1,
                seguridadsocial:seguridadsocial,
                otroSS:otroSS,
                numSS:numSS,
                gruposFull:gruposFull,
                estatus:estatus
            },
            success: function(response){
                var jsonData = JSON.parse(JSON.stringify(response));
                var verificador = jsonData.succes;
                var curpSaved = jsonData.curp;
                if (verificador = 1){
                    document.getElementById('btnGuardarGeneralUpdate').disabled = false;
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos Generales han sido actualizados',
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
                    
                    cambiarTab();
                    document.getElementById('nav-medicos-tab').disabled = false;
                    document.getElementById('nav-generales-tab').disabled = false;
                    document.getElementById('curp_exp').value = curpSaved;
                    document.getElementById('file_photo').disabled = false;
                    /* var curpExp = document.getElementById('curp_exp').value;
                    document.getElementById('buttonCheck').setAttribute('href','prcd/checkListPDF.php?curp='+curpExp); */
                }
                else if (verificador = 2){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Datos Generales NO han sido actualizados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });
        //e.preventDefault();

}

function cambiarTab(){
    $("#nav-generales-tab").removeClass('active');
    $("#nav-medicos-tab").addClass('active');
    $("#nav-generales").removeClass('show active');
    $("#nav-medicos").addClass('show active');
}

$(document).ready(function() {
    $('#medicosForm').submit(function(e) {

    var foto = document.getElementById('flagFoto').value;  
    if (foto == 0){
        alert('Debes cargar una foto');
        e.preventDefault();
    }
    else{
        console.log('Foto cargada, continúa...');
        
        /* Datos Médicos */
        var curp_exp = document.getElementById('curp_exp').value;
        var numExp = document.getElementById('numeroExpediente').innerText;
        var discapacidad = document.getElementById('discapacidadList').value;
        var gradoDisc = document.getElementById('gradoDisc').value;
        var tipoDisc = document.getElementById('tipoDisc').value;
        var descDisc = document.getElementById('descDisc').value;
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
        var enfermedadesFull = document.getElementById('numeroB').value;
        var medicamentosFull = document.getElementById('numeroC').value;
        var braileSi1 = document.getElementById('braileSi');
        var braileNo1 = document.getElementById('braileNo');
        var braileNA1 = document.getElementById('braileNA');
        var lsmSi1 = document.getElementById('lsmSi');
        var lsmNo1 = document.getElementById('lsmNo');
        var lsmNA1 = document.getElementById('lsmNA');
        var labiofacialSi1 = document.getElementById('labiofacialSi');
        var labiofacialNo1 = document.getElementById('labiofacialNo');
        var labiofacialNA1 = document.getElementById('labiofacialNA');
        var asistencia = document.getElementById('asistencia').value;
        var permanenteSi = document.getElementById('permanenteSi');
        var permanenteNo = document.getElementById('permanenteNo');
        var permanenteNA = document.getElementById('permanenteNA');

        if (permanenteSi.checked){
            var permanente = 1;
        }
        else if (permanenteNo.checked){
            var permanente = 2;
        }
        else if (permanenteNA.checked){
            var permanente = 3;
        } else {
            var permanente = '';
        }
        
        if (braileSi1.checked){
            var braile = 1;
        } else if (braileNo1.checked){
            var braile = 2;
        } else if (braileNA1.checked){
            var braile = 0;
        } else {
            var braile = '';
        }
        
        if (lsmSi1.checked){
            var lsm = 1;
        } else if (lsmNo1.checked){
            var lsm = 2;
        } else if (lsmNA1.checked){
            var lsm = 0;
        } else {
            var lsm = '';
        }
        
        if (labiofacialSi1.checked){
            var labiofacial = 1;
        } else if (labiofacialNo1.checked){
            var labiofacial = 2;
        } else if (labiofacialNA1.checked){
            var labiofacial = 0;
        } else {
            var labiofacial = '';
        }
        
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
        if (alergias == 0){
            var alergiasFull = "Sin alergias";
        }
        else if (alergias > 0){
            alergias = 1
            var alergiasFull = document.getElementById('numeroA').value;
        }
        if (enfermedadesFull == ""){
            var enfermedades = 0;
            enfermedadesFull = "Enfermedades no reportadas";
        }
        else if (enfermedadesFull != ""){
            var enfermedades = 1;
        }
        if (medicamentosFull == ""){
            var medicamentos = 0;
            medicamentosFull = "Medicamentos no reportadas";
        }
        else if (medicamentosFull != ""){
            var medicamentos = 1;
        }

        $.ajax({
            type: "POST",
            url: 'prcd/guardarmedicos.php',
            dataType:'json',
            data: {
                curp_exp:curp_exp,
                numExp:numExp,
                discapacidad:discapacidad,
                gradoDisc:gradoDisc,
                tipoDisc:tipoDisc,
                descDisc:descDisc,
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
                medicamentosFull:medicamentosFull,
                asistencia:asistencia,
                braile:braile,
                lsm:lsm,
                labiofacial:labiofacial,
                permanente:permanente
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
                    document.getElementById('nav-medicos-tab').disabled = false;
                    document.getElementById('nav-generales-tab').disabled = false;
                    document.getElementById('nav-vivienda-tab').disabled = false;
                    document.getElementById('guardarMedicosbtn').hidden = true;
                    document.getElementById('guardarMedicosbtnUpdate').hidden = false;
                    cambiarTab2();
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
    }
    })
})


function updateDatosMedicos(){
        /* Datos Médicos */
        var curp_exp = document.getElementById('curp_exp').value;
        var numExp = document.getElementById('numeroExpediente').innerText;
        var discapacidad = document.getElementById('discapacidadList').value;
        var gradoDisc = document.getElementById('gradoDisc').value;
        var tipoDisc = document.getElementById('tipoDisc').value;
        var descDisc = document.getElementById('descDisc').value;
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
        var enfermedadesFull = document.getElementById('numeroB').value;
        var medicamentosFull = document.getElementById('numeroC').value;
        var braileSi1 = document.getElementById('braileSi');
        var braileNo1 = document.getElementById('braileNo');
        var braileNA1 = document.getElementById('braileNA');
        var lsmSi1 = document.getElementById('lsmSi');
        var lsmNo1 = document.getElementById('lsmNo');
        var lsmNA1 = document.getElementById('lsmNA');
        var labiofacialSi1 = document.getElementById('labiofacialSi');
        var labiofacialNo1 = document.getElementById('labiofacialNo');
        var labiofacialNA1 = document.getElementById('labiofacialNA');
        var asistencia = document.getElementById('asistencia').value;
        var permanenteSi = document.getElementById('permanenteSi');
        var permanenteNo = document.getElementById('permanenteNo');
        var permanenteNA = document.getElementById('permanenteNA');

        if (permanenteSi.checked){
            var permanente = 1;
        }
        else if (permanenteNo.checked){
            var permanente = 2;
        }
        else if (permanenteNA.checked){
            var permanente = 3;
        } else {
            var permanente = '';
        }
        
        if (braileSi1.checked){
            var braile = 1;
        } else if (braileNo1.checked){
            var braile = 2;
        } else if (braileNA1.checked){
            var braile = 0;
        } else {
            var braile = '';
        }
        
        if (lsmSi1.checked){
            var lsm = 1;
        } else if (lsmNo1.checked){
            var lsm = 2;
        } else if (lsmNA1.checked){
            var lsm = 0;
        } else {
            var lsm = '';
        }
        
        if (labiofacialSi1.checked){
            var labiofacial = 1;
        } else if (labiofacialNo1.checked){
            var labiofacial = 2;
        } else if (labiofacialNA1.checked){
            var labiofacial = 0;
        } else {
            var labiofacial = '';
        }
        
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
        if (alergias == 0){
            var alergiasFull = "Sin alergias";
        }
        else if (alergias > 0){
            alergias = 1
            var alergiasFull = document.getElementById('numeroA').value;
        }
        if (enfermedadesFull == ""){
            var enfermedades = 0;
            enfermedadesFull = "Enfermedades no reportadas";
        }
        else if (enfermedadesFull != ""){
            var enfermedades = 1;
        }
        if (medicamentosFull == ""){
            var medicamentos = 0;
            medicamentosFull = "Medicamentos no reportadas";
        }
        else if (medicamentosFull != ""){
            var medicamentos = 1;
        }
        
        $.ajax({
            type: "POST",
            url: 'prcd/editar_guardarmedicos.php',
            dataType:'json',
            data: {
                curp_exp:curp_exp,
                numExp:numExp,
                discapacidad:discapacidad,
                gradoDisc:gradoDisc,
                tipoDisc:tipoDisc,
                descDisc:descDisc,
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
                medicamentosFull:medicamentosFull,
                asistencia:asistencia,
                braile:braile,
                lsm:lsm,
                labiofacial:labiofacial,
                permanente:permanente
            },
            success: function(response){
                var jsonData = JSON.parse(JSON.stringify(response));
                var verificador = jsonData.succes;
                if (verificador = 1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos Médicos han sido actualizados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    document.getElementById('nav-medicos-tab').disabled = false;
                    document.getElementById('nav-generales-tab').disabled = false;
                    document.getElementById('nav-vivienda-tab').disabled = false;

                    cambiarTab2();
                }
                else if (verificador = 2){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Datos Médicos NO han sido actualizados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });
        //e.preventDefault();

}

function cambiarTab2(){
    $("#nav-medicos-tab").removeClass('active');
    $("#nav-vivienda-tab").addClass('active');
    $("#nav-medicos").removeClass('show active');
    $("#nav-vivienda").addClass('show active');
}

function buscarGrupo(){
    var grupo = document.getElementById('grupoSearch').value;
    $.ajax({
        type: "POST",
        url: 'query/queryGruposVulnerables.php',
        dataType:'html',
        data: {
            grupo:grupo
        },
        success: function(data){
            $('#grupos').fadeIn(1000).html(data);
        }
    });
}

function queryTabAlergias(x){
    var alergias = x;
    $.ajax({
        type: "POST",
        url: 'query/queryAlergias.php',
        dataType:'html',
        data: {
            alergias:alergias
        },
        success: function(data){
            $('#tipoAlergia').fadeIn(1000).html(data);
        }
    });
}

function queryAlergiasBadges(x){
    var alergiasBadges = x;
    $.ajax({
        type: "POST",
        url: 'query/queryAlergiasBadges.php',
        dataType:'html',
        data: {
            alergiasBadges:alergiasBadges
        },
        success: function(data){
            $('#alergiasFull').fadeIn(1000).append(data);
        }
    });
}
function queryEnfermedadesBadges(x){
    var enfermedadesBadges = x;
    $.ajax({
        type: "POST",
        url: 'query/queryEnfermedadesBadges.php',
        dataType:'html',
        data: {
            enfermedadesBadges:enfermedadesBadges
        },
        success: function(data){
            $('#enfermedadesFull').fadeIn(1000).append(data);
        }
    });
}

function removeA(val) {
    console.log(val);
    document.getElementById(val).remove();
}

function openModalE(val) {
    var x = val;
    var y = document.getElementById('hiddenEnf').value;
    $('#enfermedadModal').modal('show');
    console.log(y);
    if(y == 0){
        x+1;
        document.getElementById('hiddenEnf').value = x;
    }
    else if (y > x){
        y+1;
        document.getElementById('hiddenEnf').value = y;
    }

    
    document.getElementById('hiddenEnf').value = val;
    // document.getElementById('hiddenEnf').setAttribute('id','E'+val);
    
}

function badgesEnf(){
    var id = document.getElementById('hiddenEnf').value;
    var nombre = document.getElementById('enfermedadInput').value;
    var code = '<button class="badge btn btn-sm rounded-pill text-bg-secondary" id="E'+id+'"><span id="'+id+'" class="valorFull">'+nombre+'</span> <a class="text-light" onclick="removeA(\'E'+id+'\')"><i class="bi bi-x-circle"></i></a></button>';

    document.getElementById('enfermedadesFull').append(code);
}

function buscarEnfermedad(){
    var enfermedad = document.getElementById('enfermedadesSearch').value;
    $.ajax({
        type: "POST",
        url: 'query/queryEnfermedades.php',
        dataType:'html',
        data: {
            enfermedad:enfermedad
        },
        success: function(data){
            $('#enfermedades').fadeIn(1000).html(data);
        }
    });
}

function buscarMedicamento(){
    var medicamento = document.getElementById('buscarMed').value;
    $.ajax({
        type: "POST",
        url: 'query/queryMedicamentos.php',
        dataType:'html',
        data: {
            medicamento:medicamento
        },
        success: function(data){
            $('#medicamentos').fadeIn(1000).html(data);
        }
    });
}

/* function guardarvivienda(){ */
$(document).ready(function() {
    $("#Formvivienda").submit(function(e) {

        /* Datos Médicos */
        var curp_exp = document.getElementById('curp_exp').value;
        var numExp = document.getElementById('numeroExpediente').innerText;
        var viviendaPro = document.getElementById('viviendaPro');
        var viviendaPre = document.getElementById('viviendaPre');
        var viviendaRe = document.getElementById('viviendaRe');
        var viviendaPropSi = document.getElementById('viviendaPropSi');
        var viviendaPropNo = document.getElementById('viviendaPropNo');
        var tipoViviendaC = document.getElementById('tipoViviendaC');
        var tipoViviendaD = document.getElementById('tipoViviendaD');
        var tipoViviendaV = document.getElementById('tipoViviendaV');
        var tipoViviendaO = document.getElementById('tipoViviendaO');
        var numHabitaciones = document.getElementById('numHabitaciones').value;
        var cocina = document.getElementById('cocina');
        var sala = document.getElementById('sala');
        var bath = document.getElementById('bath');
        var bathNumInput = document.getElementById('bathNum').value;
        var interior = document.getElementById('interior');
        var exterior = document.getElementById('exterior');
        var otroRoom = document.getElementById('otroRoom');
        var lamina = document.getElementById('lamina');
        var cemento = document.getElementById('cemento');
        var otrosTecho = document.getElementById('otroTecho');
        var block = document.getElementById('block');
        var ladrillo = document.getElementById('ladrillo');
        var adobe = document.getElementById('adobe');
        var otrosPared = document.getElementById('otroPared');
        var agua = document.getElementById('agua');
        var luz = document.getElementById('luz');
        var drenaje = document.getElementById('drenaje');
        var gas = document.getElementById('gas');
        var internet = document.getElementById('internet');
        var celular = document.getElementById('celular');
        var carro = document.getElementById('carro');
        var telefono = document.getElementById('telefono');
        var otroServicios = document.getElementById('otroServicios');
        var tv = document.getElementById('tv');
        var lavadora = document.getElementById('lavadora');
        var dispositivo = document.getElementById('dispositivo');
        var microondas = document.getElementById('microondas');
        var computadora = document.getElementById('computadora');
        var licuadora = document.getElementById('licuadora');
        var estufa = document.getElementById('estufa');
        var refri = document.getElementById('refri');
        var otroElectro = document.getElementById('otroElectro');
        var dependienteSi = document.getElementById('dependienteSi');
        var dependienteNo = document.getElementById('dependienteNo');
        var dependienteEco = document.getElementById('dependienteEsp').value;
        var dependientesSi = document.getElementById('dependientesSi');
        var dependientesNo = document.getElementById('dependientesNo');
        
        //var deudasSi = document.getElementById('deudasSi');
        //var deudasNo = document.getElementById('deudasNo');
        
        if (dependienteSi.checked){
            var dependiente = 1;
            var financiador = dependienteEco;
        } else if (dependienteNo.checked){
            var dependiente = 0;
            var financiador = '';
        }

        if (dependientesSi.checked){
            var dependientes = document.getElementById('dependientes').value;
        } else if (dependientesNo.checked){
            var dependientes = '';
        } else {
            dependientes = '';
        }
        
        if(viviendaPro.checked){
            var vivienda = 1;
            //var montoRenta = 0;
        }
        else if (viviendaPre.checked){
            var vivienda = 2;
            //var montoRenta = 0;
        }
        else if (viviendaRe.checked){
            var vivienda = 3;
            //var montoRenta = document.getElementById('montoVivienda').value;
        }
        if(viviendaPropSi.checked){
            var viviendaProp = 1;
            //var costoVivienda = document.getElementById('costoVivienda').value;
        }
        else if (viviendaPropNo.checked){
            var viviendaProp = 0;
            //var costoVivienda = 0;
        }
        if(tipoViviendaC.checked){
            var tipoVivienda = 1;
            var viviendaOtro = 0;
        }
        else if (tipoViviendaD.checked){
            var tipoVivienda = 2;
            var viviendaOtro = 0;
        }
        else if (tipoViviendaV.checked){
            var tipoVivienda = 3;
            var viviendaOtro = 0;
        }
        else if (tipoViviendaO.checked){
            var tipoVivienda = 3;
            var viviendaOtro = document.getElementById('viviendaOtro').value;
        }
        if (cocina.checked){
            var cocinav = 1;
        } else {
            var cocinav = 0;
        }
        if (sala.checked){
            var salav = 1;
        } else {
            var salav = 0;
        }
        if (bath.checked){
            var bathv = 1;
            var bathNum = bathNumInput;
        } else {
            var bathv = 0;
            var bathNum = '';
        }
        if (interior.checked){
            var localizacion = 1;
        } else if (exterior.checked){
            var localizacion = 2;
        } else {
            var localizacion = 0;
        }

        if (otroRoom.checked){
            var otroRoomInput = document.getElementById('otroRoomInput').value;
        }
        else{
            var otroRoomInput = 0;
        }
        if (lamina.checked){
            var techo = 1;
            var otroTechoInput = 0;
        } else if (cemento.checked){
            var techo = 2;
            var otroTechoInput = 0;
        } else if (otrosTecho.checked){
            var techo = 3;
            var otroTechoInput = document.getElementById('otroTechoInput').value;
        } else {
            var otroTechoInput = 0;
        }
        if (block.checked){
            var pared = 1;
            var otroParedInput = 0;
        } else if (ladrillo.checked){
            var pared = 2;
            var otroParedInput = 0;
        } else if (adobe.checked){
            var pared = 3;
            var otroParedInput = 0;
        } else if (otrosPared.checked){
            var pared = 4;
            var otroParedInput = document.getElementById('otroParedInput').value;
        } else {
            var otroParedInput = 0;
        }
        if (agua.checked){
            var aguac = 1;
        } else {
            var aguac = 0;
        }
        if (luz.checked){
            var luzc = 1;
        } else {
            var luzc = 0;
        }
        if (drenaje.checked){
            var drenajec = 1;
        } else {
            var drenajec = 0;
        }
        
        if (internet.checked){
            var internetc = 1;
        } else {
            var internetc = 0;
        }
        if (celular.checked){
            var celularc = 1;
        } else {
            var celularc = 0;
        }
        if (carro.checked){
            var carroc = 1;
        } else {
            var carroc = 0;
        }
        if (gas.checked){
            var gasc = 1;
        } else {
            var gasc = 0;
        }
        if (telefono.checked){
            var telefonoc = 1;
        } else {
            var telefonoc = 0;
        }
        if (otroServicios.checked){
            var otroServiciosInput = document.getElementById('otroServiciosInput').value;
        } else {
            var otroServiciosInput = 0;
        }
        if (tv.checked){
            var tvc = 1;
        } else {
            var tvc = 0;
        }
        if (lavadora.checked){
            var lavadorac = 1;
        } else {
            var lavadorac = 0;
        }
        if (dispositivo.checked){
            var dispositivoC = 1;
        } else {
            var dispositivoC = 0;
        }
        if (microondas.checked){
            var microondasc = 1;
        } else {
            var microondasc = 0;
        }
        if (computadora.checked){
            var computadorac = 1;
        } else {
            var computadorac = 0;
        }
        if (licuadora.checked){
            var licuadorac = 1;
        } else {
            var licuadorac = 0;
        }

        if (refri.checked){
            var refrigerador = 1;
        } else {
            var refrigerador = 0;
        }
        if (estufa.checked){
            var estufac = 1;
        } else {
            var estufac = 0;
        }
        if (otroElectro.checked){
            var otroElectroInput = document.getElementById('otroElectroInput').value;
        } else {
            var otroElectroInput = 0;
        }
        
        $.ajax({
            type: "POST",
            url: 'prcd/guardarvivienda.php',
            dataType:'json',
            async: true,
            data: {
                curp_exp:curp_exp,
                numExp:numExp,
                vivienda:vivienda,
                viviendaProp:viviendaProp,
                tipoVivienda:tipoVivienda,
                viviendaOtro:viviendaOtro,
                numHabitaciones:numHabitaciones,
                cocinav:cocinav,
                salav:salav,
                bathv:bathv,
                bathNum:bathNum,
                localizacion:localizacion,
                otroRoomInput:otroRoomInput,
                techo:techo,
                otroTechoInput:otroTechoInput,
                pared:pared,
                otroParedInput:otroParedInput,
                aguac:aguac,
                luzc:luzc,
                drenajec:drenajec,
                internetc:internetc,
                celularc:celularc,
                carroc:carroc,
                gasc:gasc,
                telefonoc:telefonoc,
                otroServiciosInput:otroServiciosInput,
                tvc:tvc,
                lavadorac:lavadorac,
                dispositivoC:dispositivoC,
                microondasc:microondasc,
                computadorac:computadorac,
                licuadorac:licuadorac,
                estufac:estufac,
                refrigerador:refrigerador,
                otroElectroInput:otroElectroInput,
                dependiente:dependiente,
                financiador:financiador,
                dependientes:dependientes
            },
            success: function(response){
                var jsonData = JSON.parse(JSON.stringify(response));
                
                var verificador = jsonData.success;
                
                if (verificador == 1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos de Vivienda han sido guardados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    document.getElementById('nav-medicos-tab').disabled = false;
                    document.getElementById('nav-generales-tab').disabled = false;
                    document.getElementById('nav-vivienda-tab').disabled = false;
                    document.getElementById('guardarBTNpadron').hidden = true;
                    document.getElementById('guardarBTNVivienda1').hidden = false;
                    document.getElementById('Formvivienda').setAttribute('id','Formvivienda1');
                    cambiarTab3();
                    document.getElementById('nav-integracion-tab').disabled = false;
                    document.getElementById('nav-referencias-tab').disabled = false;
                    document.getElementById('nav-servicios-tab').disabled = false;
                    document.getElementById('nav-docs-tab').disabled = false;
                    document.getElementById('nav-formato-tab').disabled = false;
                }
                else if (verificador == 2){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Datos de Vivienda NO han sido guardados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });
        e.preventDefault();
    })
})

function updateVivienda() {
        /* Datos Médicos */
        var curp_exp = document.getElementById('curp_exp').value;
        var numExp = document.getElementById('numeroExpediente').innerText;
        var viviendaPro = document.getElementById('viviendaPro');
        var viviendaPre = document.getElementById('viviendaPre');
        var viviendaRe = document.getElementById('viviendaRe');
        var viviendaPropSi = document.getElementById('viviendaPropSi');
        var viviendaPropNo = document.getElementById('viviendaPropNo');
        var tipoViviendaC = document.getElementById('tipoViviendaC');
        var tipoViviendaD = document.getElementById('tipoViviendaD');
        var tipoViviendaV = document.getElementById('tipoViviendaV');
        var tipoViviendaO = document.getElementById('tipoViviendaO');
        var numHabitaciones = document.getElementById('numHabitaciones').value;
        var cocina = document.getElementById('cocina');
        var sala = document.getElementById('sala');
        var bath = document.getElementById('bath');
        var bathNumInput = document.getElementById('bathNum').value;
        var interior = document.getElementById('interior');
        var exterior = document.getElementById('exterior');
        var otroRoom = document.getElementById('otroRoom');
        var lamina = document.getElementById('lamina');
        var cemento = document.getElementById('cemento');
        var otrosTecho = document.getElementById('otroTecho');
        var block = document.getElementById('block');
        var ladrillo = document.getElementById('ladrillo');
        var adobe = document.getElementById('adobe');
        var otrosPared = document.getElementById('otroPared');
        var agua = document.getElementById('agua');
        var luz = document.getElementById('luz');
        var drenaje = document.getElementById('drenaje');
        var gas = document.getElementById('gas');
        var internet = document.getElementById('internet');
        var celular = document.getElementById('celular');
        var carro = document.getElementById('carro');
        var telefono = document.getElementById('telefono');
        var otroServicios = document.getElementById('otroServicios');
        var tv = document.getElementById('tv');
        var lavadora = document.getElementById('lavadora');
        var dispositivo = document.getElementById('dispositivo');
        var microondas = document.getElementById('microondas');
        var computadora = document.getElementById('computadora');
        var licuadora = document.getElementById('licuadora');
        var estufa = document.getElementById('estufa');
        var refri = document.getElementById('refri');
        var otroElectro = document.getElementById('otroElectro');
        var dependienteSi = document.getElementById('dependienteSi');
        var dependienteNo = document.getElementById('dependienteNo');
        var dependienteEco = document.getElementById('dependienteEsp').value;
        var dependientesSi = document.getElementById('dependientesSi');
        var dependientesNo = document.getElementById('dependientesNo');
        
        //var deudasSi = document.getElementById('deudasSi');
        //var deudasNo = document.getElementById('deudasNo');
        
        if (dependienteSi.checked){
            var dependiente = 1;
            var financiador = dependienteEco;
        } else if (dependienteNo.checked){
            var dependiente = 0;
            var financiador = '';
        }

        if (dependientesSi.checked){
            var dependientes = document.getElementById('dependientes').value;
        } else if (dependientesNo.checked){
            var dependientes = '';
        } else {
            dependientes = '';
        }
        
        if(viviendaPro.checked){
            var vivienda = 1;
            //var montoRenta = 0;
        }
        else if (viviendaPre.checked){
            var vivienda = 2;
            //var montoRenta = 0;
        }
        else if (viviendaRe.checked){
            var vivienda = 3;
            //var montoRenta = document.getElementById('montoVivienda').value;
        }
        if(viviendaPropSi.checked){
            var viviendaProp = 1;
            //var costoVivienda = document.getElementById('costoVivienda').value;
        }
        else if (viviendaPropNo.checked){
            var viviendaProp = 0;
            //var costoVivienda = 0;
        }
        if(tipoViviendaC.checked){
            var tipoVivienda = 1;
            var viviendaOtro = 0;
        }
        else if (tipoViviendaD.checked){
            var tipoVivienda = 2;
            var viviendaOtro = 0;
        }
        else if (tipoViviendaV.checked){
            var tipoVivienda = 3;
            var viviendaOtro = 0;
        }
        else if (tipoViviendaO.checked){
            var tipoVivienda = 3;
            var viviendaOtro = document.getElementById('viviendaOtro').value;
        }
        else {
            var tipoVivienda = "";
            var viviendaOtro = "";
        }
        if (cocina.checked){
            var cocinav = 1;
        } else {
            var cocinav = 0;
        }
        if (sala.checked){
            var salav = 1;
        } else {
            var salav = 0;
        }
        if (bath.checked){
            var bathv = 1;
            var bathNum = bathNumInput;
        } else {
            var bathv = 0;
            var bathNum = '';
        }
        if (interior.checked){
            var localizacion = 1;
        } else if (exterior.checked){
            var localizacion = 2;
        } else {
            var localizacion = 0;
        }

        if (otroRoom.checked){
            var otroRoomInput = document.getElementById('otroRoomInput').value;
        }
        else{
            var otroRoomInput = 0;
        }
        if (lamina.checked){
            var techo = 1;
            var otroTechoInput = 0;
        } else if (cemento.checked){
            var techo = 2;
            var otroTechoInput = 0;
        } else if (otrosTecho.checked){
            var techo = 3;
            var otroTechoInput = document.getElementById('otroTechoInput').value;
        } else {
            var otroTechoInput = 0;
        }
        if (block.checked){
            var pared = 1;
            var otroParedInput = 0;
        } else if (ladrillo.checked){
            var pared = 2;
            var otroParedInput = 0;
        } else if (adobe.checked){
            var pared = 3;
            var otroParedInput = 0;
        } else if (otrosPared.checked){
            var pared = 4;
            var otroParedInput = document.getElementById('otroParedInput').value;
        } else {
            var otroParedInput = 0;
        }
        if (agua.checked){
            var aguac = 1;
        } else {
            var aguac = 0;
        }
        if (luz.checked){
            var luzc = 1;
        } else {
            var luzc = 0;
        }
        if (drenaje.checked){
            var drenajec = 1;
        } else {
            var drenajec = 0;
        }
        
        if (internet.checked){
            var internetc = 1;
        } else {
            var internetc = 0;
        }
        if (celular.checked){
            var celularc = 1;
        } else {
            var celularc = 0;
        }
        if (carro.checked){
            var carroc = 1;
        } else {
            var carroc = 0;
        }
        if (gas.checked){
            var gasc = 1;
        } else {
            var gasc = 0;
        }
        if (telefono.checked){
            var telefonoc = 1;
        } else {
            var telefonoc = 0;
        }
        if (otroServicios.checked){
            var otroServiciosInput = document.getElementById('otroServiciosInput').value;
        } else {
            var otroServiciosInput = 0;
        }
        if (tv.checked){
            var tvc = 1;
        } else {
            var tvc = 0;
        }
        if (lavadora.checked){
            var lavadorac = 1;
        } else {
            var lavadorac = 0;
        }
        if (dispositivo.checked){
            var dispositivoC = 1;
        } else {
            var dispositivoC = 0;
        }
        if (microondas.checked){
            var microondasc = 1;
        } else {
            var microondasc = 0;
        }
        if (computadora.checked){
            var computadorac = 1;
        } else {
            var computadorac = 0;
        }
        if (licuadora.checked){
            var licuadorac = 1;
        } else {
            var licuadorac = 0;
        }

        if (refri.checked){
            var refrigerador = 1;
        } else {
            var refrigerador = 0;
        }
        if (estufa.checked){
            var estufac = 1;
        } else {
            var estufac = 0;
        }
        if (otroElectro.checked){
            var otroElectroInput = document.getElementById('otroElectroInput').value;
        } else {
            var otroElectroInput = 0;
        }
        $.ajax({
            type: "POST",
            url: 'prcd/editar_guardarvivienda.php',
            dataType:'json',
            async: true,
            data: {
                curp_exp:curp_exp,
                numExp:numExp,
                vivienda:vivienda,
                viviendaProp:viviendaProp,
                tipoVivienda:tipoVivienda,
                viviendaOtro:viviendaOtro,
                numHabitaciones:numHabitaciones,
                cocinav:cocinav,
                salav:salav,
                bathv:bathv,
                bathNum:bathNum,
                localizacion:localizacion,
                otroRoomInput:otroRoomInput,
                techo:techo,
                otroTechoInput:otroTechoInput,
                pared:pared,
                otroParedInput:otroParedInput,
                aguac:aguac,
                luzc:luzc,
                drenajec:drenajec,
                internetc:internetc,
                celularc:celularc,
                carroc:carroc,
                gasc:gasc,
                telefonoc:telefonoc,
                otroServiciosInput:otroServiciosInput,
                tvc:tvc,
                lavadorac:lavadorac,
                dispositivoC:dispositivoC,
                microondasc:microondasc,
                computadorac:computadorac,
                licuadorac:licuadorac,
                estufac:estufac,
                refrigerador:refrigerador,
                otroElectroInput:otroElectroInput,
                dependiente:dependiente,
                financiador:financiador,
                dependientes:dependientes
            },
            success: function(response){
                var jsonData = JSON.parse(JSON.stringify(response));
                
                var verificador = jsonData.success;
                
                if (verificador = 1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos de Vivienda han sido actualizados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    document.getElementById('nav-medicos-tab').disabled = false;
                    document.getElementById('nav-generales-tab').disabled = false;
                    document.getElementById('nav-vivienda-tab').disabled = false;
                    cambiarTab3();
                    document.getElementById('nav-integracion-tab').disabled = false;
                    document.getElementById('nav-referencias-tab').disabled = false;
                    document.getElementById('nav-servicios-tab').disabled = false;
                    document.getElementById('nav-docs-tab').disabled = false;
                    document.getElementById('nav-formato-tab').disabled = false;
                }
                else if (verificador = 2){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Datos de Vivienda NO han sido actualizados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });
}

function cambiarTab3(){
    $("#nav-vivienda-tab").removeClass('active');
    $("#nav-integracion-tab").addClass('active');
    $("#nav-vivienda").removeClass('show active');
    $("#nav-integracion").addClass('show active');
}

$(document).ready(function() {
    $('#familiaForm').submit(function(e) {
        /* Integración Familiar */
        var curp_exp = document.getElementById('curp_exp').value;
        var nombreFamiliar = document.getElementById('nombreFamiliar').value;
        var parentescoFam = document.getElementById('parentescoFam').value;
        var edadFam = document.getElementById('edadFam').value;
        var escolaridadFam = document.getElementById('escolaridadFam').value;
        var profesionFam = document.getElementById('profesionFam').value;
        var discapacidadFam = document.getElementById('discapacidadFam').value;
        var ingresoFam = document.getElementById('ingresoFam').value;
        var telFam = document.getElementById('telFam').value;
        var emailFam = document.getElementById('emailFam').value;
        
        $.ajax({
            type: "POST",
            url: 'prcd/guardarFamilia.php',
            dataType:'json',
            data: {
                curp_exp,
                nombreFamiliar:nombreFamiliar,
                parentescoFam:parentescoFam,
                edadFam:edadFam,
                escolaridadFam:escolaridadFam,
                profesionFam:profesionFam,
                discapacidadFam:discapacidadFam,
                ingresoFam:ingresoFam,
                telFam:telFam,
                emailFam:emailFam
            },
            success: function(response){
                var jsonData = JSON.parse(JSON.stringify(response));
                
                var verificador = jsonData.success;
                if (verificador = 1){
                    document.getElementById('nombreFamiliar').value = "";
                    document.getElementById('parentescoFam').value = "";
                    document.getElementById('edadFam').value = "";
                    document.getElementById('escolaridadFam').value = "";
                    document.getElementById('profesionFam').value = "";
                    document.getElementById('discapacidadFam').value = "";
                    document.getElementById('ingresoFam').value = "";
                    document.getElementById('telFam').value = "";
                    document.getElementById('emailFam').value = "";
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos del Familiar han sido guardados',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    showMeFam();
                }
                else if (verificador = 2){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Datos del Familiar NO han sido guardados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        })
        e.preventDefault();
    })
})

$(document).ready(function() {
    $('#familiarEditForm').submit(function(e) {
        /* Integración Familiar */
        var curp_exp = document.getElementById('curp_exp').value;
        var nombreFamiliar = document.getElementById('nombreFamiliar2').value;
        var parentescoFam = document.getElementById('parentescoFam2').value;
        var edadFam = document.getElementById('edadFam2').value;
        var escolaridadFam = document.getElementById('escolaridadFam2').value;
        var profesionFam = document.getElementById('profesionFam2').value;
        var discapacidadFam = document.getElementById('discapacidadFam2').value;
        var ingresoFam = document.getElementById('ingresoFam2').value;
        var telFam = document.getElementById('telFam2').value;
        var emailFam = document.getElementById('emailFam2').value;
        var idF = document.getElementById('idFam').value;
        
        $.ajax({
            type: "POST",
            url: 'prcd/updateFamiliar.php',
            dataType:'json',
            data: {
                curp_exp,
                nombreFamiliar:nombreFamiliar,
                parentescoFam:parentescoFam,
                edadFam:edadFam,
                escolaridadFam:escolaridadFam,
                profesionFam:profesionFam,
                discapacidadFam:discapacidadFam,
                ingresoFam:ingresoFam,
                telFam:telFam,
                emailFam:emailFam,
                idF:idF
            },
            success: function(response){
                var jsonData = JSON.parse(JSON.stringify(response));
                
                var verificador = jsonData.success;
                if (verificador = 1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos del Familiar han sido Actualizados',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    showMeFam();
                }
                else if (verificador = 2){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Datos del Familiar NO han sido Actualizado',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        })
        e.preventDefault();
    })
})

function showMeFam(){
    var curp_exp = document.getElementById('curp_exp').value;
    $.ajax({
        type: "POST",
        url: 'query/queryFamilia.php',
        dataType:'HTML',
        data: {
            curp_exp:curp_exp
        },
        success: function(response){
            $('#familiaresTab').fadeIn(1000).html(response);
        }
    });
}

$(document).ready(function() {
    $('#referenciasForm').submit(function(e) { 
        /* Referencias */
        var curp_exp = document.getElementById('curp_exp').value;
        var nombreReferencia = document.getElementById('nombreReferencia').value;
        var parentescoRef = document.getElementById('parentescoRef').value;
        var telRef = document.getElementById('telRef').value;
        var profesionRef = document.getElementById('profesionRef').value;
        var domicilioRef = document.getElementById('domicilioRef').value;
        
        $.ajax({
            type: "POST",
            url: 'prcd/guardarReferencia.php',
            dataType:'json',
            data: {
                curp_exp:curp_exp,
                nombreReferencia:nombreReferencia,
                parentescoRef:parentescoRef,
                telRef:telRef,
                profesionRef:profesionRef,
                domicilioRef:domicilioRef
            },
            success: function(response){
                var jsonData = JSON.parse(JSON.stringify(response));
                
                var verificador = jsonData.success;
                if (verificador == 1){
                    document.getElementById('nombreReferencia').value = "";
                    document.getElementById('parentescoRef').value = "";
                    document.getElementById('telRef').value = "";
                    document.getElementById('profesionRef').value = "";
                    document.getElementById('domicilioRef').value = "";
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos de Referencia han sido guardados',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    showMeRef();
                }
                else if (verificador == 2){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Datos de Referencia NO han sido guardados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        })
        e.preventDefault();
    })
})

$(document).ready(function() {
    $('#referenciasEditForm').submit(function(e) { 
        /* Referencias */
        var nombreReferencia = document.getElementById('nombreReferencia2').value;
        var parentescoRef = document.getElementById('parentescoRef2').value;
        var telRef = document.getElementById('telRef2').value;
        var profesionRef = document.getElementById('profesionRef2').value;
        var domicilioRef = document.getElementById('domicilioRef2').value;
        var idR = document.getElementById('idRef').value;
        
        $.ajax({
            type: "POST",
            url: 'prcd/updateReferencia.php',
            dataType:'json',
            data: {
                nombreReferencia:nombreReferencia,
                parentescoRef:parentescoRef,
                telRef:telRef,
                profesionRef:profesionRef,
                domicilioRef:domicilioRef,
                idR:idR
            },
            success: function(response){
                var jsonData = JSON.parse(JSON.stringify(response));
                
                var verificador = jsonData.success;
                if (verificador == 1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos de Referencia han sido Actualizados',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    showMeRef();
                }
                else if (verificador == 2){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Datos de Referencia NO han sido actualizados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        })
        e.preventDefault();
    })
})

function showMeRef(){
    var curp_exp = document.getElementById('curp_exp').value;
    $.ajax({
        type: "POST",
        url: 'query/queryReferencias.php',
        dataType:'HTML',
        data: {
            curp_exp:curp_exp
        },
        success: function(response){
            $('#referenciasTab').fadeIn(1000).html(response);
        }
    });
}


function queryTabFuncionales(x){
    var solicitud = x;
    
    if(solicitud == 1){
        document.getElementById('descripcionFuncional').removeAttribute('style');
        document.getElementById('cantidadFuncional').removeAttribute('style');
        document.getElementById('costoFuncional').removeAttribute('style');
        document.getElementById('btnFuncK').removeAttribute('style');
        document.getElementById('descripcionExtra').setAttribute('style','display: none');
        document.getElementById('costoExtra').setAttribute('style','display: none');
        document.getElementById('btnExtra').setAttribute('style','display: none');
        document.getElementById('descripcionOtro').setAttribute('style','display: none');
        document.getElementById('montoOtro').setAttribute('style','display: none');
        document.getElementById('btnOtro').setAttribute('style','display: none');
        document.getElementById('tipoSolicitud').disabled = true;
        $.ajax({
            type: "POST",
            url: 'query/queryFuncionales.php',
            dataType:'html',
            data: {
                solicitud:solicitud
            },
            success: function(data){
                $('#articuloSolicitud').fadeIn(1000).html(data);
            }
        });
    } else if (solicitud == 2){
        document.getElementById('descripcionExtra').removeAttribute('style');
        document.getElementById('costoExtra').removeAttribute('style');
        document.getElementById('btnExtra').removeAttribute('style');
        document.getElementById('descripcionFuncional').setAttribute('style','display: none');
        document.getElementById('cantidadFuncional').setAttribute('style','display: none');
        document.getElementById('costoFuncional').setAttribute('style','display: none');
        document.getElementById('btnFuncK').setAttribute('style','display: none');
        document.getElementById('descripcionOtro').setAttribute('style','display: none');
        document.getElementById('montoOtro').setAttribute('style','display: none');
        document.getElementById('btnOtro').setAttribute('style','display: none');
        document.getElementById('tipoSolicitud').disabled = true;
        $.ajax({
            type: "POST",
            url: 'query/queryFuncionales.php',
            dataType:'html',
            data: {
                solicitud:solicitud
            },
            success: function(data){
                $('#extraSolicitud').fadeIn(1000).html(data);
            }
        });
    } else if(solicitud == 3){
        document.getElementById('descripcionOtro').removeAttribute('style');
        document.getElementById('montoOtro').removeAttribute('style');
        document.getElementById('btnOtro').removeAttribute('style');
        document.getElementById('descripcionExtra').setAttribute('style','display: none');
        document.getElementById('costoExtra').setAttribute('style','display: none');
        document.getElementById('btnExtra').setAttribute('style','display: none');
        document.getElementById('descripcionFuncional').setAttribute('style','display: none');
        document.getElementById('cantidadFuncional').setAttribute('style','display: none');
        document.getElementById('costoFuncional').setAttribute('style','display: none');
        document.getElementById('btnFuncK').setAttribute('style','display: none');
        document.getElementById('tipoSolicitud').disabled = true;
        $.ajax({
            type: "POST",
            url: 'query/queryFuncionales.php',
            dataType:'html',
            data: {
                solicitud:solicitud
            },
            success: function(data){
                $('#otroSolicitud').fadeIn(1000).html(data);
            }
        });
    }
}

function limpiarModalSolicitud(){
    document.getElementById('tipoSolicitud').value = "Selecciona...";
    document.getElementById('tipoSolicitud').disabled = false;
    document.getElementById('descripcionOtro').setAttribute('style','display: none');
    document.getElementById('montoOtro').setAttribute('style','display: none');
    document.getElementById('btnOtro').setAttribute('style','display: none');
    document.getElementById('descripcionExtra').setAttribute('style','display: none');
    document.getElementById('costoExtra').setAttribute('style','display: none');
    document.getElementById('btnExtra').setAttribute('style','display: none');
    document.getElementById('descripcionFuncional').setAttribute('style','display: none');
    document.getElementById('cantidadFuncional').setAttribute('style','display: none');
    document.getElementById('costoFuncional').setAttribute('style','display: none');
    document.getElementById('btnFuncK').setAttribute('style','display: none');
    document.getElementById('NuevaSolicitud').setAttribute('style','display: none');
    document.getElementById('cantidadArt').value = "";
    document.getElementById('costoSolicitud').value = "";
    document.getElementById('costoSolicitudExtra').value = "";
    document.getElementById('costoSolicitudOtro').value = "";
    document.getElementById('divTag').hidden = true;
    document.getElementById('btnlistaEspera').disabled = true;
    document.getElementById('btnEntregaApoyo').disabled = true;
}

function limpiaInputsFunc(){
    document.getElementById('cantidadArt').value = "";
    document.getElementById('costoSolicitud').value = "";
    document.getElementById('divTag').hidden = true;
}

function limpiaInputsExtra(){
    document.getElementById('costoSolicitudExtra').value = "";
}

function limpiaInputsOtro(){
    document.getElementById('costoSolicitudOtro').value = "";
}

function queryCosto(x){
    var articulo = document.getElementById('articuloSolicitud').value;
    var cantidad = x;
    
    $.ajax({
        type: "POST",
        url: 'query/queryCostos.php',
        dataType:'json',
        data: {
            articulo:articulo,
            cantidad:cantidad
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var verificador = jsonData.estatus;
            if (verificador == 1){
                document.getElementById('divTag').hidden = false;
                document.getElementById('disponible1').setAttribute('style','color:green');
                document.getElementById('disponible').setAttribute('style','color:green');
                document.getElementById('disponible').innerHTML = jsonData.cantidad;
                var variable1 = jsonData.costo;
                var variable2 = document.getElementById('cantidadArt').value;
                var multiplicacion = variable1 * variable2;
                document.getElementById('costoSolicitud').value = multiplicacion;
                document.getElementById('inputUnitario').value = variable1;
                document.getElementById('agregarItemFunc').disabled = false;
            } else {
                document.getElementById('divTag').hidden = false;
                document.getElementById('disponible1').setAttribute('style','color:red');
                document.getElementById('disponible').setAttribute('style','color:red');
                document.getElementById('disponible').innerHTML = jsonData.cantidad;
                document.getElementById('agregarItemFunc').disabled = true;
                document.getElementById('costoSolicitud').value = 0;
            }
        }
    });
}
function refresh(){
    var valor = document.getElementById('descripcionInput').value;
    
    $.ajax({
        type: "POST",
        url: 'query/queryExtraordinarios.php',
        dataType:'html',
        data: {
            valor:valor
        },
        success: function(data){
            document.getElementById('otroSolicitud').innerHTML="";
            $('#otroSolicitud').fadeIn(1000).html(data);
            //alert('Se agregó nuevo apoyo extraordinario al catálogo');

            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Se agregó nuevo apoyo extraordinario al catálogo',
                showConfirmButton: false,
                timer: 1500
            })

        }
    });
}

function folioApoyo(){
    var valor = 1;
    
    $.ajax({
        type: "POST",
        url: 'query/queryFolioApoyo.php',
        dataType:'html',
        data: {
            valor:valor
        },
        success: function(data){
            $('#folioLabel').fadeIn(1000).html(data);
            var fecha = new Date();
            document.getElementById('fechaSolicitud').value = fecha.toISOString().slice(0,10);;
            //alert('Se agregó nuevo apoyo extraordinario al catálogo');

        }
    });
}

function guardarSolicitud(){
    var curp_exp = document.getElementById('curp_exp').value;
    var unitario = document.getElementById('inputUnitario').value;

    var tipoSolicitud = document.getElementById('tipoSolicitud').value;
    var fechaSolicitud = document.getElementById('fechaSolicitud').value;
    var folioSolicitud = document.getElementById('folioSolicitud').value;
    var detalleSolicitud = document.getElementById('articuloSolicitud').value;
    var cantidadArt = document.getElementById('cantidadArt').value;
    var monto_solicitud = document.getElementById('costoSolicitud').value;
    
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
            mostrarTablaServicios();
            if (verificador == 1) {
                mostrarTabla();
                limpiaInputsFunc();
                mostrarTablaServicios();
            } else if (verificador == 0){
                alert('no muestra tabla');
            }
            mostrarTablaServicios();
            document.getElementById('btnEntregaApoyo').disabled = false;
        }

    });
}
function guardarSolicitudExtra(){
    var curp_exp = document.getElementById('curp_exp').value;
    var tipoSolicitud = document.getElementById('tipoSolicitud').value;
    var fechaSolicitud = document.getElementById('fechaSolicitud').value;
    var folioSolicitud = document.getElementById('folioSolicitud').value;
    var extraSolicitud = document.getElementById('extraSolicitud').value;
    var costoSolicitudExtra = document.getElementById('costoSolicitudExtra').value;
    var cantidadArt = 1;
    var unitario = costoSolicitudExtra;
    
    $.ajax({
        type: "POST",
        url: 'prcd/guardarApoyoExtra.php',
        dataType:'json',
        data: {
            curp_exp:curp_exp,
            tipoSolicitud:tipoSolicitud,
            fechaSolicitud:fechaSolicitud,
            folioSolicitud:folioSolicitud,
            extraSolicitud:extraSolicitud,
            cantidadArt:cantidadArt,
            unitario:unitario,
            costoSolicitudExtra:costoSolicitudExtra
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var verificador = jsonData.success;
            if (verificador == 1) {
                mostrarTabla();
                flagEntregaEO();
                limpiaInputsExtra();
                mostrarTablaServicios();
            } else if (verificador == 0){
                alert('no muestra tabla');
            }
            document.getElementById('btnlistaEspera').disabled = false;
        }

    });
}
function guardarSolicitudOtros(){
    var curp_exp = document.getElementById('curp_exp').value;
    var tipoSolicitud = document.getElementById('tipoSolicitud').value;
    var fechaSolicitud = document.getElementById('fechaSolicitud').value;
    var folioSolicitud = document.getElementById('folioSolicitud').value;
    var otroSolicitud = document.getElementById('otroSolicitud').value;
    var costoSolicitudOtro = document.getElementById('costoSolicitudOtro').value;
    var cantidadArt = 1;
    var unitario = costoSolicitudOtro;
    
    $.ajax({
        type: "POST",
        url: 'prcd/guardarApoyoOtro.php',
        dataType:'json',
        data: {
            curp_exp:curp_exp,
            tipoSolicitud:tipoSolicitud,
            fechaSolicitud:fechaSolicitud,
            folioSolicitud:folioSolicitud,
            otroSolicitud:otroSolicitud,
            cantidadArt:cantidadArt,
            unitario:unitario,
            costoSolicitudOtro:costoSolicitudOtro
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var verificador = jsonData.success;
            if (verificador == 1) {
                mostrarTabla();
                flagEntregaEO();
                limpiaInputsOtro();
                mostrarTablaServicios();
            } else if (verificador == 0){
                alert('no muestra tabla');
            }
            document.getElementById('btnlistaEspera').disabled = false;
        }

    });
}

function mostrarTabla(){
    var folioSolicitud = document.getElementById('folioSolicitud').value;
    var tipoSolicitud = document.getElementById('tipoSolicitud').value;

    $.ajax({
        type: "POST",
        url: 'query/queryTablaApoyo.php',
        dataType:'html',
        data: {
            folioSolicitud:folioSolicitud,
            tipoSolicitud:tipoSolicitud
        },
        success: function(data){
            $('#NuevaSolicitud').fadeIn(1000).html(data);
        }
    });

}

function swalEntrega(){
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
        title: 'Estas seguro?',
        text: "Se generará el acta de entrega para firma",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, entregar!',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: true
    }).then((result) => {
        flagEntrega();
        if (result.isConfirmed) {
            limpiarModalSolicitud();
            mostrarTablaServicios();
            document.getElementById('btnEntregaApoyo').disabled = false;
            swalWithBootstrapButtons.fire(
                'Entregado!',
                'Se ha generado el Acta de Entrega',
                'success'
                );
            mostrarTablaServicios();
            $("#solicitudAdd").modal('hide');
        } else if (
                /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
            ) {
            swalWithBootstrapButtons.fire(
                'Cancelado',
                'No se ha generado el Acta de Entrega',
                'error'
            )
        }           
    })
}
function flagEntregaEO(){
    var tipo = document.getElementById('tipoSolicitud').value;
    var curp_exp = document.getElementById('curp_exp').value;
    var folioSolicitud = document.getElementById('folioSolicitud').value;

    $.ajax({
        type: "POST",
        url: 'prcd/actualizarStatusEO.php',
        dataType:'json',
        data: {
            curp_exp:curp_exp,
            folioSolicitud:folioSolicitud,
            tipo:tipo
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var verificador = jsonData.success;
            var monto = jsonData.monto;
            console.log(monto);
            if (verificador == 1) {
                console.log('flag actualizado');
            } else if (verificador == 0){
                console.log('no muestra tabla');
            }
        }
    });
}

function flagEntrega(){
    var tipo = document.getElementById('tipoSolicitud').value;
    var curp_exp = document.getElementById('curp_exp').value;
    var folioSolicitud = document.getElementById('folioSolicitud').value;

    $.ajax({
        type: "POST",
        url: 'prcd/actualizarStatus.php',
        dataType:'json',
        data: {
            curp_exp:curp_exp,
            folioSolicitud:folioSolicitud,
            tipo:tipo
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var verificador = jsonData.success;
            var monto = jsonData.monto;
            console.log(monto);
            if (verificador == 1) {
                console.log('flag actualizado');
            } else if (verificador == 0){
                console.log('no muestra tabla');
            }
        }
    });
}
function flagEntregaEO(){
    var tipo = document.getElementById('tipoSolicitud').value;
    var curp_exp = document.getElementById('curp_exp').value;
    var folioSolicitud = document.getElementById('folioSolicitud').value;

    $.ajax({
        type: "POST",
        url: 'prcd/actualizarStatusEO.php',
        dataType:'json',
        data: {
            curp_exp:curp_exp,
            folioSolicitud:folioSolicitud,
            tipo:tipo
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var verificador = jsonData.success;
            var monto = jsonData.monto;
            console.log(monto);
            if (verificador == 1) {
                console.log('flag actualizado');
            } else if (verificador == 0){
                console.log('no muestra tabla');
            }
        }
    });
}

function mostrarTablaServicios(){
    var curp = document.getElementById('curp_exp').value;

    $.ajax({
        type: "POST",
        url: 'query/querySolicitudes.php',
        dataType:'html',
        data: {
            curp:curp
        },
        success: function(data){
            $('#tablaServicios').fadeIn(1000).html(data);
        }
    });

}

//borrar tabla modal servicios

function borrarSolicitud(){
    var folio = document.getElementById("folioSolicitud").value;
    var curp = document.getElementById("curp_exp").value;
    var tipo = document.getElementById("tipoSolicitud").value;

    $.ajax({
        type: "POST",
        url: 'prcd/eliminarSolicitud.php',
        dataType:'json',
        data: {
            folio:folio,
            curp:curp,
            tipo:tipo
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            
            if (success == 1) {
                alert("No guardado");
            } else if (success == 0){
                alert("No eliminado");
            }
        }
    });
    
}

function swalListaEspera(){
    /* const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
        title: 'Estas seguro?',
        text: "Se generará el acta de entrega para firma",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, entregar!',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) { */
        /* flagEntregaEO(); */
        mostrarTablaServicios();
    Swal.fire(
        'Solicitud Agregada!',
        'Su solicitud se agregó a Lista de Espera',
        'success'
    )
        limpiarModalSolicitud();
        $("#solicitudAdd").modal('hide');
}

function estudioSocioeconomico() {
    
    var curp = document.getElementById('curp_exp').value;
    document.getElementById('imprimeES').setAttribute("href", "prcd/registroPDF.php?curp="+curp);
}

function responsivaCarta() {
    var curp = document.getElementById('curp_exp').value;
    document.getElementById('imprimeCR').setAttribute("href", "prcd/responsivaPDF.php?curp="+curp);
}

function checkListDocs() {
    var curp = document.getElementById('curp_exp').value;

    $.ajax({
        type: "POST",
        url: 'query/checklistDocs.php',
        dataType:'json',
        data: {
            curp:curp
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            
            if (success == 1) {
                document.getElementById('nav-fin-tab').disabled = false;
                document.getElementById('nav-fin-tab').setAttribute('onclick','finalizarExpediente()');
                window.open("prcd/checkListPDF2.php?curp="+curp, "_blank");
            } else if (success == 0){
                alert("No haz cargado documentos");
            }
        }
    });
}

function nona(){
    var curp = document.getElementById('curp_exp').value;
    var registroNo1 = document.getElementById('registroNo');
    var registroNA1 = document.getElementById('registroNA');
    var valoracionNo1 = document.getElementById('valoracionNo');
    var valoracionNA1 = document.getElementById('valoracionNA');
    var actaNo1 = document.getElementById('actaNo');
    var actaNA1 = document.getElementById('actaNA');
    var curpNo1 = document.getElementById('curpNo');
    var curpNA1 = document.getElementById('curpNA');
    var ineNo1 = document.getElementById('ineNo');
    var ineNA1 = document.getElementById('ineNA');
    var comprobanteNo1 = document.getElementById('comprobanteNo');
    var comprobanteNA1 = document.getElementById('comprobanteNA');
    var circulacionNo1 = document.getElementById('circulacionNo');
    var circulacionNA1 = document.getElementById('circulacionNA');
    var registroDoc, valoracionDoc, actaDoc, curpDoc, ineDoc, comprobanteDoc, circulacionDoc;

    if (registroNo1.checked){
        var registroNo = 8;
        registroDoc = 1;
    }
    else {
        var registroNo = "";
        registroDoc = 1;
    }
    if (registroNA1.checked){
        var registroNA = 15;
        registroDoc = 1;
    }
    else {
        var registroNA = "";
        registroDoc = 1;
    }
    if (valoracionNo1.checked){
        var valoracionNo  = 9;
        valoracionDoc = 2;
    }
    else {
        var valoracionNo = "";
        valoracionDoc = 2;
    }
    if (valoracionNA1.checked){
        var valoracionNA = 16;
        valoracionDoc = 2;
    }
    else {
        var valoracionNA = "";
        valoracionDoc = 2;
    }
    if (actaNo1.checked){
        var actaNo = 10;
        actaDoc = 3;
    }
    else {
        var actaNo = "";
        actaDoc = 3;
    }
    if (actaNA1.checked){
        var actaNA = 17;
        actaDoc = 3;
    }
    else {
        var actaNA = "";
        actaDoc = 3;
    }
    if (curpNo1.checked){
        var curpNo = 11;
        curpDoc = 4;
    }
    else {
        var curpNo = "";
        curpDoc = 4;
    }
    if (curpNA1.checked){
        var curpNA = 18;
        curpDoc = 4;
    }
    else {
        var curpNA = "";
        curpDoc = 4;
    }
    if (ineNo1.checked){
        var ineNo = 12;
        ineDoc = 5
    }
    else {
        var ineNo = "";
        ineDoc = 5
    }
    if (ineNA1.checked){
        var ineNA = 19;
        ineDoc = 5
    }
    else {
        var ineNA = "";
        ineDoc = 5
    }
    if (comprobanteNo1.checked){
        var comprobanteNo = 13;
        comprobanteDoc = 6;
    }
    else {
        var comprobanteNo = "";
        comprobanteDoc = 6;
    }
    if (comprobanteNA1.checked){
        var comprobanteNA = 20;
        comprobanteDoc = 6;
    }
    else {
        var comprobanteNA = "";
        comprobanteDoc = 6;
    }
    if (circulacionNo1.checked){
        var circulacionNo = 14;
        circulacionDoc = 7;
    }
    else {
        var circulacionNo = "";
        circulacionDoc = 7;
    }
    if (circulacionNA1.checked){
        var circulacionNA = 21;
        circulacionDoc = 7;
    }
    else {
        var circulacionNA = "";
        circulacionDoc = 7;
    }

    $.ajax({
        type: "POST",
        url: 'prcd/guardarDocumentoNoNA.php',
        dataType:'json',
        data: {
            curp:curp,
            registroNo:registroNo,
            registroNA:registroNA,
            valoracionNo:valoracionNo,
            valoracionNA:valoracionNA,
            actaNo:actaNo,
            actaNA:actaNA,
            curpNo:curpNo,
            curpNA:curpNA,
            ineNo:ineNo,
            ineNA:ineNA,
            comprobanteNo:comprobanteNo,
            comprobanteNA:comprobanteNA,
            circulacionNo:circulacionNo,
            circulacionNA:circulacionNA,
            registroDoc:registroDoc,
            valoracionDoc:valoracionDoc,
            actaDoc:actaDoc,
            curpDoc:curpDoc,
            ineDoc:ineDoc,
            comprobanteDoc:comprobanteDoc,
            circulacionDoc:circulacionDoc
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            console.log(success);
            

            if (success = 10) {
                console.log('si llega');
                document.querySelectorAll("input[type=checkbox]").forEach(function(checkElement) {
                    checkElement.disabled = true;
                });

                /* els.forEach((v) => {
                    v.disabled = true
                }); */
            } else if (success = 0){
                console.log("No se registro NoNA");
            }
        }
    });
}

function credencialExp() {
    var tipoDoc = 1;
    var curp = document.getElementById('curp_exp').value;
    document.getElementById('credencialExpedienteBtn').setAttribute("href", "prcd/generaqrcredencialExp.php?curp="+curp);
    var numExp = document.getElementById('numeroExpediente').innerText;

    $.ajax({
        type: "POST",
        url: 'prcd/guardarDocumento.php',
        dataType:'json',
        data: {
            curp:curp,
            tipoDoc:tipoDoc,
            numExp:numExp
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            
            if (success == 1) {
                document.getElementById('credencialExpedienteBtn').disabled = true;
                window.open("prcd/generaqrcredencialExp.php?curp="+curp, "_blank");
                mostrarTablaServicios();
            } else if (success == 0){
                alert("No se pudo entregar la credencial");
            }
        }
    });
}

function entregarTarjetonExp(){
    var numExp = document.getElementById('numeroExpediente').innerHTML;
    
    document.getElementById('searchDBInclusion2').setAttribute('onfocus','buscarExpediente2(); desbloquearInputsT(this.value)');
    document.getElementById('searchDBInclusion2').value = numExp;
    var curp = document.getElementById('curp_exp').value;
    var tipoDoc = 2;

    $.ajax({
        type: "POST",
        url: 'prcd/guardarDocumento.php',
        dataType:'json',
        data: {
            curp:curp,
            tipoDoc:tipoDoc,
            numExp:numExp
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            
            if (success == 1) {
                document.getElementById('tarjetonExpedienteBtn').disabled = true;
            } else if (success == 0){
                alert("No se pudo entregar el tarjetón");
            }
        }
    });
}

function finalizarExpediente(){
    Swal.fire({
        title: "Estas seguro?",
        text: "terminaste la captura del Expediente Nuevo??",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, terminar!"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            title: "Terminado!",
            text: "El expediente ha sido guardado.",
            icon: "success",
            showConfirmButton: false,
            });
            logFinalizarExpediente();
            location.reload();
        }
    });
}

function logFinalizarExpediente(){
    $.ajax({
        type: "POST",
        url: 'prcd/logFin.php',
        dataType:'json',
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            if (success == 1) {
                console.log('Proceso finalizado correctamente');
            } else if (success == 0){
                console.log('No se finalizó el proceso');
            }
        }
    });
}

function finalizarUpdateExpediente(){
    Swal.fire({
        title: "Estas seguro?",
        text: "terminaste de actualizar el Expediente??",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, terminar!"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            title: "Terminado!",
            text: "El expediente ha sido actualizado.",
            icon: "success",
            showConfirmButton: false,
            });
            location.reload();
        }
    });
}

function fotoEmp() {
    var doc = "_photo";
    var idUsr = document.getElementById('curpEmp').value;
    var file = _("file"+doc).files[0];
    var idUsuario = idUsr;
    var formdata = new FormData();
    // variable del name file
    formdata.append("file", file);
    // variables post
    // formdata.append("documento", documento);
    formdata.append("idUsuario", idUsuario);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandlerEmp, false);
    ajax.addEventListener("load", completeHandlerEmp, false);
    ajax.addEventListener("error", errorHandlerEmp, false);
    ajax.addEventListener("abort", abortHandlerEmp, false);
    ajax.open("POST", "prcd/upload_photoEmp.php"); 
    
    ajax.send(formdata);
    
    function progressHandlerEmp(event) {

        _("loaded_n_total"+doc).innerHTML = "Cargado " + event.loaded + " bytes de " + event.total;
        var percent = (event.loaded / event.total) * 100;
        _("progressBar"+doc).value = Math.round(percent);
        _("status"+doc).innerHTML = Math.round(percent) + "% subido... espere un momento";
    }
    
    function completeHandlerEmp(event) {
        _("status"+doc).innerHTML = event.target.responseText;
        _("progressBar"+doc).value = 100; //wil clear progress bar after successful upload
        _("file"+doc).style.display='none';
        _("progressBar"+doc).style.display='none';
        // document.getElementById('registroDoc'+doc).disabled = true;
        // document.getElementById('registroDoc'+doc).setAttribute('style','color: #59c965');
        // document.getElementById('profile').setAttribute('src','assets/docs_expedientes/photos/photosarchivo_'+idUsr+'.*');
        // document.getElementById('btnModal'+doc).disabled = true;
        // $(".bloqueo"+doc).attr("disabled", true);
        buscarPhotoEmp(idUsr);
        buscarEmpleado();
    }
    
    function errorHandlerEmp(event) {
        _("status"+doc).innerHTML = "Fallo en la subida";
    }
    
    function abortHandlerEmp(event) {
        _("status"+doc).innerHTML = "Fallo en la subida";
    }
}

function buscarPhotoEmp(curp){
    $.ajax({
        type: "POST",
        url: 'query/buscarPhotoEmp.php',
        dataType:'json',
        data: {
            
            curp:curp
            
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            if (success == 1) {
                var ruta = jsonData.ruta;
                console.log(ruta);
                document.getElementById("crop-image").setAttribute('src','');
                document.getElementById("crop-image").setAttribute('src','assets/'+ruta);
            } else if (success == 0){
                document.getElementById("crop-image").setAttribute('src','');
                document.getElementById("crop-image").setAttribute('src','img/no_profile.png');
                console.log("Sin foto");
            }
        }
    });
}
