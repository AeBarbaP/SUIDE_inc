function saveFlags(){
    var checkAllSi = document.getElementById('checkAllSi'),
        checkAllNo = document.getElementById('checkAllNo');

        $.ajax({
            type:"POST",
            url:"query/queryLocalidades.php",
            data:{
                checkAllSi:checkAllSi,
                checkAllNo:checkAllNo
            },
            dataType: "html",
            cache: false,
                success: function(response)
                { 
                $('#localidadesList').fadeIn(1000).html(response);
                }
            });
    }