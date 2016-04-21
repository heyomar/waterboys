(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

var menu = require('./menu.js');
menu();

},{"./menu.js":2}],2:[function(require,module,exports){
'use strict';

var burger = document.getElementById('hamburger');
var nav = document.getElementById('main-nav');

module.exports = function () {
  burger.addEventListener('click', function () {
    nav.classList.toggle('active');
  });
};

},{}]},{},[1])
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCJzY3JpcHRzL2VudHJ5LmpzIiwic2NyaXB0cy9tZW51LmpzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBOzs7QUNBQSxJQUFJLE9BQU8sUUFBUSxXQUFSLENBQVA7QUFDSjs7Ozs7QUNEQSxJQUFJLFNBQVMsU0FBUyxjQUFULENBQXdCLFdBQXhCLENBQVQ7QUFDSixJQUFJLE1BQU0sU0FBUyxjQUFULENBQXdCLFVBQXhCLENBQU47O0FBRUosT0FBTyxPQUFQLEdBQWlCLFlBQU07QUFDckIsU0FBTyxnQkFBUCxDQUF3QixPQUF4QixFQUFpQyxZQUFNO0FBQ3JDLFFBQUksU0FBSixDQUFjLE1BQWQsQ0FBcUIsUUFBckIsRUFEcUM7R0FBTixDQUFqQyxDQURxQjtDQUFOIiwiZmlsZSI6ImdlbmVyYXRlZC5qcyIsInNvdXJjZVJvb3QiOiIiLCJzb3VyY2VzQ29udGVudCI6WyIoZnVuY3Rpb24gZSh0LG4scil7ZnVuY3Rpb24gcyhvLHUpe2lmKCFuW29dKXtpZighdFtvXSl7dmFyIGE9dHlwZW9mIHJlcXVpcmU9PVwiZnVuY3Rpb25cIiYmcmVxdWlyZTtpZighdSYmYSlyZXR1cm4gYShvLCEwKTtpZihpKXJldHVybiBpKG8sITApO3ZhciBmPW5ldyBFcnJvcihcIkNhbm5vdCBmaW5kIG1vZHVsZSAnXCIrbytcIidcIik7dGhyb3cgZi5jb2RlPVwiTU9EVUxFX05PVF9GT1VORFwiLGZ9dmFyIGw9bltvXT17ZXhwb3J0czp7fX07dFtvXVswXS5jYWxsKGwuZXhwb3J0cyxmdW5jdGlvbihlKXt2YXIgbj10W29dWzFdW2VdO3JldHVybiBzKG4/bjplKX0sbCxsLmV4cG9ydHMsZSx0LG4scil9cmV0dXJuIG5bb10uZXhwb3J0c312YXIgaT10eXBlb2YgcmVxdWlyZT09XCJmdW5jdGlvblwiJiZyZXF1aXJlO2Zvcih2YXIgbz0wO288ci5sZW5ndGg7bysrKXMocltvXSk7cmV0dXJuIHN9KSIsInZhciBtZW51ID0gcmVxdWlyZSgnLi9tZW51LmpzJylcbm1lbnUoKVxuIiwidmFyIGJ1cmdlciA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdoYW1idXJnZXInKVxudmFyIG5hdiA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdtYWluLW5hdicpXG5cbm1vZHVsZS5leHBvcnRzID0gKCkgPT4ge1xuICBidXJnZXIuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCAoKSA9PiB7XG4gICAgbmF2LmNsYXNzTGlzdC50b2dnbGUoJ2FjdGl2ZScpXG4gIH0pXG59XG4iXX0=
