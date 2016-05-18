(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){

'use strict'

var selectors = [
	'iframe[src*="player.vimeo.com"]',
	'iframe[src*="youtube.com"]',
	'iframe[src*="youtube-nocookie.com"]',
	'iframe[src*="kickstarter.com"][src*="video.html"]',
	'object'
]

var css = '.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}'

module.exports = function (selector, opts) {
	opts = opts || {}
	selector = selector || 'body'

	if (isObject(selector)) {
		opts = selector
		selector = 'body'
	}

	var containers = queryAll(selector)
	if (containers.length < 1) return

	if (!document.getElementById('fit-vids-style')) {
		var head = document.head || document.getElementsByTagName('head')[0]
		head.appendChild(styles())
	}

	var customSelector = toSelector(opts.players)
	var videoSelector = toSelector(selectors)

	if (customSelector.length) {
		videoSelector = videoSelector + ',' + customSelector
	}

	for (var i = 0, l = containers.length; i < l; i++) {
		var container = containers[i]
		var videos = queryAll(container, videoSelector)
		for (var j = 0, ll = videos.length; j < ll; j++) {
			wrap(videos[j])
		}
	}
}

function queryAll (el, selector) {
	if (typeof el === 'string') {
		selector = el
		el = document
	}
	return Array.prototype.slice.call(el.querySelectorAll(selector))
}

function wrap (el) {
	if (/fluid-width-video-wrapper/.test(el.parentNode.className)) return

	var widthAttr = parseInt(el.getAttribute('width'), 10)
	var heightAttr = parseInt(el.getAttribute('height'), 10)

	var width = !isNaN(widthAttr) ? widthAttr : el.clientWidth
	var height = !isNaN(heightAttr) ? heightAttr : el.clientHeight
	var aspect = height / width

	el.removeAttribute('width')
	el.removeAttribute('height')

	var wrapper = document.createElement('div')
	el.parentNode.insertBefore(wrapper, el)
	wrapper.className = 'fluid-width-video-wrapper'
	wrapper.style.paddingTop = (aspect * 100) + '%'
	wrapper.appendChild(el)
}

function toSelector (input) {
	if (typeof input === 'undefined') return ''
	return Array.isArray(input) ? input.join() : input
}

function styles () {
	var div = document.createElement('div')
	div.innerHTML = '<p>x</p><style id="fit-vids-style">' + css + '</style>'
	return div.childNodes[1]
}

function isObject (input) {
	return Object.prototype.toString.call(input) === '[object Object]'
}

},{}],2:[function(require,module,exports){
'use strict';

var menu = require('./menu.js');
menu();

var videos = require('./videos.js');
videos();

},{"./menu.js":3,"./videos.js":4}],3:[function(require,module,exports){
'use strict';

var burger = document.querySelector('#hamburger');
var nav = document.querySelector('#main-nav');

module.exports = function () {
  burger.addEventListener('click', function () {
    nav.classList.toggle('active');
    document.getElementsByTagName('body')[0].classList.toggle('wb__nav-overflow');
  });
};

},{}],4:[function(require,module,exports){
'use strict';

module.exports = require('fitvids');

},{"fitvids":1}]},{},[2])
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCJub2RlX21vZHVsZXMvZml0dmlkcy9pbmRleC5qcyIsInNjcmlwdHMvZW50cnkuanMiLCJzY3JpcHRzL21lbnUuanMiLCJzY3JpcHRzL3ZpZGVvcy5qcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtBQ0FBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7Ozs7QUN4RkEsSUFBSSxPQUFPLFFBQVEsV0FBUixDQUFQO0FBQ0o7O0FBRUEsSUFBSSxTQUFTLFFBQVEsYUFBUixDQUFUO0FBQ0o7Ozs7O0FDSkEsSUFBSSxTQUFTLFNBQVMsYUFBVCxDQUF1QixZQUF2QixDQUFUO0FBQ0osSUFBSSxNQUFNLFNBQVMsYUFBVCxDQUF1QixXQUF2QixDQUFOOztBQUVKLE9BQU8sT0FBUCxHQUFpQixZQUFNO0FBQ3JCLFNBQU8sZ0JBQVAsQ0FBd0IsT0FBeEIsRUFBaUMsWUFBTTtBQUNyQyxRQUFJLFNBQUosQ0FBYyxNQUFkLENBQXFCLFFBQXJCLEVBRHFDO0FBRXJDLGFBQVMsb0JBQVQsQ0FBOEIsTUFBOUIsRUFBc0MsQ0FBdEMsRUFBeUMsU0FBekMsQ0FBbUQsTUFBbkQsQ0FBMEQsa0JBQTFELEVBRnFDO0dBQU4sQ0FBakMsQ0FEcUI7Q0FBTjs7Ozs7QUNIakIsT0FBTyxPQUFQLEdBQWtCLFFBQVEsU0FBUixDQUFsQiIsImZpbGUiOiJnZW5lcmF0ZWQuanMiLCJzb3VyY2VSb290IjoiIiwic291cmNlc0NvbnRlbnQiOlsiKGZ1bmN0aW9uIGUodCxuLHIpe2Z1bmN0aW9uIHMobyx1KXtpZighbltvXSl7aWYoIXRbb10pe3ZhciBhPXR5cGVvZiByZXF1aXJlPT1cImZ1bmN0aW9uXCImJnJlcXVpcmU7aWYoIXUmJmEpcmV0dXJuIGEobywhMCk7aWYoaSlyZXR1cm4gaShvLCEwKTt2YXIgZj1uZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiK28rXCInXCIpO3Rocm93IGYuY29kZT1cIk1PRFVMRV9OT1RfRk9VTkRcIixmfXZhciBsPW5bb109e2V4cG9ydHM6e319O3Rbb11bMF0uY2FsbChsLmV4cG9ydHMsZnVuY3Rpb24oZSl7dmFyIG49dFtvXVsxXVtlXTtyZXR1cm4gcyhuP246ZSl9LGwsbC5leHBvcnRzLGUsdCxuLHIpfXJldHVybiBuW29dLmV4cG9ydHN9dmFyIGk9dHlwZW9mIHJlcXVpcmU9PVwiZnVuY3Rpb25cIiYmcmVxdWlyZTtmb3IodmFyIG89MDtvPHIubGVuZ3RoO28rKylzKHJbb10pO3JldHVybiBzfSkiLCJcbid1c2Ugc3RyaWN0J1xuXG52YXIgc2VsZWN0b3JzID0gW1xuXHQnaWZyYW1lW3NyYyo9XCJwbGF5ZXIudmltZW8uY29tXCJdJyxcblx0J2lmcmFtZVtzcmMqPVwieW91dHViZS5jb21cIl0nLFxuXHQnaWZyYW1lW3NyYyo9XCJ5b3V0dWJlLW5vY29va2llLmNvbVwiXScsXG5cdCdpZnJhbWVbc3JjKj1cImtpY2tzdGFydGVyLmNvbVwiXVtzcmMqPVwidmlkZW8uaHRtbFwiXScsXG5cdCdvYmplY3QnXG5dXG5cbnZhciBjc3MgPSAnLmZsdWlkLXdpZHRoLXZpZGVvLXdyYXBwZXJ7d2lkdGg6MTAwJTtwb3NpdGlvbjpyZWxhdGl2ZTtwYWRkaW5nOjA7fS5mbHVpZC13aWR0aC12aWRlby13cmFwcGVyIGlmcmFtZSwuZmx1aWQtd2lkdGgtdmlkZW8td3JhcHBlciBvYmplY3QsLmZsdWlkLXdpZHRoLXZpZGVvLXdyYXBwZXIgZW1iZWQge3Bvc2l0aW9uOmFic29sdXRlO3RvcDowO2xlZnQ6MDt3aWR0aDoxMDAlO2hlaWdodDoxMDAlO30nXG5cbm1vZHVsZS5leHBvcnRzID0gZnVuY3Rpb24gKHNlbGVjdG9yLCBvcHRzKSB7XG5cdG9wdHMgPSBvcHRzIHx8IHt9XG5cdHNlbGVjdG9yID0gc2VsZWN0b3IgfHwgJ2JvZHknXG5cblx0aWYgKGlzT2JqZWN0KHNlbGVjdG9yKSkge1xuXHRcdG9wdHMgPSBzZWxlY3RvclxuXHRcdHNlbGVjdG9yID0gJ2JvZHknXG5cdH1cblxuXHR2YXIgY29udGFpbmVycyA9IHF1ZXJ5QWxsKHNlbGVjdG9yKVxuXHRpZiAoY29udGFpbmVycy5sZW5ndGggPCAxKSByZXR1cm5cblxuXHRpZiAoIWRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdmaXQtdmlkcy1zdHlsZScpKSB7XG5cdFx0dmFyIGhlYWQgPSBkb2N1bWVudC5oZWFkIHx8IGRvY3VtZW50LmdldEVsZW1lbnRzQnlUYWdOYW1lKCdoZWFkJylbMF1cblx0XHRoZWFkLmFwcGVuZENoaWxkKHN0eWxlcygpKVxuXHR9XG5cblx0dmFyIGN1c3RvbVNlbGVjdG9yID0gdG9TZWxlY3RvcihvcHRzLnBsYXllcnMpXG5cdHZhciB2aWRlb1NlbGVjdG9yID0gdG9TZWxlY3RvcihzZWxlY3RvcnMpXG5cblx0aWYgKGN1c3RvbVNlbGVjdG9yLmxlbmd0aCkge1xuXHRcdHZpZGVvU2VsZWN0b3IgPSB2aWRlb1NlbGVjdG9yICsgJywnICsgY3VzdG9tU2VsZWN0b3Jcblx0fVxuXG5cdGZvciAodmFyIGkgPSAwLCBsID0gY29udGFpbmVycy5sZW5ndGg7IGkgPCBsOyBpKyspIHtcblx0XHR2YXIgY29udGFpbmVyID0gY29udGFpbmVyc1tpXVxuXHRcdHZhciB2aWRlb3MgPSBxdWVyeUFsbChjb250YWluZXIsIHZpZGVvU2VsZWN0b3IpXG5cdFx0Zm9yICh2YXIgaiA9IDAsIGxsID0gdmlkZW9zLmxlbmd0aDsgaiA8IGxsOyBqKyspIHtcblx0XHRcdHdyYXAodmlkZW9zW2pdKVxuXHRcdH1cblx0fVxufVxuXG5mdW5jdGlvbiBxdWVyeUFsbCAoZWwsIHNlbGVjdG9yKSB7XG5cdGlmICh0eXBlb2YgZWwgPT09ICdzdHJpbmcnKSB7XG5cdFx0c2VsZWN0b3IgPSBlbFxuXHRcdGVsID0gZG9jdW1lbnRcblx0fVxuXHRyZXR1cm4gQXJyYXkucHJvdG90eXBlLnNsaWNlLmNhbGwoZWwucXVlcnlTZWxlY3RvckFsbChzZWxlY3RvcikpXG59XG5cbmZ1bmN0aW9uIHdyYXAgKGVsKSB7XG5cdGlmICgvZmx1aWQtd2lkdGgtdmlkZW8td3JhcHBlci8udGVzdChlbC5wYXJlbnROb2RlLmNsYXNzTmFtZSkpIHJldHVyblxuXG5cdHZhciB3aWR0aEF0dHIgPSBwYXJzZUludChlbC5nZXRBdHRyaWJ1dGUoJ3dpZHRoJyksIDEwKVxuXHR2YXIgaGVpZ2h0QXR0ciA9IHBhcnNlSW50KGVsLmdldEF0dHJpYnV0ZSgnaGVpZ2h0JyksIDEwKVxuXG5cdHZhciB3aWR0aCA9ICFpc05hTih3aWR0aEF0dHIpID8gd2lkdGhBdHRyIDogZWwuY2xpZW50V2lkdGhcblx0dmFyIGhlaWdodCA9ICFpc05hTihoZWlnaHRBdHRyKSA/IGhlaWdodEF0dHIgOiBlbC5jbGllbnRIZWlnaHRcblx0dmFyIGFzcGVjdCA9IGhlaWdodCAvIHdpZHRoXG5cblx0ZWwucmVtb3ZlQXR0cmlidXRlKCd3aWR0aCcpXG5cdGVsLnJlbW92ZUF0dHJpYnV0ZSgnaGVpZ2h0JylcblxuXHR2YXIgd3JhcHBlciA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ2RpdicpXG5cdGVsLnBhcmVudE5vZGUuaW5zZXJ0QmVmb3JlKHdyYXBwZXIsIGVsKVxuXHR3cmFwcGVyLmNsYXNzTmFtZSA9ICdmbHVpZC13aWR0aC12aWRlby13cmFwcGVyJ1xuXHR3cmFwcGVyLnN0eWxlLnBhZGRpbmdUb3AgPSAoYXNwZWN0ICogMTAwKSArICclJ1xuXHR3cmFwcGVyLmFwcGVuZENoaWxkKGVsKVxufVxuXG5mdW5jdGlvbiB0b1NlbGVjdG9yIChpbnB1dCkge1xuXHRpZiAodHlwZW9mIGlucHV0ID09PSAndW5kZWZpbmVkJykgcmV0dXJuICcnXG5cdHJldHVybiBBcnJheS5pc0FycmF5KGlucHV0KSA/IGlucHV0LmpvaW4oKSA6IGlucHV0XG59XG5cbmZ1bmN0aW9uIHN0eWxlcyAoKSB7XG5cdHZhciBkaXYgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KCdkaXYnKVxuXHRkaXYuaW5uZXJIVE1MID0gJzxwPng8L3A+PHN0eWxlIGlkPVwiZml0LXZpZHMtc3R5bGVcIj4nICsgY3NzICsgJzwvc3R5bGU+J1xuXHRyZXR1cm4gZGl2LmNoaWxkTm9kZXNbMV1cbn1cblxuZnVuY3Rpb24gaXNPYmplY3QgKGlucHV0KSB7XG5cdHJldHVybiBPYmplY3QucHJvdG90eXBlLnRvU3RyaW5nLmNhbGwoaW5wdXQpID09PSAnW29iamVjdCBPYmplY3RdJ1xufVxuIiwidmFyIG1lbnUgPSByZXF1aXJlKCcuL21lbnUuanMnKVxubWVudSgpXG5cbnZhciB2aWRlb3MgPSByZXF1aXJlKCcuL3ZpZGVvcy5qcycpXG52aWRlb3MoKVxuIiwidmFyIGJ1cmdlciA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNoYW1idXJnZXInKVxudmFyIG5hdiA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNtYWluLW5hdicpXG5cbm1vZHVsZS5leHBvcnRzID0gKCkgPT4ge1xuICBidXJnZXIuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCAoKSA9PiB7XG4gICAgbmF2LmNsYXNzTGlzdC50b2dnbGUoJ2FjdGl2ZScpXG4gICAgZG9jdW1lbnQuZ2V0RWxlbWVudHNCeVRhZ05hbWUoJ2JvZHknKVswXS5jbGFzc0xpc3QudG9nZ2xlKCd3Yl9fbmF2LW92ZXJmbG93JylcbiAgfSlcbn1cbiIsIm1vZHVsZS5leHBvcnRzID0gIHJlcXVpcmUoJ2ZpdHZpZHMnKVxuIl19
