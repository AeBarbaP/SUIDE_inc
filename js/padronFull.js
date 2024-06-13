function filtroPadronFull(x){
    var cadenaTexto = x;
    document.getElementById("myTablePCD").innerHTML = "";
    var discapacidad = document.getElementById("tipoDiscapacidadFull").value;
    var municipio = document.getElementById("municipiosList2").value;

    if (discapacidad == ""){
        var flag = 1;
        $.ajax({
            type:"POST",
            url:"query/queryPadronFullFiltro.php",
            data:{
                cadenaTexto:cadenaTexto,
                municipio:municipio,
                flag:flag
            },
            dataType:"html",
            success: function(data)
            {
                $('#myTablePCD').fadeIn(1000).html(data);
            }
        });
    }
    else if (discapacidad == "" && municipio == ""){
        var flag = 2;
        $.ajax({
            type:"POST",
            url:"query/queryPadronFullFiltro.php",
            data:{
                cadenaTexto:cadenaTexto,
                flag:flag
            },
            dataType:"html",
            success: function(data)
            {
                $('#myTablePCD').fadeIn(1000).html(data);
            }
        });
    }
    else if (municipio == ""){ 
        flag = 3;
        $.ajax({
            type:"POST",
            url:"query/queryPadronFullFiltro.php",
            data:{
                cadenaTexto:cadenaTexto,
                discapacidad:discapacidad,
                flag:flag
            },
            dataType:"html",
            success: function(data)
            {
                $('#myTablePCD').fadeIn(1000).html(data);
            }
        });
    }
    else {
        flag = 4;
        $.ajax({
            type:"POST",
            url:"query/queryPadronFullFiltro.php",
            data:{
                municipio:municipio,
                discapacidad:discapacidad,
                flag:flag
            },
            dataType:"html",
            success: function(data)
            {
                $('#myTablePCD').fadeIn(1000).html(data);
            }
        });
    }
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