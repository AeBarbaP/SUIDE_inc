function imprimirSeleccion(nombre) {
    var ficha = document.getElementById(nombre);
    var ventimp = window.open(' ', 'popimpr');
    //var texto = "<center><p>.</p><p>...</p><p>.</p><h1 style='font-size: 2.5rem; font-family: 'Aboreto', cursive;'><strong>Morismas de Bracho</strong></h1><h1 style='font-size: 2rem; font-family: 'Aboreto', cursive;'>CANJE DE POLVORA</h1></center>";
    //var texto2 = "<center><p style='font-size: 2rem;'>CONSERVE SU TICKET</p><p style='font-size: 1.5rem;'>Únicamente presentando éste ticket se entregará la pólvora asignada para el día del evento</p><p style='font-size: 1.2rem;'>http://www.morismasdebracho.com.mx</p><p style='font-size: 1.2rem;'>Morismas de Bracho | 2022</p></center>";
    //ventimp.document.write(texto);
    ventimp.document.write(ficha.innerHTML);
    //ventimp.document.write(texto2);
    ventimp.document.close();
    ventimp.print();
    ventimp.close();
}
function imprimirEtiqueta(nombre) {
    var ficha = document.getElementById(nombre);
    var ventimp = window.open(' ', 'popimpr');
    var texto = "<center><h3 style='font-size: 1.7rem; font-family: Verdana, Geneva, Tahoma, sans-serif;'><strong></strong>";
    //var texto2 = "<center><p style='font-size: 2rem;'>CONSERVE SU TICKET</p><p style='font-size: 1.5rem;'>Únicamente presentando éste ticket se entregará la pólvora asignada para el día del evento</p><p style='font-size: 1.2rem;'>http://www.morismasdebracho.com.mx</p><p style='font-size: 1.2rem;'>Morismas de Bracho | 2022</p></center>";
    ventimp.document.write(texto);
    ventimp.document.write(ficha.innerHTML);
    //ventimp.document.write(texto2);
    ventimp.document.close();
    ventimp.print();
    ventimp.close();
}