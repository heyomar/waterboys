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

  var header = $('.site__header__content')
  $(window).scroll(function () {
    var scroll = $(window).scrollTop()

    if (scroll >= 5) {
      header.addClass('solid-background').fadeIn()
    } else {
      header.removeClass('solid-background')
    }
  })

  $(document).ready(function(){
    if ($('#ninja_forms_form_7').length) {
    }else {
      $('#ninja_forms_form_7_response_msg').hide()
      $('#FormSubmitCopy').show()
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

const menu = '<use xlink:href="#icon-menu-open"></use'
const cross = '<use xlink:href="#icon-menu-close"></use'

burger.addEventListener('click', function () {
  document.getElementsByTagName('body')[0].classList.toggle('wb__nav-overflow')
  if (jQuery(nav).hasClass('active')) {
    jQuery(this).children('svg').html(menu)
  } else {
    jQuery(this).children('svg').html(cross)
  }
  nav.classList.toggle('active')
})

// Set progressbar width
function setDonationProgressBar() {
    var currentDonations = jQuery('.dash_progress span').html();
    var currentDonationsGoal = jQuery('.dash__goal span').html();

    currentDonations = currentDonations.replace(/,/g, "");
    currentDonationsGoal = currentDonationsGoal.replace(/,/g, "");

    // if (currentDonations > currentDonationsGoal && currentDonations < 90000) {
    //   jQuery('.dash__goal span').text(currentDonationsGoal * 2);
    //   currentDonationsGoal = currentDonationsGoal * 2;

    // } else if (currentDonations > 90000 && currentDonations < 135000) {
    //   jQuery('.dash__goal span').text(currentDonationsGoal * 3);
    //   currentDonationsGoal = currentDonationsGoal * 3;
    // }

    var barwidth = currentDonations / currentDonationsGoal * 100;
    jQuery('#progressbar').width(barwidth + '%');

}

setDonationProgressBar();
