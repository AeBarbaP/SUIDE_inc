
function tablaPCDFull(){
    $.ajax({
        type:"POST",
        url:"query/queryPadronFull.php",
        dataType: "html",
        success: function(response) { 
            $('#myTablePCD').html(response);
        }
    });
}


