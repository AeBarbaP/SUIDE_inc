
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
                var datosTabla = Array(12).fill(0).map(() => ({ credencial: 0, tarjeton: 0, expediente: 0 }));

                // Iterar sobre cada elemento en el array
                for (var i = 0; i < jsonData.length; i++) {
                    var datosGenerales = jsonData[i];
                    var mes = datosGenerales.mes - 1; // Convertir el mes a un índice de 0 a 11
                    var credencial = datosGenerales.credencial;
                    var tarjeton = datosGenerales.tarjeton;
                    var expediente = datosGenerales.expediente;

                    // Agregar los datos al arreglo multidimensional
                    datosTabla[mes] = { credencial, tarjeton, expediente };
                }

                // Crear un arreglo para los datos del gráfico
                var credencialData = datosTabla.map(d => d.credencial);
                var tarjetonData = datosTabla.map(d => d.tarjeton);
                var expedienteData = datosTabla.map(d => d.expediente);

                // Crear el gráfico
                const ctx = document.getElementById('myChart').getContext('2d');
                let delayed;
                const myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [
                            'Ene', 'Feb', 'Mzo', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic',
                        ],
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
function conteoUsuarios() {
    
    $.ajax({
        type: "POST",
        url: "query/query_actividadUsers.php",
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

                // Crear el gráfico
                const ctx = document.getElementById('myChartUsers').getContext('2d');
                let delayed;
                const myChart = new Chart(ctx, {
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
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1,
                                pointBackgroundColor: 'rgba(75, 192, 192, 1)',
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

function conteoMunicipios() {
    
    $.ajax({
        type: "POST",
        url: "query/queryMunicipioGeneral.php",
        dataType: "json",
        cache: false,
        success: function(response) {
            //console.log ("Identado por Anny: ",response);
            //return;
            var jsonData = JSON.parse(JSON.stringify(response));
            console.log('Respuesta JSON:', jsonData);

            if (Array.isArray(response)) {
                //console.log('Número de elementos en el array:', jsonData.length);
                var x = response.length;
                
                const arrayConcatenado = [...response[0], ...response[1], ...response[2]];
                
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

                console.log('datosTarjeton',datosTarjeton);
                // Crear el gráfico
                const ctx = document.getElementById('myChartMunicipios').getContext('2d');
                let delayed;
                const myChart = new Chart(ctx, {
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
                            /* {
                                label: 'Actualizados',
                                data: expedienteUpdateData,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1,
                                pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                                borderRadius: 40,
                                borderSkipped: false,
                                responsive: true,
                                maintainAspectRatio: false,
                            } */
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