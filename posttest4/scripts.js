var nav = document.querySelector('.nav')
var menu = document.getElementById('show')
var close = document.getElementById('close')



function showMenu() {
    if (nav.style.display === 'flex') {
        nav.style.display = 'none'
        menu.style.display = 'block'
        close.style.display = 'none'
        mode.style.display ='inline-block'
        
    } else {
        nav.style.display = 'flex'
        menu.style.display = 'none'
        close.style.display = 'block'
        mode.style.display ='none'
    }
}

var mode = document.getElementById('mode')
var light = document.getElementById('light')
var dark = document.getElementById('dark')






mode.addEventListener('click', () => {
    if (dark.style.display === 'block') {
        dark.style.display = 'none'
        light.style.display = 'block'
    } else {
        dark.style.display = 'block'
        light.style.display = 'none'
    }
    document.body.classList.toggle('dark')
})

const popup = document.getElementById("popup");
const closeBtn = document.getElementById("close-btn");

popup.style.display = "block";
closeBtn.addEventListener("click", () => {
    popup.style.display = "none";
});