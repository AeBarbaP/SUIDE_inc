

function municipiosSelect(x){
        var cveEstado = x;
        $.ajax({
            type:"POST",
            url:"query/queryMunicipio.php",
            data:{
                cveEstado:cveEstado
            },
            dataType: "html",
            cache: false,
                success: function(response)
                { 
                $('#municipiosList').fadeIn(1000).html(response);
                }
            });
    }
