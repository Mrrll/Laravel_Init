// Funcion para visualizar una imagen antes de guardarla.
function previewImage(event, querySelector, queryPreview){

	//Recuperamos el input que desencadeno la acción
	const input = event.target;

	//Recuperamos las etiquetas img donde cargaremos la imagen
	 let imgPreview = document.querySelector(querySelector);
	 let preview = document.querySelector(queryPreview);

    // Escondemos la imagen vista por la nueva
    $(preview).addClass('d-none');
    $(imgPreview).removeClass('d-none');

	// Verificamos si existe una imagen seleccionada
	if(!input.files.length) return

	//Recuperamos el archivo subido
	let file = input.files[0];

	//Creamos la url
	let objectURL = URL.createObjectURL(file);

	//Modificamos el atributo src de la etiqueta img
	imgPreview.src = objectURL;

}
window.previewImage = previewImage;

// Funcion que activa o desactiva el boton del formulario.
$('form').on('change', function (e) {
    // console.log(e.target);
    let btn = null
    $('form').find('button[type="submit"]').each( function () {
        btn = this.id
    })
    if ($(e.target).val() === '') {
        console.log($('#'+btn));
        $('#'+btn).addClass('disabled')
        console.log("Deshabilito");
    } else {
        $('#'+btn).removeClass('disabled')
        console.log("Habilito");
    }
    $('form').find('input, select, textarea').each( function () {
        if (this.type != 'hidden' && $(this).val() != '') {
            $('#'+btn).removeClass('disabled')
            return false
        }
    })

})

// Funcion que valida los formularios.
function validateForm(e) {
    let form = $(e.target)
    let valid = false
    form.find('input, select, textarea').each(function (i, element){
        if (element.type != 'hidden' && $(element).val() != '' ) {
            valid = true
        }
    })
    return valid
}
window.validateForm = validateForm;
