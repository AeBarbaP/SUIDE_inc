
function tablaPCDFull(pagina = 1){
    $.ajax({
        type:"POST",
        url:"query/queryPadronFull.php",
        data: { pagina: pagina },
        dataType: "html",
        success: function(response) { 
            $('#myTablePCD').html(response);
            // Agregar evento a los botones de paginación
            $('.paginacion').on('click', function(e) {
                e.preventDefault();
                var pagina = $(this).data('pagina');
                tablaPCDFull(pagina);
            });
        }
    });
}


