function localidadesSelect(x){
        var cveMunicipio = x;
        $.ajax({
            type:"POST",
            url:"query/queryLocalidades.php",
            data:{
                cveMunicipio:cveMunicipio
            },
            dataType: "html",
            cache: false,
                success: function(response)
                { 
                $('#localidadesList').fadeIn(1000).html(response);
                }
            });
    }
