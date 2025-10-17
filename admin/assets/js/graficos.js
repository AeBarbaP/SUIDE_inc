let myChart2 = null;
function conteoGeneral() {
    const fechaActual = new Date();

    // Obtener el año completo (ej. 2023)
    const añoCompleto = fechaActual.getFullYear();

    $.ajax({
        type: "POST",
        url: "query/query_meses_annio.php",
        dataType: "json",
        cache: false,
        success: function(response) {
            var jsonData = JSON.parse(JSON.stringify(response));
            console.log('Respuesta JSON:', jsonData);
            var filas = 0;
            var filasExp = 0;
            var filasTar = 0;
            var filasAct = 0;
            document.getElementById('anioEjercicio').innerText = añoCompleto;

            if (Array.isArray(jsonData)) {
                console.log('Número de elementos en el array:', jsonData.length);
                var datosTabla = Array(12).fill(0).map(() => ({ credencial: 0, tarjeton: 0, expediente: 0, expedienteAct: 0 }));

                // Iterar sobre cada elemento en el array
                for (var i = 0; i < jsonData.length; i++) {
                    var datosGenerales = jsonData[i];
                    var mes = datosGenerales.mes - 1; // Convertir el mes a un índice de 0 a 11
                    var credencial = datosGenerales.credencial;
                    var tarjeton = datosGenerales.tarjeton;
                    var expediente = datosGenerales.expediente;
                    var expedienteAct = datosGenerales.expedienteAct;

                    // Agregar los datos al arreglo multidimensional
                    datosTabla[mes] = { credencial, tarjeton, expediente, expedienteAct };
                }

                // Crear un arreglo para los datos del gráfico
                var credencialData = datosTabla.map(d => d.credencial);
                var tarjetonData = datosTabla.map(d => d.tarjeton);
                var expedienteData = datosTabla.map(d => d.expediente);
                var expedienteActData = datosTabla.map(d => d.expedienteAct);

                // Crear el gráfico
                const ctx = document.getElementById('myChart').getContext('2d');
                let delayed;
                myChart2 = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [
                            'Ene', 'Feb', 'Mzo', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic',
                        ],
                        datasets: [
                            {
                                label: 'Credenciales',
                                data: credencialData,
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1,
                                pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                                borderRadius: 40,
                                borderSkipped: false,
                                responsive: true,
                                maintainAspectRatio: false,
                            },
                            {
                                label: 'Tarjetones',
                                data: tarjetonData,
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1,
                                pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                                borderRadius: 40,
                                borderSkipped: false,
                                responsive: true,
                                maintainAspectRatio: false,
                            },
                            {
                                label: 'Expedientes',
                                data: expedienteData,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1,
                                pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                                borderRadius: 40,
                                borderSkipped: false,
                                responsive: true,
                                maintainAspectRatio: false,
                            },
                            {
                                label: 'Actualizados',
                                data: expedienteActData,
                                backgroundColor: 'rgba(80, 197, 121, 0.2)',
                                borderColor: 'rgba(80, 197, 121, 1)',
                                borderWidth: 1,
                                pointBackgroundColor: 'rgba(80, 197, 121, 1)',
                                borderRadius: 40,
                                borderSkipped: false,
                                responsive: true,
                                maintainAspectRatio: false,
                            }
                        ],
                    },
                    options: {
                        plugins: {
                            legend: {
                                display: true,
                            },
                            tooltip: {
                                boxPadding: 3,
                            },
                        },
                        animation: {
                            onComplete: () => {
                                delayed = true;
                            },
                            delay: (context) => {
                                let delay = 0;
                                if (context.type === 'data' && context.mode === 'default' && !delayed) {
                                    delay = context.dataIndex * 300 + context.datasetIndex * 100;
                                }
                                return delay;
                                },
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                            },
                        },
                    },
                });
            }
        },
        error: function(error) {
            console.error('Error en la petición AJAX:', error);
        }
    });
}

let myChart = null;

function conteoUsuarios() {
    var mes = document.getElementById('actividadUsuarios').value;

    $.ajax({
        type: "POST",
        url: "query/query_actividadUsers.php",
        data:{
            mes:mes
        },
        dataType: "json",
        cache: false,
        success: function(response) {
            var jsonData = JSON.parse(JSON.stringify(response));
            console.log('Respuesta JSON:', jsonData);
            var filas = 0;
            var filasExp = 0;
            var filasTar = 0;
            var filasAct = 0;

            if (Array.isArray(jsonData)) {
                console.log('Número de elementos en el array:', jsonData.length);
                var x = jsonData.length;
                var datosTabla = Array(x).fill(0).map(() => ({ credencial: 0, tarjeton: 0, expediente: 0 , usuario: 0, expedienteUpdate: 0}));

                // Iterar sobre cada elemento en el array
                for (var i = 0; i < jsonData.length; i++) {
                    var datosGenerales = jsonData[i];
                    var credencial = datosGenerales.credencial;
                    var tarjeton = datosGenerales.tarjeton;
                    var usuario = datosGenerales.usuario;
                    var expediente = datosGenerales.expediente;
                    var expedienteUpdate = datosGenerales.expedienteUpdate;

                    // Agregar los datos al arreglo multidimensional
                    datosTabla[i] = { credencial, tarjeton, expediente , expedienteUpdate, usuario};
                }
                // Crear un arreglo para los datos del gráfico
                var credencialData = datosTabla.map(d => d.credencial);
                var tarjetonData = datosTabla.map(d => d.tarjeton);
                var usuarioData = datosTabla.map(d => d.usuario);
                var expedienteData = datosTabla.map(d => d.expediente);
                var expedienteUpdateData = datosTabla.map(d => d.expedienteUpdate);

                let delayed;
                // Graphs
                
                if (myChart) {
                    myChart.destroy();
                }
                // Crear el gráfico
                const ctx = document.getElementById('myChartUsers').getContext('2d');
                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: 
                            usuarioData
                        ,
                        datasets: [
                            {
                                label: 'Credencial',
                                data: credencialData,
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1,
                                pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                                borderRadius: 40,
                                borderSkipped: false,
                                responsive: true,
                                maintainAspectRatio: false,
                            },
                            {
                                label: 'Tarjeton',
                                data: tarjetonData,
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1,
                                pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                                borderRadius: 40,
                                borderSkipped: false,
                                responsive: true,
                                maintainAspectRatio: false,
                            },
                            {
                                label: 'Expediente',
                                data: expedienteData,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1,
                                pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                                borderRadius: 40,
                                borderSkipped: false,
                                responsive: true,
                                maintainAspectRatio: false,
                            },
                            {
                                label: 'Actualizados',
                                data: expedienteUpdateData,
                                backgroundColor: 'rgba(80, 197, 121, 0.2)',
                                borderColor: 'rgba(80, 197, 121, 1)',
                                borderWidth: 1,
                                pointBackgroundColor: 'rgba(80, 197, 121, 1)',
                                borderRadius: 40,
                                borderSkipped: false,
                                responsive: true,
                                maintainAspectRatio: false,
                            }
                        ],
                    },
                    options: {
                        plugins: {
                            legend: {
                                display: true,
                            },
                            tooltip: {
                                boxPadding: 3,
                            },
                        },
                        animation: {
                            onComplete: () => {
                                delayed = true;
                            },
                            delay: (context) => {
                                let delay = 0;
                                if (context.type === 'data' && context.mode === 'default' && !delayed) {
                                    delay = context.dataIndex * 300 + context.datasetIndex * 100;
                                }
                                return delay;
                                },
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                            },
                        },
                    },
                });
            }
        },
        error: function(error) {
            console.error('Error en la petición AJAX:', error);
        }
    });
}

let myChart1 = null;

function conteoMunicipios() {
    var mes = document.getElementById('actividadMunicipios').value;

    $.ajax({
        type: "POST",
        url: "query/queryMunicipioGeneral.php",
        dataType: "json",
        data: {
            mes:mes
        },
        cache: false,
        success: function(response) {
            //console.log ("Identado por Anny: ",response);
            //return;
            var jsonData = JSON.parse(JSON.stringify(response));
            console.log('Respuesta JSON:', jsonData);

            if (Array.isArray(response)) {
                //console.log('Número de elementos en el array:', jsonData.length);
                var x = response.length;
                
                const arrayConcatenado = [...response[0], ...response[1], ...response[2], ...response[3]];
                
                const datosAgrupados = arrayConcatenado.reduce((acumulador, objetoActual) => {
                    if (objetoActual.municipio) {
                        const municipio1 = objetoActual.municipio;
                        
                        // Si el municipio no existe en el acumulador, lo inicializamos con el objeto actual.
                        // Si ya existe, usamos Object.assign para fusionar el objeto actual con el existente.
                        acumulador[municipio1] = acumulador[municipio1] 
                        ? Object.assign(acumulador[municipio1], objetoActual)
                        : { ...objetoActual };
                    }

                    return acumulador;
                }, {}); // El objeto inicial del acumulador es un objeto vacío
                // Iterar sobre cada elemento en el array

                console.log('datosAgrupados',datosAgrupados);

                /* console.log('Este es el array concatenado ',arrayConcatenado); */
                //console.log('xxx ',arrayConcatenado[1]);
                var y = datosAgrupados.length;

                // 1. Obtener el array de municipios para las etiquetas
                const etiquetasMunicipios = Object.keys(datosAgrupados);

                // 2. Obtener un array con los valores para la serie de datos (por ejemplo, 'tarjeton')
                const datosEtiquetas = etiquetasMunicipios.map(municipio => datosAgrupados[municipio].municipio);
                const datosCredenciales = etiquetasMunicipios.map(municipio => datosAgrupados[municipio].credenciales);
                const datosTarjeton = etiquetasMunicipios.map(municipio => datosAgrupados[municipio].tarjetones);
                const datosExpedientes = etiquetasMunicipios.map(municipio => datosAgrupados[municipio].expedientes);
                const datosExpedientesAct = etiquetasMunicipios.map(municipio => datosAgrupados[municipio].expedientesActualizados);

                console.log('datosTarjeton',datosTarjeton);
                
                if (myChart1) {
                    myChart1.destroy();
                }
                
                // Crear el gráfico

                const ctx = document.getElementById('myChartMunicipios').getContext('2d');
                let delayed;
                myChart1 = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: 
                            datosEtiquetas
                        ,
                        datasets: [
                            {
                                label: 'Credencial',
                                data: datosCredenciales,
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1,
                                pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                                borderRadius: 40,
                                borderSkipped: false,
                                responsive: true,
                                maintainAspectRatio: false,
                            },
                            {
                                label: 'Tarjeton',
                                data: datosTarjeton,
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1,
                                pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                                borderRadius: 40,
                                borderSkipped: false,
                                responsive: true,
                                maintainAspectRatio: false,
                            },
                            {
                                label: 'Expediente',
                                data: datosExpedientes,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1,
                                pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                                borderRadius: 40,
                                borderSkipped: false,
                                responsive: true,
                                maintainAspectRatio: false,
                            },
                            {
                                label: 'Actualizados',
                                data: datosExpedientesAct,
                                backgroundColor: 'rgba(80, 197, 121, 0.2)',
                                borderColor: 'rgba(80, 197, 121, 1)',
                                borderWidth: 1,
                                pointBackgroundColor: 'rgba(80, 197, 121, 1)',
                                borderRadius: 40,
                                borderSkipped: false,
                                responsive: true,
                                maintainAspectRatio: false,
                            }
                        ],
                    },
                    options: {
                        plugins: {
                            legend: {
                                display: true,
                            },
                            tooltip: {
                                boxPadding: 3,
                            },
                        },
                        animation: {
                            onComplete: () => {
                                delayed = true;
                            },
                            delay: (context) => {
                                let delay = 0;
                                if (context.type === 'data' && context.mode === 'default' && !delayed) {
                                    delay = context.dataIndex * 300 + context.datasetIndex * 100;
                                }
                                return delay;
                                },
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                            },
                        },
                    },
                });
            }

            

        },
        error: function(error) {
            console.error('Error en la petición AJAX:', error);
        }
    });
}

conteoMunicipios();

function datosGenerales(){
    $.ajax({
      type: "POST",
      url: "admin/query/datosGenerales.php", // Cambia esto por la ruta de tu script PHP
      dataType: "json",
      success: function(data) {
        // var jsonData = JSON.parse(data);
        var jsonData = JSON.parse(JSON.stringify(data));
        console.log('Respuesta JSON:', jsonData);
        // var total_espacios = jsonData.total_espacios;
        // console.log('Totalespacios:', total_espacios);
        
        if (Array.isArray(jsonData)) {
          console.log('Número de elementos en el array:', jsonData.length);
          var espacios, espaciosTotal, porcentaje;
      
          let espaciosTotal2 = 0; // Inicializamos la variable

          for (var i = 0; i < jsonData.length; i++) {
              var municipios2 = jsonData[i];
              let espacios2; // Variable para almacenar los espacios actuales del municipio

              if (municipios2.cantidad_espacios_intervenidos == null) {
                  espacios2 = 0;
              } else {
                espacios2 = parseInt(municipios2.cantidad_espacios_intervenidos, 10); // Usar parseFloat si hay decimales    
              }

              // Sumar al total
              espaciosTotal2 = espaciosTotal2 + espacios2; // Suma correctamente
          }

          console.log('El total de espacios intervenidos es:', espaciosTotal2);

          for (var i = 0; i < jsonData.length; i++) {
            var municipios = jsonData[i];

            // porcentajes
            var porcentaje = 0;

            var mun = municipios.municipio; // El id del elemento
            if (municipios.cantidad_espacios_intervenidos == null){
              espacios = 0;
              
            }
            else{
              espacios = municipios.cantidad_espacios_intervenidos; // Otra información asociada
            }
            
            console.log('Municipio:', mun);
            console.log('Número de espacios:', espacios);
        
            // Busca el elemento en el DOM
            var elemento = document.getElementById(mun);

            porcentaje = (espacios * 100)/(espaciosTotal2);
            console.log(porcentaje); 
        
            // Verifica si el elemento existe antes de modificarlo
            if (elemento) {
                // Cambia el color según la condición
                if (espacios > 0 ) {
                    elemento.style.fill = "#99e7ff"; // Color para más de 0 espacios
                    elemento.style.stroke = "#004f67"; // Color para más de 0 espacios
                } else {
                    elemento.style.fill = "#004f67"; // Color para 0 espacios
                    elemento.style.stroke = "#99e7ff"; // Color para 0 espacios
                }
            } else {
                console.error(`Elemento con ID "${mun}" no encontrado en el DOM.`);
            }
        }
        
        } 
      },
      error: function(xhr, status, error) {
          console.error('Error en AJAX:', error);
          console.log('Estado:', status);
          console.log('Respuesta del servidor:', xhr.responseText);
      }
  });

  }