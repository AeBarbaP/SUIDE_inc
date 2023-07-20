function saveFlagsno(){
    /* var checkAllSi = document.getElementById('checkAllSi'),
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
            }); */
    var doc = new jsPDF();
    var elementHTML = $('#tablaCheckPDF').html();
    var specialElementHandlers = {
        '#elementH': function (element, renderer) {
            return true;
        }
    };
    doc.fromHTML(elementHTML, 15, 15, {
        'width': 170,
        'elementHandlers': specialElementHandlers
    });
    
    // Save the PDF
    doc.save('sample-document.pdf');
    doc.autoPrint();
}