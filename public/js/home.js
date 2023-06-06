//scroll to top;
var amountScrolled = 300;
$(window).scroll(function () {
    if ($(window).scrollTop() > amountScrolled) {
        $('a.gotop-btn').fadeIn('slow');
    } else {
        $('a.gotop-btn').fadeOut('slow');
    }
});


$('a.gotop-btn').click(function () {
    $('html, body').animate({
        scrollTop: 0
    }, 700);
    return false;
});

//scroll to top ends;




//For adding Class to sticky header starts
function headerScrolled() {
    if ($(this).scrollTop() > 1) {
        $('nav').addClass("scrolled-header");
    }
    else {
        $('nav').removeClass("scrolled-header");
    }
}


$(window).scroll(function () {
    headerScrolled();
});
//For adding Class to sticky header starts ends


//change icon if menu bar is opened
$(".navbar-toggler").click(function () {
    $(".navbar-toggler span").toggleClass("fa-times");
    $(".navbar-toggler span").toggleClass("fa-bars");
});
  //change icon if menu bar is opened ends