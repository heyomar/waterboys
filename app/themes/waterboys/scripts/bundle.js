;(function ($) {
  // http://stackoverflow.com/questions/901115/how-can-i-get-query-string-values-in-javascript#answer-3855394
  $.QueryString = (function (a) {
    if (a == '') return {}
    var b = {}
    for (var i = 0; i < a.length; ++i) {
      var p = a[i].split('=')
      if (p.length != 2) continue
      b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, ' '))
    }
    return b
  })(window.location.search.substr(1).split('&'))

  var header = $('.solid-background')
  $(window).scroll(function () {
    var scroll = $(window).scrollTop()

    if (scroll >= 5) {
      header.addClass('solid-background').fadeIn()
    } else {
      header.removeClass('solid-background')
    }
  })

  $('.wb__nav__ctn-item').on('mouseenter mouseleave', function () {
    $('.wb__nav__ctn-item').not('.active').toggleClass('compress')
    $(this).toggleClass('active').removeClass('compress')
  })

  $('.dn__select-amount-btn').on('click', function () {
    var donationAmount = $(this).data('donation')
    $('.dn__select-amount-btn').removeClass('active')
    $(this).addClass('active')
    $('#custom-amount').val(donationAmount + '.00')
  })

  $('#custom-amount').on('keydown', function () {
    $('.dn__select-amount-btn').removeClass('active')
  })

  if ($('body').hasClass('donate')) {
    // TODO: send this data to the service instead
    $('#ninja_forms_field_11').val($.QueryString['plyr'])
    $('#ninja_forms_field_12').val($.QueryString['grp'])
  }
})(jQuery)

fitvids()
jQuery(document).ready(function () { jQuery('#roster').tablesorter() })
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
})

var burger = document.querySelector('#hamburger')
var nav = document.querySelector('#main-nav')

burger.addEventListener('click', function () {
  nav.classList.toggle('active')
  document.getElementsByTagName('body')[0].classList.toggle('wb__nav-overflow')
})
