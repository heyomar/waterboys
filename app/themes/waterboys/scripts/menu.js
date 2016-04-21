var burger = document.getElementById('hamburger')
var nav = document.getElementById('main-nav')

module.exports = () => {
  burger.addEventListener('click', () => {
    nav.classList.toggle('active')
  })
}
