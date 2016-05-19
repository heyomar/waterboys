var $ = require('jquery');


module.exports = () => {
        $(function() {
        	var header = $('.solid-background');
        	$(window).scroll(function() {
        		var scroll = $(window).scrollTop();

        		if (scroll >= 50) {
        			header.addClass('solid-background').fadeIn();
        		} else {
        			header.removeClass('solid-background');
        		}
        	});
        });
}
