function estadosSelect(){
        var x = 1;
        
        $.ajax({
            type:"POST",
            url:"query/queryEstado.php",
            data:{
                x:x
            },
            dataType: "html",
            cache: false,
                success: function(response)
                { 
                $('#estadosList').fadeIn(1000).html(response);
                }
            });
    }
