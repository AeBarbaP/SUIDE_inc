function filtroPadronFull(x){
    var cadenaTexto = x;
    document.getElementById("myTablePCD").innerHTML = "";

    $.ajax({
        type:"POST",
        url:"query/queryPadronFullFiltro.php",
        data:{
            cadenaTexto:cadenaTexto
        },
        dataType:"html",
        success: function(data)
        {
            $('#myTablePCD').fadeIn(1000).html(data);
        }
    });
}
/* 
    $(document).ready(function () {
        $('#buscarFiltroPadron').keyup(function () {
            var rex = new RegExp($(this).val(), 'i');
            $('.myTablePCD tr').hide();
            $('.myTablePCD tr').filter(function () {
                return rex.test($(this).text());
            }).show();
    
            })
            
    });
 */
/*     $(document).ready(function () {
        $("#buscarFiltroPadron").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#myTablePCD tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    }); */