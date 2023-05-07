let check_menu = $('#btn_menu')
let btn_close_menu = $('.btn-close-menu')
let btn_menu = $('.btn-menu')
let profile = $('.profile')
let menu_header = $('.menu-header')
let text_btn = $('.aside span')
let btn_link = $('.aside a')
let list_menu = $('.list-menu')

if (check_menu.is(':checked')) {
  btn_close_menu.show()
  btn_menu.hide()
  profile.css('display', 'flex')
  menu_header.css('justify-content', 'start')
  text_btn.show()
  btn_link.css('justify-content', 'start')
  list_menu.each(function () {
    if ($(this).hasClass('dropend')) {
      $(this).removeClass('dropend')
      $(this).addClass('dropdown')
      let element_btn = $(this).find('.link-menu')
      element_btn.each(function () {
            if ($(this).data('bs-toggle') == 'dropdown') {
                $(this).attr('data-bs-toggle', 'collapse')
                $(this).attr('href', '#'+$(this).attr("slug"))
            }
        })
      let element_ul = $(element_btn).next()
      element_ul.removeClass('dropdown-menu')
      element_ul.addClass('collapse')
      element_ul.attr('id', element_ul.attr('slug'))
    }
  })
}
check_menu.on('click', () => {
  if (check_menu.is(':checked')) {
    btn_close_menu.show()
    btn_menu.hide()
    profile.css('display', 'flex')
    menu_header.css('justify-content', 'start')
    text_btn.show()
    btn_link.css('justify-content', 'start')
    list_menu.each(function () {
      if ($(this).hasClass('dropend')) {
        $(this).removeClass('dropend')
        $(this).addClass('dropdown')
        let element_btn = $(this).find('.link-menu')
        element_btn.each(function () {
            if ($(this).data('bs-toggle') == 'dropdown') {
                $(this).attr('data-bs-toggle', 'collapse')
                $(this).attr('href', '#'+$(this).attr("slug"))
            }
        })
        let element_ul = $(element_btn).next()
        element_ul.removeClass('dropdown-menu')
        element_ul.addClass('collapse')
        element_ul.attr('id', element_ul.attr('slug'))
      }
    })
  } else {
    btn_close_menu.hide()
    btn_menu.show()
    profile.css('display', 'none')
    menu_header.css('justify-content', 'center')
    text_btn.hide()
    btn_link.css('justify-content', 'center')
    list_menu.each(function () {
      if ($(this).hasClass('dropdown')) {
        $(this).removeClass('dropdown')
        $(this).addClass('dropend')
        let element_btn = $(this).find('.link-menu')
        console.log($(element_btn));
        element_btn.each(function () {
            if ($(this).attr('data-bs-toggle') == 'collapse') {
                $(this).attr('data-bs-toggle', 'dropdown');
                $(this).removeAttr('href');
            }
        })
        let element_ul = $(element_btn).next()
        element_ul.removeClass('collapse')
        element_ul.addClass('dropdown-menu')
        element_ul.removeAttr('id')
        element_ul.removeClass('show')
      }
    })
  }
})
