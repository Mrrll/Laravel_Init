// Función de seleccionar tema de la aplicación
function SelectTheme(event, defaultValue) {
    let selected = event.target
    let preview = $('#theme_preview')[0]
    let url = preview.src.split("images/themes/");
    if (selected.value != defaultValue) {
        preview.src = url[0]+"images/themes/theme_"+selected.value+".png"
    }
}
window.SelectTheme = SelectTheme
