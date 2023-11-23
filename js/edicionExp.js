function buscarExpediente12(x){
    var cadenaTexto = x;
    $.ajax({
        type:"POST",
        url:"query/extraccionDatos.php",
        data:{
            cadenaTexto:cadenaTexto
        },
        dataType:"JSON",
        success: function(response)
        {
            var jsonData = JSON.parse(JSON.stringify(response));
            var success = jsonData.success;

            if(success == 1){
                document.getElementById('nada').hidden = true;
                document.getElementById('positivo').hidden = false;
                document.getElementById('negativo').hidden = true;
                document.getElementById('numExp1').innerText = jsonData.numExpediente;
                document.getElementById('datosCompletos').value = jsonData.numExpediente;
                document.getElementById('datosCompletosCURP').value = jsonData.curp;
                document.getElementById('estadoConsulta').value = jsonData.estado;
                document.getElementById('municipioConsulta').value = jsonData.municipio;
                
                var municipioQuery = jsonData.estado;
                var discapacidadQuery = jsonData.tipoDiscapacidad;
                municipiosSelect(municipioQuery);
                discapacidadTab(discapacidadQuery);

                document.getElementById('discapacidadConsulta').value = jsonData.discapacidad;
                document.getElementById('tipoDiscapacidadConsulta').value = jsonData.tipoDiscapacidad;
                document.getElementById('nombreExp1').innerText = jsonData.nombre;
                document.getElementById('apellidoPExp1').innerText = jsonData.apellido_p;
                document.getElementById('apellidoMExp1').innerText = jsonData.apellido_m;
            }
            else if (success == 0){
                document.getElementById('nada').hidden = true;
                document.getElementById('positivo').hidden = true;
                document.getElementById('negativo').hidden = false;
                console.log('nada');
            }
        }
    });
}

function queryDatos(){
    var expediente = document.getElementById('datosCompletos').value;
    var curp2 = document.getElementById('datosCompletosCURP').value;

    $.ajax({
        type: "POST",
        url: 'query/datosCompletos.php',
        dataType:'JSON',
        data: {
            expediente:expediente,
            curp2:curp2
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            var genero = jsonData.genero;
            var estudia= jsonData.estudia;
            var trabaja= jsonData.trabaja;
            var asoc_civ   = jsonData.asoc_civ;
            var pensionado = jsonData.pensionado;
            var sindicato  = jsonData.sindicato;
            var photo  = jsonData.photo;
            var discapacidad   = jsonData.discapacidad;
            var grado_discapacidad = jsonData.grado_discapacidad;
            var tipo_discapacidad  = jsonData.tipo_discapacidad;
            var descripcionDiscapacidad= jsonData.descripcionDiscapacidad;
            var causa  = jsonData.causa;
            var causa_otro = jsonData.causa_otro;
            var temporalidad   = jsonData.temporalidad;
            var valoracion = jsonData.valoracion;
            var fecha_valoracion   = jsonData.fecha_valoracion;
            var rehabilitacion = jsonData.rehabilitacion;
            var rehabilitacion_donde   = jsonData.rehabilitacion_donde;
            var rehabilitacion_inicio  = jsonData.rehabilitacion_inicio;
            var rehabilitacion_duracion= jsonData.rehabilitacion_duracion;
            var tipo_sangre= jsonData.tipo_sangre;
            var cirugias   = jsonData.cirugias;
            var tipo_cirugias  = jsonData.tipo_cirugias;
            var protesis   = jsonData.protesis;
            var protesis_tipo  = jsonData.protesis_tipo;
            var alergias   = jsonData.alergias;
            var alergias_cual  = jsonData.alergias_cual;
            var enfermedades   = jsonData.enfermedades;
            var enfermedades_cual  = jsonData.enfermedades_cual;
            var medicamentos   = jsonData.medicamentos;
            var medicamentos_cual  = jsonData.medicamentos_cual;
            var vivienda   = jsonData.vivienda;
            var vivienda_renta = jsonData.vivienda_renta;
            var vivienda_pagando   = jsonData.vivienda_pagando;
            var vivienda_renta = jsonData.vivienda_renta;
            var monto_pagando  = jsonData.monto_pagando;
            var caracteristicas= jsonData.caracteristicas;
            var caracteristicas_otro   = jsonData.caracteristicas_otro;
            var num_habitaciones   = jsonData.num_habitaciones;
            var vivienda_cocia = jsonData.vivienda_cocia;
            var vivienda_sala  = jsonData.vivienda_sala;
            var vivienda_banio = jsonData.vivienda_banio;
            var vivienda_otros = jsonData.vivienda_otros;
            var techo  = jsonData.techo;
            var techo_otros= jsonData.techo_otros;
            var pared  = jsonData.pared;
            var pared_otro = jsonData.pared_otro;
            var serv_basicos_agua  = jsonData.serv_basicos_agua;
            var serv_basicos_luz   = jsonData.serv_basicos_luz;
            var serv_basicos_drenaje   = jsonData.serv_basicos_drenaje;
            var serv_basicos_cable = jsonData.serv_basicos_cable;
            var serv_basicos_internet  = jsonData.serv_basicos_internet;
            var serv_basicos_celular   = jsonData.serv_basicos_celular;
            var serv_basicos_carro = jsonData.serv_basicos_carro;
            var serv_basicos_gas   = jsonData.serv_basicos_gas;
            var serv_basicos_telefono  = jsonData.serv_basicos_telefono;
            var serv_basicos_otro  = jsonData.serv_basicos_otro;
            var electrodomesticos_tv   = jsonData.electrodomesticos_tv;
            var electrodomesticos_lavadora = jsonData.electrodomesticos_lavadora;
            var electrodomesticos_estereo  = jsonData.electrodomesticos_estereo;
            var electrodomesticos_microondas   = jsonData.electrodomesticos_microondas;
            var electrodomesticos_computadora  = jsonData.electrodomesticos_computadora;
            var electrodomesticos_licuadora= jsonData.electrodomesticos_licuadora;
            var electrodomesticos_dvd  = jsonData.electrodomesticos_dvd;
            var electrodomesticos_estufa   = jsonData.electrodomesticos_estufa;
            var electrodomesticos_otro = jsonData.electrodomesticos_otro;
            var personas_dependen  = jsonData.personas_dependen;
            var deudas = jsonData.deudas;
            var deudas_cuanto  = jsonData.deudas_cuanto;
            var municipio  = jsonData.municipio;
           /*  municipiosSelect(jsonData.estado); */
            console.log(jsonData.municipio);
            document.getElementById('editarBeneficiario').hidden = true;
            document.getElementById('cancelarEditar').hidden = false;
            

            if (success = 1) {
                document.getElementById('curp').value = jsonData.curp;
                document.getElementById('curp_exp').value = jsonData.curp;
                cortarRFC2(); 
                var numExpediente2 = jsonData.numExpediente;
                var expediente = numExpediente2.substr(0,7);
                var expedienteNum = numExpediente2.substr(7,5);
                document.getElementById('numeroTemporal').value = expedienteNum;
                document.getElementById('numeroTemporal2').value = expediente;
                document.getElementById('numeroExpediente').innerHTML = numExpediente2;
                document.getElementById('nombre').value = jsonData.nombre; 
                document.getElementById('apellidoP').value = jsonData.apellido_p; 
                document.getElementById('apellidoM').value = jsonData.apellido_m; 
                showMeFam();
                showMeRef();
                mostrarTablaServicios();
                mostrarTabla();
                if (genero == 'FEMENINO' || genero == 'Femenino'){
                    document.getElementById('generoF').checked = true;
                } 
                else if (genero == 'MASCULINO' || genero == 'Masculino') {
                    document.getElementById('generoM').checked = true;
                }
                else if (genero == 'OTRO' || genero == 'Otro') {
                    document.getElementById('generoO').checked = true;
                }

                document.getElementById('edad').value = jsonData.edad; 
                document.getElementById('fechaNacimiento').value = jsonData.f_nacimiento; 
                document.getElementById('lugarNacimiento').value = jsonData.lugar_nacimiento; 
                document.getElementById('edoCivil').value = jsonData.edo_civil; 
                document.getElementById('domicilio').value = jsonData.domicilio; 
                document.getElementById('numExt').value = jsonData.no_int; 
                document.getElementById('numInt').value = jsonData.no_ext; 
                document.getElementById('colonia').value = jsonData.colonia; 
                document.getElementById('entreVialidades').value = jsonData.entre_vialidades; 
                document.getElementById('descripcionLugar').value = jsonData.desc_referencias; 
                document.getElementById('tipoVialidad').value = jsonData.tipoVialidad; 
                
                document.getElementById('estadosList').value = jsonData.estado; 
                
                //municipiosSelect(jsonData.estado);

                document.getElementById('municipiosList').value = municipio; 

                document.getElementById('localidades').value = jsonData.localidad; 
                document.getElementById('asentamiento').value = jsonData.asentamiento; 
                document.getElementById('codigoPostal').value = jsonData.cp; 
                document.getElementById('telFijo').value = jsonData.telefono_part; 
                document.getElementById('correo').value = jsonData.correo; 
                document.getElementById('celular').value = jsonData.telefono_cel; 
                document.getElementById('escolaridad').value = jsonData.escolaridad; 
                document.getElementById('profesion').value = jsonData.profesion; 
                
                var rfcCut = jsonData.rfc;
                //document.getElementById('rfcHomo').value = rfcCut;

                if (rfcCut.length > 10) {
                    var rfcCutted = rfcCut.slice(-3);
                    document.getElementById('rfcHomo').value = rfcCutted;
                }
                else {
                    document.getElementById('rfcHomo').value = "";
                }
                
                if (estudia == 'SI' || estudia == '2'){
                    document.getElementById('estudiaSi').checked = true;
                    document.getElementById('lugarEstudia').disabled = false; 
                    document.getElementById('lugarEstudia').value = jsonData.estudia_donde; 
                } 
                else if (estudia == 'NO' || estudia == '3') {
                    document.getElementById('estudiaNo').checked = true;
                }

                document.getElementById('habilidad').value = jsonData.estudia_habilidad; 

                if (trabaja == 'SI' || trabaja == '1'){
                    document.getElementById('trabajaSi').checked = true;
                    document.getElementById('lugarTrabajo').disabled = false; 
                    document.getElementById('ingresoMensual').disabled = false; 
                    document.getElementById('lugarTrabajo').value = jsonData.trabaja_donde; 
                } 
                else if (trabaja == 'NO' || trabaja == '0') {
                    document.getElementById('trabajaNo').checked = true;
                }

                if (asoc_civ == 'SI' || asoc_civ == '1'){
                    document.getElementById('asociacionSi').checked = true;
                    document.getElementById('nombreAC').disabled = false;  
                    document.getElementById('nombreAC').value = jsonData.asoc_cual; 
                } 
                else if (asoc_civ == 'NO' || asoc_civ == '0') {
                    document.getElementById('asociacionNo').checked = true;
                }

                if (pensionado == 'SI' || pensionado == '1'){
                    document.getElementById('pensionSi').checked = true;
                    document.getElementById('instPension').disabled = false;  
                    document.getElementById('montoP').disabled = false;  
                    document.getElementById('periodo').disabled = false;  
                    document.getElementById('instPension').value = jsonData.pensionado_donde; 
                    document.getElementById('montoP').value = jsonData.pension_monto; 
                    document.getElementById('periodo').value = jsonData.pension_temporalidad; 
                } 
                else if (pensionado == 'NO' || pensionado == '0') {
                    document.getElementById('pensionNo').checked = true;
                }

                if (sindicato == 'SI' || sindicato == '1'){
                    document.getElementById('sindicatoSi').checked = true;
                    document.getElementById('nombreSindicato').disabled = false;  
                    document.getElementById('nombreSindicato').value = jsonData.asoc_cual; 
                } 
                else if (sindicato == 'NO' || sindicato == '2' || sindicato == "" || sindicato == null) {
                    document.getElementById('sindicatoNo').checked = true;
                }

                document.getElementById('seguridadsocial').value = jsonData.seguridad_social; 
                document.getElementById('otroSS').value = jsonData.seguridad_social_otro; 
                document.getElementById('numss').value = jsonData.numSS; 
                //document.getElementById('file_photo').value = jsonData.photo; 
                
                //datos médicos
                document.getElementById('discapacidadList').value = jsonData.discapacidad; 
                document.getElementById('gradoDisc').value = jsonData.grado_discapacidad; 
                document.getElementById('tipoDisc').value = jsonData.tipo_discapacidad; 
                document.getElementById('descDisc').value = jsonData.descripcionDiscapacidad; 
                var causaDiscapacidadVar = jsonData.causa;
                if (causaDiscapacidadVar == "CONGÉNITA" || causaDiscapacidadVar == "Congénita" || causaDiscapacidadVar == 1){
                    var causaDiscapacidad = 1;
                }
                else if (causaDiscapacidadVar == "ADQUIRIDA" || causaDiscapacidadVar == "Adquirida" || causaDiscapacidadVar == 2){
                    var causaDiscapacidad = 2;
                }
                else if (causaDiscapacidadVar == "ACCIDENTE" || causaDiscapacidadVar == "Accidente" || causaDiscapacidadVar == 3){
                    var causaDiscapacidad = 3;
                }
                else if (causaDiscapacidadVar == "ENFERMEDAD" || causaDiscapacidadVar == "Enfermedad" || causaDiscapacidadVar == 4){
                    var causaDiscapacidad = 4;
                }
                else if (causaDiscapacidadVar == "NACIMIENTO" || causaDiscapacidadVar == "Nacimiento" || causaDiscapacidadVar == 5){
                    var causaDiscapacidad = 5;
                }
                else if (causaDiscapacidadVar == "ADICCIÓN" || causaDiscapacidadVar == "Adicción" || causaDiscapacidadVar == 6){
                    var causaDiscapacidad = 6;
                }
                else if (causaDiscapacidadVar == "OTRA" || causaDiscapacidadVar == "Otra" || causaDiscapacidadVar == 7){
                    var causaDiscapacidad = 7;
                }
                document.getElementById('causaDisc').value = causaDiscapacidad;
                document.getElementById('especifiqueD').value = jsonData.causa_otro; 
                document.getElementById('temporalidad').value = jsonData.temporalidad; 
                document.getElementById('fuente').value = jsonData.valoracion; 
                
                var fechaValVar = jsonData.fecha_valoracion;
                if (fechaValVar != "" || fechaValVar != null){
                    document.getElementById('fechaValoracion').value = fechaValVar; 
                }
                else {
                    document.getElementById('fechaValoracion').value = ""; 
                }
                
                var rehabVar = jsonData.rehabilitacion;
                if (rehabVar == 2 || rehabVar == null || rehabVar == ""){
                    document.getElementById('rehabilitacionNo').checked = true;
                }
                else {
                    document.getElementById('rehabilitacionSi').checked = true;
                    document.getElementById('lugarRehab').disabled = false; 
                    document.getElementById('lugarRehab').value = jsonData.rehabilitacion_donde; 
                    document.getElementById('fechaIni').disabled = false; 
                    document.getElementById('fechaIni').value = jsonData.rehabilitacion_inicio; 
                    document.getElementById('duracion').disabled = false; 
                    document.getElementById('duracion').value = jsonData.rehabilitacion_duracion; 
                }

                document.getElementById('tipoSangre').value = jsonData.tipo_sangre; 
                
                if (cirugias == "" || cirugias == null || cirugias == 2 || cirugias == 'NO'){
                    document.getElementById('cirugia').value = 2;
                }
                else {
                    document.getElementById('cirugia').value = 1;
                    document.getElementById('tipoCirugia').value = jsonData.tipo_cirugias; 
                    document.getElementById('tipoCirugia').disabled = false; 
                }
            
                if (protesis == "" || protesis == null || protesis == 2 || protesis == 'NO'){
                    document.getElementById('protesis').value = 2; 
                }
                else {
                    document.getElementById('protesis').value = 1; 
                    document.getElementById('tipoProtesis').value = jsonData.protesis_tipo; 
                    document.getElementById('tipoProtesis').disabled = false; 
                }
                
                if (alergias_cual != null || alergias_cual != ""){
                    var alergiasSplit = alergias_cual.replace(/, /g,',');
                    alergiasSplit = alergiasSplit.split(',');
                    for (var i = 0; i < alergiasSplit.length; i++) {
                        console.log(alergiasSplit[i]);
                        addA2(alergiasSplit[i]);
                    }
                }
                
                if (enfermedades_cual != null || enfermedades_cual != ""){
                    var enfermedadesSplit = enfermedades_cual.replace(/, /g,',');
                    enfermedadesSplit = enfermedadesSplit.split(',');
                    for (var i = 0; i < enfermedadesSplit.length; i++) {
                        console.log(enfermedadesSplit[i]);
                        addB2(enfermedadesSplit[i]);
                    }
                }
                
                if (medicamentos_cual != null || medicamentos_cual != ""){
                    var medicamentosSplit = medicamentos_cual.replace(/, /g,',');
                    medicamentosSplit = medicamentosSplit.split(',');
                    for (var i = 0; i < medicamentosSplit.length; i++) {
                        console.log(medicamentosSplit[i]);
                        addC2(medicamentosSplit[i]);
                    }
                }
                
                document.getElementById('vivienda').value = jsonData.vivienda; 
                document.getElementById('vivienda_renta').value = jsonData.vivienda_renta; 
                document.getElementById('vivienda_pagando').value = jsonData.vivienda_pagando; 
                document.getElementById('vivienda_renta').value = jsonData.vivienda_renta; 
                document.getElementById('monto_pagando').value = jsonData.monto_pagando; 
                document.getElementById('caracteristicas').value = jsonData.caracteristicas; 
                document.getElementById('caracteristicas_otro').value = jsonData.caracteristicas_otro; 
                document.getElementById('num_habitaciones').value = jsonData.num_habitaciones; 
                document.getElementById('vivienda_cocia').value = jsonData.vivienda_cocia; 
                document.getElementById('vivienda_sala').value = jsonData.vivienda_sala; 
                document.getElementById('vivienda_banio').value = jsonData.vivienda_banio; 
                document.getElementById('vivienda_otros').value = jsonData.vivienda_otros; 
                document.getElementById('techo').value = jsonData.techo; 
                document.getElementById('techo_otros').value = jsonData.techo_otros; 
                document.getElementById('pared').value = jsonData.pared; 
                document.getElementById('pared_otro').value = jsonData.pared_otro; 
                document.getElementById('serv_basicos_agua').value = jsonData.serv_basicos_agua; 
                document.getElementById('serv_basicos_luz').value = jsonData.serv_basicos_luz; 
                document.getElementById('serv_basicos_drenaje').value = jsonData.serv_basicos_drenaje; 
                document.getElementById('serv_basicos_cable').value = jsonData.serv_basicos_cable; 
                document.getElementById('serv_basicos_internet').value = jsonData.serv_basicos_internet; 
                document.getElementById('serv_basicos_celular').value = jsonData.serv_basicos_celular; 
                document.getElementById('serv_basicos_carro').value = jsonData.serv_basicos_carro; 
                document.getElementById('serv_basicos_gas').value = jsonData.serv_basicos_gas; 
                document.getElementById('serv_basicos_telefono').value = jsonData.serv_basicos_telefono; 
                document.getElementById('serv_basicos_otro').value = jsonData.serv_basicos_otro; 
                document.getElementById('electrodomesticos_tv').value = jsonData.electrodomesticos_tv; 
                document.getElementById('electrodomesticos_lavadora').value = jsonData.electrodomesticos_lavadora; 
                document.getElementById('electrodomesticos_estereo').value = jsonData.electrodomesticos_estereo; 
                document.getElementById('electrodomesticos_microondas').value = jsonData.electrodomesticos_microondas; 
                document.getElementById('electrodomesticos_computadora').value = jsonData.electrodomesticos_computadora; 
                document.getElementById('electrodomesticos_licuadora').value = jsonData.electrodomesticos_licuadora; 
                document.getElementById('electrodomesticos_dvd').value = jsonData.electrodomesticos_dvd; 
                document.getElementById('electrodomesticos_estufa').value = jsonData.electrodomesticos_estufa; 
                document.getElementById('electrodomesticos_otro').value = jsonData.electrodomesticos_otro; 
                document.getElementById('personas_dependen').value = jsonData.personas_dependen; 
                document.getElementById('deudas').value = jsonData.deudas; 
                document.getElementById('deudas_cuanto').value = jsonData.deudas_cuanto; 
                
            } else if (success == 0){
                console.log(jsonData.error);
            }
        }
    });
}

function addA2(val) {
    var p2;
    var numeroA = ""; //remover al momento de programar guardar
    var textarea = document.getElementById("alergiasFull");
    if (val==null || val =="" || val == 0){
        console.log('sin valor');
    } else{
        textarea.innerHTML += '<button class="badge btn btn-sm rounded-pill text-bg-secondary" id="'+val+'"><span id="'+val+'" class="valorFull">'+val+'</span> <a href="#" class="text-light"><i class="bi bi-x-circle"></i></a></button> ';
        document.getElementById(val).setAttribute('onclick',"removeA2('"+val+"')");
        document.getElementById(val).setAttribute('name',"'"+val+"'");
      //document.querySelector('#tipoAlergia option[value='+val+']').remove();
        
      //remover al momento de programar guardar
        const paragraphs = document.querySelectorAll('[class="valorFull"]');
        paragraphs.forEach(p => numeroA = numeroA + p.id +', ');
        numeroA = numeroA.substr(0, numeroA.length - 2);
        console.log(numeroA);
        document.getElementById('numeroA').value = numeroA;
    }
}

function removeA2(val) {
    var numeroA = ""; //remover al momento de programar guardar
    console.log(val);
    var nameInput = document.getElementById(val).getAttribute("name");
    if (nameInput){
        document.getElementById(val).remove();
      //$('#tipoAlergia').append("<option value='"+val+"'>"+val+"</option>");
    }
    else{
        console.log("Nada");
        document.getElementById(val).remove();

    }
    //remover al momento de programar guardar
    const paragraphs = document.querySelectorAll('[class="valorFull"]');
    paragraphs.forEach(p => numeroA = numeroA + p.id +', ');
    numeroA = numeroA.slice(0, numeroA.length - 2);
    console.log(numeroA);
    document.getElementById('numeroA').value = numeroA;
}

function addB2(val) {
    var p2;
    var numeroB = ""; //remover al momento de programar guardar
    var textarea = document.getElementById("enfermedadesFull");
    if (val==null || val =="" || val == 0){
        console.log('sin valor');
    } else {
        textarea.innerHTML += '<button class="badge btn btn-sm rounded-pill text-bg-secondary" id="'+val+'"><span id="'+val+'" class="valorEFull">'+val+' </span><a href="#" class="text-light"><i class="bi bi-x-circle"></i></a></button> ';
        document.getElementById(val).setAttribute('onclick',"removeB2('"+val+"')");
        document.getElementById(val).setAttribute('name',"'"+val+"'");
        //document.querySelector('#enfermedades option[value='+val+']').remove();
    }
    //remover al momento de programar guardar
    const paragraphs = document.querySelectorAll('[class="valorEFull"]');
    paragraphs.forEach(p => numeroB = numeroB + p.id +', ');
    numeroB = numeroB.slice(0, numeroB.length - 2);
    console.log(numeroB);
    document.getElementById('numeroB').value = numeroB;
}

function removeB2(val) {
    var numeroB = ""; //remover al momento de programar guardar
    console.log(val);
    var nameInput = document.getElementById(val).getAttribute("name");
    if (nameInput){
        document.getElementById(val).remove();
        //$('#enfermedades').append("<option value='"+val+"'>"+val+"</option>");
    }
    else{
        console.log("Nada");
        document.getElementById(val).remove();

    }
    //remover al momento de programar guardar
    const paragraphs = document.querySelectorAll('[class="valorEFull"]');
    paragraphs.forEach(p => numeroB = numeroB + p.id +', ');
    numeroB = numeroB.slice(0, numeroB.length - 2);
    console.log(numeroB);
    document.getElementById('numeroB').value = numeroB;
}

function addC2(val) {
    var p2;
    var numeroC = ""; //remover al momento de programar guardar
    var textarea = document.getElementById("medicamentosFull");
    if (val==null || val =="" || val == 0){
        console.log('sin valor');
    } else{
        textarea.innerHTML += '<button class="badge btn btn-sm rounded-pill text-bg-secondary" id="'+val+'"><span id="'+val+'" class="valorMFull">'+val+' </span><a href="#" class="text-light"><i class="bi bi-x-circle"></i></a></button> ';
        document.getElementById(val).setAttribute('onclick',"removeC2('"+val+"')");
        //document.querySelector('#medicamentos option[value='+val+']').remove();
    }
    //remover al momento de programar guardar
    const paragraphs = document.querySelectorAll('[class="valorMFull"]');
    paragraphs.forEach(p2 => numeroC = numeroC + p2.id +', ');
    numeroC = numeroC.slice(0, numeroC.length - 2);
    console.log(numeroC);
    document.getElementById('numeroC').value = numeroC;
}

function removeC2(val) {
    var numeroC = ""; //remover al momento de programar guardar
    console.log(val);
    var nameInput = document.getElementById(val).getAttribute("name");
    if (nameInput){
        document.getElementById(val).remove();
        //$('#medicamentos').append("<option value='"+val+"'>"+val+"</option>");
    }
    else{
        console.log("Nada");
        document.getElementById(val).remove();
    }
    //remover al momento de programar guardar
    const paragraphs = document.querySelectorAll('[class="valorMFull"]');
    paragraphs.forEach(p => numeroC = numeroC + p.id +', ');
    numeroC = numeroC.slice(0, numeroC.length - 2);
    console.log(numeroC);
    /* document.getElementById('numeroC').value = numeroC; */
}