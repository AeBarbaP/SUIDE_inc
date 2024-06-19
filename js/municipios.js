

function municipiosSelect(x){
        document.getElementById('municipiosList').value = "";
        document.getElementById('localidades').value = "";
        document.getElementById('asentamiento').value = "";
        var cveEstado = x;
        $.ajax({
            type:"POST",
            url:"query/queryMunicipio.php",
            data:{
                cveEstado:cveEstado
            },
            dataType: "html",
            //cache: false,
                success: function(response)
                { 
                $('#municipiosList').fadeIn(1000).html(response);
                }
            });
    }
function municipiosSelect2(x){
        var cveEstado = x;
        $.ajax({
            type:"POST",
            url:"query/queryMunicipio.php",
            data:{
                cveEstado:cveEstado
            },
            dataType: "html",
            //cache: false,
                success: function(response)
                { 
                $('#municipiosList2').fadeIn(1000).html(response);
                }
            });
    }
function municipiosSelect3(x){
        var cveEstado = x;
        $.ajax({
            type:"POST",
            url:"query/queryMunicipio.php",
            data:{
                cveEstado:cveEstado
            },
            dataType: "html",
            //cache: false,
                success: function(response)
                { 
                $('#municipiosList3').fadeIn(1000).html(response);
                }
            });
    }
