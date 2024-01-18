function conteoExpNews(){

    $.ajax({
        type:"POST",
        url:"query/queryconteoExpNews.php",
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
                document.getElementById('ExpNews').innerHTML = filas;
                document.getElementById('CredD').innerHTML = filasExp;
                document.getElementById('TarjD').innerHTML = filasTar;
                document.getElementById('ExpD').innerHTML = filasAct;

                graph(filas,filasExp,filasTar,filasAct);
                
            }
        });

}
function graph(x,y,z,a){
var x1 = x;
var y1 = y;
var z1 = z;
var a1 = a;
console.log(x+','+y+','+z+','+a)
var ctx = document.getElementById("myChart").getContext("2d");
  var myChart = new Chart(ctx,{
    type:'doughnut',
    data:{
      labels:['Creados','Credenciales','Tarjetones','Acualizados'],
      datasets:[{
        label:'Num datos',
        data:[x1,y1,z1,a1],
        backgroundColor:[
          '#34a853',
          '#fbbc05',
          '#4b8bf5',
          '#eb5145'

        ]
      }]
    },
    options:{
      
    }
  }
  );
}