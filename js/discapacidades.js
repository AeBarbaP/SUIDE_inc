
function discapacidadTab(x){
        var disc = x;
        $.ajax({
            type:"POST",
            url:"query/queryDiscapacidad.php",
            data:{
                disc:disc
            },
            dataType: "html",
            cache: false,
                success: function(response)
                { 
                $('#discapacidadList').fadeIn(1000).html(response);
                }
            });
    }