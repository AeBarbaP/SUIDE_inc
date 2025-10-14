/* globals Chart:false */

function conteoGeneral(){

  $.ajax({
      type:"POST",
      url:"query/queryconteoGeneral.php",
      dataType: "json",
      cache: false,
          success: function(response)
          { 
              var jsonData = JSON.parse(JSON.stringify(response));
              var filas = jsonData.filas;
              var filasExp = jsonData.filasExp;
              var filasTar = jsonData.filasTar;
              var filasAct = jsonData.filasAct;

              console.log("Nuevos registros: "+filas);
              console.log("Entrega credenciales: "+filasExp);
              console.log("Tarjetones entregados: "+filasTar);
              console.log("Expedientes actualizados: "+filasAct);

              (() => {
                'use strict'
              
                // Graphs
                const ctx = document.getElementById('myChart')
                
                // eslint-disable-next-line no-unused-vars
                const myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                    labels: [
                      'Nuevos registros',
                      'Actualizar expedientes',
                      'Tarjetones entregados',
                      'Expedientes Actualizados'
                    ],
                    datasets: [{
                      data: [
                        filas,
                        filasExp,
                        filasTar,
                        filasAct
                      ],
                      lineTension: 0,
                      backgroundColor: '',
                      borderColor: '#007bff',
                      borderWidth: 4,
                      pointBackgroundColor: '#007bff'
                    }]
                  },
                  options: {
                    plugins: {
                      legend: {
                        display: false
                      },
                      tooltip: {
                        boxPadding: 3
                      }
                    }
                  }
                })
              })()
              
          }
      });

}
let myChart;
function conteoFiltrado(){
  
  var mes = document.getElementById("mes").value;
  var annio = document.getElementById("annio").value;
  var usr = document.getElementById("colaborador").value;
  if(mes=="" || annio=="" || usr==""){
    alert("No se han llenado algunos campos");
  }
  else{

  $.ajax({
      type:"POST",
      url:"query/queryconteoFiltrado.php",
      data:{
        mes:mes,
        annio:annio,
        usr:usr
      },
      dataType: "json",
      cache: false,
          success: function(response)
          { 
              var jsonData = JSON.parse(JSON.stringify(response));
              var filas = jsonData.filas;
              var filasExp = jsonData.filasExp;
              var filasTar = jsonData.filasTar;
              var filasAct = jsonData.filasAct;
              var color = jsonData.color;

              console.log("Nuevos registros: "+filas);
              console.log("Entrega credenciales: "+filasExp);
              console.log("Tarjetones entregados: "+filasTar);
              console.log("Expedientes actualizados: "+filasAct);
              

              (() => {
                'use strict'
              
                // Graphs
                const ctx = document.getElementById('myChart')
                
                if (miGrafico!=null) {
                  miGrafico.destroy();
                }
              
                 // eslint-disable-next-line no-unused-vars
                 
                myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                    labels: [
                      'Nuevos registros',
                      'Actualizar expedientes',
                      'Tarjetones entregados',
                      'Expedientes Actualizados'
                    ],
                    datasets: [{
                      data: [
                        filas,
                        filasExp,
                        filasTar,
                        filasAct
                      ],
                      lineTension: 0,
                      backgroundColor: '',
                      borderColor: color,
                      borderWidth: 4,
                      pointBackgroundColor: '#007bff'
                    }]
                  },
                  options: {
                    plugins: {
                      legend: {
                        display: false
                      },
                      tooltip: {
                        boxPadding: 3
                      }
                    }
                  }
                })
              })()
              
          }
      });
  }

}
