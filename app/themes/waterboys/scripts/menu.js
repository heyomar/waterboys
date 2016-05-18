var burger = document.querySelector('#hamburger')
var nav = document.querySelector('#main-nav')

module.exports = () => {
  burger.addEventListener('click', () => {
    nav.classList.toggle('active')
    document.getElementsByTagName('body')[0].classList.toggle('wb__nav-overflow')
  })
}
