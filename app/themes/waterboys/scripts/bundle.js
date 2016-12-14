;(function ($) {
  //––– –––––––––––––––––––––––––– –––//
  // get query strings
  //––– –––––––––––––––––––––––––– –––//
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



  //––– –––––––––––––––––––––––––– –––//
  // Sticky nav scroll background
  //––– –––––––––––––––––––––––––– –––//
  var header = $('.site__header__content')
  $(window).scroll(function () {
    var scroll = $(window).scrollTop()

    if (scroll >= 5) {
      header.addClass('solid-background').fadeIn()
    } else {
      header.removeClass('solid-background')
    }
  })



  //––– –––––––––––––––––––––––––– –––//
  // Custom msg groups form completion
  //––– –––––––––––––––––––––––––– –––//
  $(document).ready(function(){
    if ($('.ninja-forms-no-display')[0]) {
      $('#ninja_forms_form_7_response_msg').hide()
      $('#FormSubmitCopy').show()
    }else if(!$('.ninja-forms-no-display')[0]) {
    }
  })



  //––– –––––––––––––––––––––––––– –––//
  // Donation amounts selectors
  //––– –––––––––––––––––––––––––– –––//
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



  //––– –––––––––––––––––––––––––– –––//
  // Navigation
  //––– –––––––––––––––––––––––––– –––//
  var burger = document.querySelector('#hamburger')
  var nav = document.querySelector('#main-nav')

  const menu = '<use xlink:href="#icon-menu-open"></use'
  const cross = '<use xlink:href="#icon-menu-close"></use'

  burger.addEventListener('click', function () {
    document.getElementsByTagName('body')[0].classList.toggle('wb__nav-overflow')
		if ($('#open-svg').hasClass('active')) {
				$('#open-svg').addClass('inactive').removeClass('active');
				$('#close-svg').addClass('active').removeClass('inactive');
		}else {
				$('#close-svg').addClass('inactive').removeClass('active');
				$('#open-svg').addClass('active').removeClass('inactive');
		}
    nav.classList.toggle('active')
  })



	//––– –––––––––––––––––––––––––– –––//
	// Set progressbar width
	//––– –––––––––––––––––––––––––– –––//
	function setDonationProgressBar() {
	    var currentDonations = $('.dash__progress span').text();
	    var currentDonationsGoal = $('.dash__goal span').text();

	    currentDonations = currentDonations.replace(/,/g, "");
	    currentDonationsGoal = currentDonationsGoal.replace(/,/g, "");

	    var barwidth = currentDonations / currentDonationsGoal * 100;
	    $('#progressbar').width(barwidth + '%');
	}

	if ($('body').hasClass('single-player')) {
	    setDonationProgressBar();
	}else if ($('body').hasClass('kili')) {
	    setDonationProgressBar();
	}



	//––– –––––––––––––––––––––––––– –––//
	// Slick slider configuration
	//––– –––––––––––––––––––––––––– –––//
	$('.center').slick({
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



	//––– –––––––––––––––––––––––––– –––//
	// Call fitvids
	//––– –––––––––––––––––––––––––– –––//
	fitvids()


	//––– –––––––––––––––––––––––––– –––//
	// Make table sortable
	//––– –––––––––––––––––––––––––– –––//
	$('#roster__table').tablesorter();


// END MAIN FUNCTION
})(jQuery)
