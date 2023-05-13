let locationScroll = $(window).scrollTop()
 $(window).on('scroll', function() {
    let scrollCurrent = $(window).scrollTop()
    if (locationScroll >= scrollCurrent) {
        $('header > nav').css('top', '0px')
    } else {
        $('header > nav').css('top', '-100px')
    }
    locationScroll = scrollCurrent
 })
