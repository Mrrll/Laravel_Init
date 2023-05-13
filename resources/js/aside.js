let check_menu = $('#btn_menu')
let btn_close_menu = $('.btn-close-menu')
let btn_menu = $('.btn-menu')
let profile = $('.profile')
let icon_content = $('.aside a.only-icon')
let text_content = $('.aside a span')
let li_content = $('.aside li')
let link_menu = $('.link-menu')
let menu_content = $('.menu-content')

if (check_menu.is(':checked')) {
    // Cambios de estilos del menu aside cuando esta abierto
    btn_close_menu.show()
    btn_menu.hide()
    profile.css('display', 'flex')
    icon_content.css('justify-content', 'start')
    text_content.css('display', 'inline-block')
    // Cambiamos el estilo de los botones del menu cuando esta abierto
    li_content.each(function () {
        // Cambiamos el contenedor cuando esta abierto
        if ($(this).hasClass('dropend')) {
            $(this).removeClass('dropend')
            $(this).addClass('dropdown')
        }
        // Cambiamos los botones del menu cuando esta abierto
        $(this).children().each(function () {
            if ($(this).data('bs-toggle') == 'dropdown') {
                $(this).attr('data-bs-toggle', 'collapse')
                $(this).attr('href', '#'+$(this).attr("slug"))
            }
            // Cambiamos el sub-contenido cuando esta abierto
            $(this).next().each(function () {
                $(this).removeClass('dropdown-menu')
                $(this).addClass('collapse')
                $(this).addClass('list-group')
                $(this).attr('id', $(this).attr('slug'))
                // Cambiamos los botones del sub-contenido cuando esta abierto
                $(this).find('a').each(function () {
                    $(this).addClass('list-group-item')
                    $(this).addClass('list-group-item-action')
                })
            })
        })
    })
    menu_content.css('width', '250px')
    menu_content.css('overflow-y', 'auto')
}

check_menu.on('click', () => {
    if (check_menu.is(':checked')) {
        // Cambios de estilos del menu aside cuando esta abierto
        btn_close_menu.show()
        btn_menu.hide()
        profile.css('display', 'flex')
        icon_content.css('justify-content', 'start')
        text_content.css('display', 'inline-block')
        // Cambiamos el estilo de los botones del menu cuando esta abierto
        li_content.each(function () {
            // Cambiamos el contenedor cuando esta abierto
            if ($(this).hasClass('dropend')) {
                $(this).removeClass('dropend')
                $(this).addClass('dropdown')
            }
            // Cambiamos los botones del menu cuando esta abierto
            $(this).children().each(function () {
                if ($(this).data('bs-toggle') == 'dropdown') {
                    $(this).attr('data-bs-toggle', 'collapse')
                    $(this).attr('href', '#'+$(this).attr("slug"))
                }
                // Cambiamos el sub-contenido cuando esta abierto
                $(this).next().each(function () {
                    $(this).removeClass('dropdown-menu')
                    $(this).addClass('collapse')
                    $(this).addClass('list-group')
                    $(this).attr('id', $(this).attr('slug'))
                    // Cambiamos los botones del sub-contenido cuando esta abierto
                    $(this).find('a').each(function () {
                        $(this).addClass('list-group-item')
                        $(this).addClass('list-group-item-action')
                    })
                })
            })
        })
        menu_content.css('width', '250px')
        menu_content.css('overflow-y', 'auto')
    } else {
        // Cambios de estilos del menu aside cuando esta cerrado
        btn_close_menu.hide()
        btn_menu.show()
        profile.css('display', 'none')
        icon_content.css('justify-content', 'center')
        text_content.hide()
        // Cambiamos el estilo de los botones del menu cuando esta cerrado
        li_content.each(function () {
            if($(this).hasClass('dropdown')){
                // Cambiamos el contenedor cuando esta cerrado
                $(this).removeClass('dropdown')
                $(this).addClass('dropend')
                // Cambiamos los botones del menu cuando esta cerrado
                $(this).children('a:first-child').removeAttr('href')
                $(this).children('a:first-child').removeAttr('data-bs-toggle')
                 $(this).children('a:first-child').attr('data-bs-toggle', 'dropdown')
                // Cambiamos el sub-contenido cuando esta cerrado
                $(this).children('a:first-child').next('ul').removeClass('collapse')
                $(this).children('a:first-child').next('ul').removeClass('list-group')
                $(this).children('a:first-child').next('ul').addClass('dropdown-menu')
                $(this).children('a:first-child').next('ul').removeAttr('id')
                $(this).children('a:first-child').next('ul').removeClass('show')
                // Cambiamos los botones del sub-contenido cuando esta cerrado
                $(this).children('a:first-child').next('ul').find('a').removeClass('list-group-item')
                $(this).children('a:first-child').next('ul').find('a').removeClass('list-group-item-action')

            }
        })
        menu_content.css('width', '85px')
        menu_content.css('overflow-y', '')
    }
})
