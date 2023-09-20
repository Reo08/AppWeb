const d = document

const $btnBurguer = d.querySelector('.boton-sec-nav')
const $btnBurguerTexto = d.querySelector('.boton-sec-nav p')
const $navegador = d.querySelector('.sec-nav')


$btnBurguer.addEventListener('click', e=> {


    if($btnBurguerTexto.textContent == ">"){
        $navegador.classList.toggle('ver-sec-nav')
        $btnBurguerTexto.textContent = "<"
    }else {
        $navegador.classList.toggle('ver-sec-nav')
        $btnBurguerTexto.textContent = ">"
    }
})