
function tablaPCDFull(){
    $.ajax({
        type:"POST",
        url:"query/queryPadronFull.php",
        dataType: "html",
        cache: false,
        success: function(response) { 
            $('#myTablePCD').fadeIn(1000).html(response);
        }
    });
}


