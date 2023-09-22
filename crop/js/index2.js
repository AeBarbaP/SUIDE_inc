let cropper = null;

function cropPhoto() {
    let image = document.getElementById('img-cropper')
    let input = document.getElementById('input-file')

    const myModal = new bootstrap.Modal(document.getElementById('cropModal'))
    myModal.show

    let archivos = input.files
    let extensiones = input.value.substring(input.value.lastIndexOf('.'), input.value.lenght)
    

    if(!archivos || !archivos.length){        
        image.src = "";
        input.value = "";
        
    } else if(input.getAttribute('accept').split(',').indexOf(extensiones) < 0){
        alert('Debes seleccionar una imagen')
        input.value = "";

    } else {
        let imagenUrl = URL.createObjectURL(archivos[0])
        image.src = imagenUrl

        cropper = new Cropper(image, {
            aspectRatio: 2/3, // es la proporción en la que queremos que recorte en este caso 1:1
            preview: '.img-sample', // contenedor donde se va a ir viendo en tiempo real la imagen cortada
            zoomable: true, //Para que no haga zoom 
            viewMode: 1, //Para que no estire la imagen al contenedor
            responsive: false, //Para que no reacomode con zoom la imagen al contenedor
            dragMode: 'none', //Para que al arrastrar no haga nada
            ready(){ // metodo cuando cropper ya este activo, le ponemos el alto y el ancho del contenedor de cropper al 100%
                document.querySelector('.cropper-container').style.width = '100%'
                document.querySelector('.cropper-container').style.height = '100%'
            }
        })


        /* $('.modal #credencialEmpleados').addClass('remove')

        $('.cropModal').addClass('active')
        $('.contentCropModal').addClass('active')

        $('.cropModal').removeClass('remove')
        $('#.ontentCropModal').removeClass('remove') */
    }
}

$('#close').on('click', () => {
    let image = document.getElementById('img-cropper')
    let input = document.getElementById('input-file')

    image.src = "";
    input.value = "";

    cropper.destroy()

    $('#cropModal').addClass('remove')
    $('#contentCropModal').addClass('remove')

    $('#cropModal').removeClass('active')
    $('#contentCropModal').removeClass('active')
})

$('#cut').on('click', () => {
    let crop_image = document.getElementById('crop-image')
    let canva = cropper.getCroppedCanvas()
    let image = document.getElementById('img-cropper')
    let input = document.getElementById('input-file')
    /* var img = canva.toDataURL(["image/jpeg","image/jpg"]); */ 

    
    canva.toBlob(function(blob){
        let url_cut = URL.createObjectURL(blob)
        crop_image.src = url_cut;
        foto3();
        
    })

    
    image.src = "";
    input.value = "";
    
    cropper.destroy()
    
    $('#cropModal').addClass('remove')
    $('#contentCropModal').addClass('remove')
    
    $('#cropModal').removeClass('active')
    $('#contentCropModal').removeClass('active')
})
