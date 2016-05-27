(function($) {

  var header = $('.solid-background');
  $(window).scroll(function() {
    var scroll = $(window).scrollTop();

    if (scroll >= 5) {
      header.addClass('solid-background').fadeIn();
    } else {
      header.removeClass('solid-background');
    }
  });

  $('.wb__nav__ctn-item').on('mouseenter mouseleave', function () {
    $('.wb__nav__ctn-item').not('.active').toggleClass('compress')
    $(this).toggleClass('active').removeClass('compress')
  })
})(jQuery)

fitvids()
jQuery(document).ready(function(){jQuery("#roster").tablesorter();});
jQuery('.center').slick({
  centerMode: true,
  centerPadding: '60px',
  slidesToShow: 3,
  responsive: [
    {
      breakpoint: 1000,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 2
      }
    },
    {
      breakpoint: 760,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});



var burger = document.querySelector('#hamburger')
var nav = document.querySelector('#main-nav')

burger.addEventListener('click', function(){
  nav.classList.toggle('active')
  document.getElementsByTagName('body')[0].classList.toggle('wb__nav-overflow')
})
