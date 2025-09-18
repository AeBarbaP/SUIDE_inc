function filtroPadronFull(pagina = 1){
    var cadenaTexto = document.getElementById('buscarFiltroPadron').value;
    //document.getElementById("myTablePCD").innerHTML = "";
    var discapacidad = document.getElementById('tipoDiscapacidadFull').value;
    var municipio = document.getElementById('municipiosList2').value;
    
    if (discapacidad == "" && cadenaTexto !== "" && municipio != ""){
        var flag = 1;
        var optionExpeiente = document.getElementById('expedienteSearch');
        var optionNombre = document.getElementById('nombreSearch');
        var option = "";
        
        if (optionExpeiente.checked){
            option = "1";
        }
        else if (optionNombre.checked){
            option = "2";
        }
        else{
            option = "0";
        }

        $.ajax({
            type:"POST",
            url:"query/queryPadronFullFiltro.php",
            data:{
                pagina:pagina,
                option:option,
                cadenaTexto:cadenaTexto,
                municipio:municipio,
                flag:flag
            },
            dataType:"html",
            success: function(data)
            {
                $('#myTablePCD').fadeIn(1000).html(data);
                 // Agregar evento a los botones de paginación
                $('.paginacion').on('click', function(e) {
                    e.preventDefault();
                    var pagina = $(this).data('pagina');
                    filtroPadronFull(pagina);
                });
            }
        });
    }
    else if (discapacidad == "" && municipio == "" && cadenaTexto != ""){
        var flag = 2;
        var optionExpeiente = document.getElementById('expedienteSearch');
        var optionNombre = document.getElementById('nombreSearch');
        var option = "";
        
        if (optionExpeiente.checked){
            option = "1";
        }
        else if (optionNombre.checked){
            option = "2";
        }
        else{
            option = "0";
        }

        $.ajax({
            type:"POST",
            url:"query/queryPadronFullFiltro.php",
            data:{
                pagina:pagina,
                option:option,
                cadenaTexto:cadenaTexto,
                flag:flag
            },
            dataType:"html",
            success: function(data)
            {
                $('#myTablePCD').fadeIn(1000).html(data);
                 // Agregar evento a los botones de paginación
                $('.paginacion').on('click', function(e) {
                    e.preventDefault();
                    var pagina = $(this).data('pagina');
                    filtroPadronFull(pagina);
                });
            }
        });
    }
    else if (municipio == "" && discapacidad != "" && cadenaTexto != ""){ 
        flag = 3;
        var optionExpeiente = document.getElementById('expedienteSearch');
        var optionNombre = document.getElementById('nombreSearch');
        var option = "";
        
        if (optionExpeiente.checked){
            option = "1";
        }
        else if (optionNombre.checked){
            option = "2";
        }
        else{
            option = "0";
        }

        $.ajax({
            type:"POST",
            url:"query/queryPadronFullFiltro.php",
            data:{
                pagina:pagina,
                option:option,
                cadenaTexto:cadenaTexto,
                discapacidad:discapacidad,
                flag:flag
            },
            dataType:"html",
            success: function(data)
            {
                $('#myTablePCD').fadeIn(1000).html(data);
                 // Agregar evento a los botones de paginación
                $('.paginacion').on('click', function(e) {
                    e.preventDefault();
                    var pagina = $(this).data('pagina');
                    filtroPadronFull(pagina);
                });
            }
        });
    }
    else if (discapacidad == "" && cadenaTexto == "" && municipio != ""){
        flag = 5;
        $.ajax({
            type:"POST",
            url:"query/queryPadronFullFiltro.php",
            data:{
                pagina:pagina,
                municipio:municipio,
                flag:flag
            },
            dataType:"html",
            success: function(data)
            {
                $('#myTablePCD').fadeIn(1000).html(data);
                 // Agregar evento a los botones de paginación
                $('.paginacion').on('click', function(e) {
                    e.preventDefault();
                    var pagina = $(this).data('pagina');
                    filtroPadronFull(pagina);
                });
            }
        });
    }
    else if (cadenaTexto == "" && municipio == "" && discapacidad != ""){
        flag = 6;
        $.ajax({
            type:"POST",
            url:"query/queryPadronFullFiltro.php",
            data:{
                pagina:pagina,
                discapacidad:discapacidad,
                flag:flag
            },
            dataType:"html",
            success: function(data)
            {
                $('#myTablePCD').fadeIn(1000).html(data);
                 // Agregar evento a los botones de paginación
                $('.paginacion').on('click', function(e) {
                    e.preventDefault();
                    var pagina = $(this).data('pagina');
                    filtroPadronFull(pagina);
                });
            }
        });
    }
    else if (cadenaTexto == "" && municipio != "" && discapacidad != "") {
        flag = 4;
        $.ajax({
            type:"POST",
            url:"query/queryPadronFullFiltro.php",
            data:{
                pagina:pagina,
                municipio:municipio,
                discapacidad:discapacidad,
                flag:flag
            },
            dataType:"html",
            success: function(data)
            {
                $('#myTablePCD').fadeIn(1000).html(data);
                 // Agregar evento a los botones de paginación
                $('.paginacion').on('click', function(e) {
                    e.preventDefault();
                    var pagina = $(this).data('pagina');
                    filtroPadronFull(pagina);
                });
            }
        });
    }
    else {
        /* flag = 7;
        $.ajax({
            type:"POST",
            url:"query/queryPadronFullFiltro.php",
            data:{
                municipio:municipio,
                discapacidad:discapacidad,
                cadenaTexto:cadenaTexto,
                flag:flag
            },
            dataType:"html",
            success: function(data)
            {
                $('#myTablePCD').fadeIn(1000).html(data);
            }
        }); */
        tablaPCDFull(pagina);
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