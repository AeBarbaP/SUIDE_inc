function localidadesSelect(x){
        document.getElementById('localidades').value = "";
        document.getElementById('asentamiento').value = "";
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
