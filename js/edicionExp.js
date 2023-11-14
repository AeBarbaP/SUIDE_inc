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
            var curp   = jsonData.curp;
            var nombre = jsonData.nombre;
            var apellido_p = jsonData.apellido_p;
            var apellido_m = jsonData.apellido_m;
            var genero = jsonData.genero;
            var edad   = jsonData.edad;
            //var edo_civil  = jsonData.edo_civil;
            var f_nacimiento   = jsonData.f_nacimiento;
            var lugar_nacimiento   = jsonData.lugar_nacimiento;
            var domicilio  = jsonData.domicilio;
            var no_int = jsonData.no_int;
            var no_ext = jsonData.no_ext;
            var colonia= jsonData.colonia;
            var entre_vialidades   = jsonData.entre_vialidades;
            var desc_referencias   = jsonData.desc_referencias;
           // var tipoVialidad   = jsonData.tipoVialidad;
            var estado = jsonData.estado;
            var municipio  = jsonData.municipio;
            var localidad  = jsonData.localidad;
            var asentamiento   = jsonData.asentamiento;
            var cp = jsonData.cp;
            var telefono_part  = jsonData.telefono_part;
            var correo = jsonData.correo;
            var telefono_cel   = jsonData.telefono_cel;
            //var escolaridad= jsonData.escolaridad;
            var profesion  = jsonData.profesion;
            var rfc= jsonData.rfc;
            var estudia= jsonData.estudia;
            var estdia_donde   = jsonData.estdia_donde;
            var estudia_habilidad  = jsonData.estudia_habilidad;
            var trabaja= jsonData.trabaja;
            var trabaja_donde  = jsonData.trabaja_donde;
            var asoc_civ   = jsonData.asoc_civ;
            var asoc_cual  = jsonData.asoc_cual;
            var pensionado = jsonData.pensionado;
            var pensionado_donde   = jsonData.pensionado_donde;
            var pension_monto  = jsonData.pension_monto;
            var pension_temporalidad   = jsonData.pension_temporalidad;
            var sindicato  = jsonData.sindicato;
            var sindicato_cual = jsonData.sindicato_cual;
            var seguridad_social   = jsonData.seguridad_social;
            var seguridad_social_otro  = jsonData.seguridad_social_otro;
            var numSS  = jsonData.numSS;
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
            console.log(jsonData.desc_referencias);

            if (success = 1) {
                document.getElementById('curp').value = jsonData.curp;
                cortarRFC2(); 
                document.getElementById('nombre').value = jsonData.nombre; 
                document.getElementById('apellidoP').value = jsonData.apellido_p; 
                document.getElementById('apellidoM').value = jsonData.apellido_m; 
                //document.getElementById('genero').value = jsonData.genero; 
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
                document.getElementById('estadosList').value = jsonData.estado; // pregunta
                document.getElementById('municipiosList').value = jsonData.municipio; //
                document.getElementById('localidades').value = jsonData.localidad; //
                document.getElementById('asentamiento').value = jsonData.asentamiento; //
                document.getElementById('codigoPostal').value = jsonData.cp; 
                document.getElementById('telFijo').value = jsonData.telefono_part; 
                document.getElementById('correo').value = jsonData.correo; 
                document.getElementById('celular').value = jsonData.telefono_cel; 
                document.getElementById('escolaridad').value = jsonData.escolaridad; 
                document.getElementById('profesion').value = jsonData.profesion; 
                //document.getElementById('rfc').value = jsonData.rfc; 
                //document.getElementById('estudia').value = jsonData.estudia; //Si y No
                document.getElementById('lugarEstudia').value = jsonData.estudia_donde; 
                document.getElementById('habilidad').value = jsonData.estudia_habilidad; 
                //document.getElementById('trabaja').value = jsonData.trabaja; // Si y No
                document.getElementById('lugarTrabajo').value = jsonData.trabaja_donde; 
                //document.getElementById('asoc_civ').value = jsonData.asoc_civ; // Si y No
                document.getElementById('nombreAC').value = jsonData.asoc_cual; 
                //document.getElementById('pensionado').value = jsonData.pensionado;  // Si y No
                document.getElementById('instPension').value = jsonData.pensionado_donde; 
                document.getElementById('montoP').value = jsonData.pension_monto; 
                document.getElementById('periodo').value = jsonData.pension_temporalidad; 
                //document.getElementById('sindicato').value = jsonData.sindicato; // Si y no
                document.getElementById('nombreSindicato').value = jsonData.sindicato_cual; 
                document.getElementById('seguridadsocial').value = jsonData.seguridad_social; 
                document.getElementById('otroSS').value = jsonData.seguridad_social_otro; 
                document.getElementById('numss').value = jsonData.numSS; 
                //document.getElementById('file_photo').value = jsonData.photo; 
                document.getElementById('discapacidadList').value = jsonData.discapacidad; 
                document.getElementById('gradoDisc').value = jsonData.grado_discapacidad; 
                document.getElementById('tipoDisc').value = jsonData.tipo_discapacidad; 
                document.getElementById('descDisc').value = jsonData.descripcionDiscapacidad; 
                document.getElementById('causaDisc').value = jsonData.causa; 
                document.getElementById('especifiqueD').value = jsonData.causa_otro; 
                document.getElementById('temporalidad').value = jsonData.temporalidad; 
                document.getElementById('fuente').value = jsonData.valoracion; 
                document.getElementById('fechaValoracion').value = jsonData.fecha_valoracion; 
                document.getElementById('rehabilitacion').value = jsonData.rehabilitacion; 
                document.getElementById('rehabilitacion_donde').value = jsonData.rehabilitacion_donde; 
                document.getElementById('rehabilitacion_inicio').value = jsonData.rehabilitacion_inicio; 
                document.getElementById('rehabilitacion_duracion').value = jsonData.rehabilitacion_duracion; 
                document.getElementById('tipo_sangre').value = jsonData.tipo_sangre; 
                document.getElementById('cirugias').value = jsonData.cirugias; 
                document.getElementById('tipo_cirugias').value = jsonData.tipo_cirugias; 
                document.getElementById('protesis').value = jsonData.protesis; 
                document.getElementById('protesis_tipo').value = jsonData.protesis_tipo; 
                document.getElementById('alergias').value = jsonData.alergias; 
                document.getElementById('alergias_cual').value = jsonData.alergias_cual; 
                document.getElementById('enfermedades').value = jsonData.enfermedades; 
                document.getElementById('enfermedades_cual').value = jsonData.enfermedades_cual; 
                document.getElementById('medicamentos').value = jsonData.medicamentos; 
                document.getElementById('medicamentos_cual').value = jsonData.medicamentos_cual; 
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