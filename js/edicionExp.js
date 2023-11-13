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
    var curp = document.getElementById('datosCompletosCURP').value;

    $.ajax({
        type: "POST",
        url: 'query/datosCompletos.php',
        dataType:'JSON',
        data: {
            expediente:expediente,
            curp:curp
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
            var edo_civil  = jsonData.edo_civil;
            var f_nacimiento   = jsonData.f_nacimiento;
            var lugar_nacimiento   = jsonData.lugar_nacimiento;
            var domicilio  = jsonData.domicilio;
            var no_int = jsonData.no_int;
            var no_ext = jsonData.no_ext;
            var colonia= jsonData.colonia;
            var entra_vialidades   = jsonData.entra_vialidades;
            var desc_referencias   = jsonData.desc_referencias;
            var tipoVialidad   = jsonData.tipoVialidad;
            var estado = jsonData.estado;
            var municipio  = jsonData.municipio;
            var localidad  = jsonData.localidad;
            var asentamiento   = jsonData.asentamiento;
            var cp = jsonData.cp;
            var telefono_part  = jsonData.telefono_part;
            var correo = jsonData.correo;
            var telefono_cel   = jsonData.telefono_cel;
            var escolaridad= jsonData.escolaridad;
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
            
            if (success == 1) {
                jsonData.success
                document.getelementById('curp')= jsonData.curp; 
                document.getelementById('nombre')= jsonData.nombre; 
                document.getelementById('apellido_p')= jsonData.apellido_p; 
                document.getelementById('apellido_m')= jsonData.apellido_m; 
                document.getelementById('genero')= jsonData.genero; 
                document.getelementById('edad')= jsonData.edad; 
                document.getelementById('edo_civil')= jsonData.edo_civil; 
                document.getelementById('f_nacimiento')= jsonData.f_nacimiento; 
                document.getelementById('lugar_nacimiento')= jsonData.lugar_nacimiento; 
                document.getelementById('domicilio')= jsonData.domicilio; 
                document.getelementById('no_int')= jsonData.no_int; 
                document.getelementById('no_ext')= jsonData.no_ext; 
                document.getelementById('colonia')= jsonData.colonia; 
                document.getelementById('entra_vialidades')= jsonData.entra_vialidades; 
                document.getelementById('desc_referencias')= jsonData.desc_referencias; 
                document.getelementById('tipoVialidad')= jsonData.tipoVialidad; 
                document.getelementById('estado')= jsonData.estado; 
                document.getelementById('municipio')= jsonData.municipio; 
                document.getelementById('localidad')= jsonData.localidad; 
                document.getelementById('asentamiento')= jsonData.asentamiento; 
                document.getelementById('cp')= jsonData.cp; 
                document.getelementById('telefono_part')= jsonData.telefono_part; 
                document.getelementById('correo')= jsonData.correo; 
                document.getelementById('telefono_cel')= jsonData.telefono_cel; 
                document.getelementById('escolaridad')= jsonData.escolaridad; 
                document.getelementById('profesion')= jsonData.profesion; 
                document.getelementById('rfc')= jsonData.rfc; 
                document.getelementById('estudia')= jsonData.estudia; 
                document.getelementById('estdia_donde')= jsonData.estdia_donde; 
                document.getelementById('estudia_habilidad')= jsonData.estudia_habilidad; 
                document.getelementById('trabaja')= jsonData.trabaja; 
                document.getelementById('trabaja_donde')= jsonData.trabaja_donde; 
                document.getelementById('asoc_civ')= jsonData.asoc_civ; 
                document.getelementById('asoc_cual')= jsonData.asoc_cual; 
                document.getelementById('pensionado')= jsonData.pensionado; 
                document.getelementById('pensionado_donde')= jsonData.pensionado_donde; 
                document.getelementById('pension_monto')= jsonData.pension_monto; 
                document.getelementById('pension_temporalidad')= jsonData.pension_temporalidad; 
                document.getelementById('sindicato')= jsonData.sindicato; 
                document.getelementById('sindicato_cual')= jsonData.sindicato_cual; 
                document.getelementById('seguridad_social')= jsonData.seguridad_social; 
                document.getelementById('seguridad_social_otro')= jsonData.seguridad_social_otro; 
                document.getelementById('numSS')= jsonData.numSS; 
                document.getelementById('photo')= jsonData.photo; 
                document.getelementById('discapacidad')= jsonData.discapacidad; 
                document.getelementById('grado_discapacidad')= jsonData.grado_discapacidad; 
                document.getelementById('tipo_discapacidad')= jsonData.tipo_discapacidad; 
                document.getelementById('descripcionDiscapacidad')= jsonData.descripcionDiscapacidad; 
                document.getelementById('causa')= jsonData.causa; 
                document.getelementById('causa_otro')= jsonData.causa_otro; 
                document.getelementById('temporalidad')= jsonData.temporalidad; 
                document.getelementById('valoracion')= jsonData.valoracion; 
                document.getelementById('fecha_valoracion')= jsonData.fecha_valoracion; 
                document.getelementById('rehabilitacion')= jsonData.rehabilitacion; 
                document.getelementById('rehabilitacion_donde')= jsonData.rehabilitacion_donde; 
                document.getelementById('rehabilitacion_inicio')= jsonData.rehabilitacion_inicio; 
                document.getelementById('rehabilitacion_duracion')= jsonData.rehabilitacion_duracion; 
                document.getelementById('tipo_sangre')= jsonData.tipo_sangre; 
                document.getelementById('cirugias')= jsonData.cirugias; 
                document.getelementById('tipo_cirugias')= jsonData.tipo_cirugias; 
                document.getelementById('protesis')= jsonData.protesis; 
                document.getelementById('protesis_tipo')= jsonData.protesis_tipo; 
                document.getelementById('alergias')= jsonData.alergias; 
                document.getelementById('alergias_cual')= jsonData.alergias_cual; 
                document.getelementById('enfermedades')= jsonData.enfermedades; 
                document.getelementById('enfermedades_cual')= jsonData.enfermedades_cual; 
                document.getelementById('medicamentos')= jsonData.medicamentos; 
                document.getelementById('medicamentos_cual')= jsonData.medicamentos_cual; 
                document.getelementById('vivienda')= jsonData.vivienda; 
                document.getelementById('vivienda_renta')= jsonData.vivienda_renta; 
                document.getelementById('vivienda_pagando')= jsonData.vivienda_pagando; 
                document.getelementById('vivienda_renta')= jsonData.vivienda_renta; 
                document.getelementById('monto_pagando')= jsonData.monto_pagando; 
                document.getelementById('caracteristicas')= jsonData.caracteristicas; 
                document.getelementById('caracteristicas_otro')= jsonData.caracteristicas_otro; 
                document.getelementById('num_habitaciones')= jsonData.num_habitaciones; 
                document.getelementById('vivienda_cocia')= jsonData.vivienda_cocia; 
                document.getelementById('vivienda_sala')= jsonData.vivienda_sala; 
                document.getelementById('vivienda_banio')= jsonData.vivienda_banio; 
                document.getelementById('vivienda_otros')= jsonData.vivienda_otros; 
                document.getelementById('techo')= jsonData.techo; 
                document.getelementById('techo_otros')= jsonData.techo_otros; 
                document.getelementById('pared')= jsonData.pared; 
                document.getelementById('pared_otro')= jsonData.pared_otro; 
                document.getelementById('serv_basicos_agua')= jsonData.serv_basicos_agua; 
                document.getelementById('serv_basicos_luz')= jsonData.serv_basicos_luz; 
                document.getelementById('serv_basicos_drenaje')= jsonData.serv_basicos_drenaje; 
                document.getelementById('serv_basicos_cable')= jsonData.serv_basicos_cable; 
                document.getelementById('serv_basicos_internet')= jsonData.serv_basicos_internet; 
                document.getelementById('serv_basicos_celular')= jsonData.serv_basicos_celular; 
                document.getelementById('serv_basicos_carro')= jsonData.serv_basicos_carro; 
                document.getelementById('serv_basicos_gas')= jsonData.serv_basicos_gas; 
                document.getelementById('serv_basicos_telefono')= jsonData.serv_basicos_telefono; 
                document.getelementById('serv_basicos_otro')= jsonData.serv_basicos_otro; 
                document.getelementById('electrodomesticos_tv')= jsonData.electrodomesticos_tv; 
                document.getelementById('electrodomesticos_lavadora')= jsonData.electrodomesticos_lavadora; 
                document.getelementById('electrodomesticos_estereo')= jsonData.electrodomesticos_estereo; 
                document.getelementById('electrodomesticos_microondas')= jsonData.electrodomesticos_microondas; 
                document.getelementById('electrodomesticos_computadora')= jsonData.electrodomesticos_computadora; 
                document.getelementById('electrodomesticos_licuadora')= jsonData.electrodomesticos_licuadora; 
                document.getelementById('electrodomesticos_dvd')= jsonData.electrodomesticos_dvd; 
                document.getelementById('electrodomesticos_estufa')= jsonData.electrodomesticos_estufa; 
                document.getelementById('electrodomesticos_otro')= jsonData.electrodomesticos_otro; 
                document.getelementById('personas_dependen')= jsonData.personas_dependen; 
                document.getelementById('deudas')= jsonData.deudas; 
                document.getelementById('deudas_cuanto')= jsonData.deudas_cuanto; 
                
            } else if (success == 0){
                console.log(jsonData.error);
            }
        }
    });

}