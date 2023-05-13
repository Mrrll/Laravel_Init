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
