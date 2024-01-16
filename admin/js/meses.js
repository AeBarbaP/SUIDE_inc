function calendario() {
var año = 2023;
var mes = 2;

var diasMes = new Date(año, mes, 0).getDate();
var diasSemana = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre','Noviembre','Diciembre'];
var indiceMes = new Date(año, mes - 1, dia).getDay();

var indiceMes = mes - 1;

for (var dia = 1; dia <= diasMes; dia++) {
  // Ojo, hay que restarle 1 para obtener el mes correcto
  var indice = new Date(año, mes - 1, dia).getDay();
  console.log(`El día número ${dia} del mes ${meses[indiceMes]} del año ${año} es ${diasSemana[indice]}`);

    // const para = document.createElement("p"+dia);

    document.getElementById("calendarioGrid").innerHTML += '<div class="col-lg-2 col-md-4 col-sm-6"><div class="card mb-3" style="max-width: 540px;"><div class="row g-0"><div class="col-md-4 my-auto"><h1 class="text-center">'+dia+'</h1></div><div class="col-md-8 bg-primary"><div class="card-body"><h5 class="card-title text-light">'+diasSemana[indice]+'</h5><p class="card-text text-light">Actividades</p><p class="card-text text-light"><small class="text-body-light"><span class="badge me-1 rounded-pill text-bg-primary">9</span><span class="badge me-1 rounded-pill text-bg-secondary">9</span><span class="badge me-1 rounded-pill text-bg-success">9</span><span class="badge me-1 rounded-pill text-bg-danger">9</span><span class="badge me-1 rounded-pill text-bg-warning">9</span><span class="badge me-1 rounded-pill text-bg-info">9</span><span class="badge me-1 rounded-pill text-bg-light">9</span><span class="badge me-1 rounded-pill text-bg-dark">9</span></small></p></div></div></div></div></div><!--col-->';

}

}
