const d = document



const $video = d.querySelector('input[name="video"]')
const $formulario = d.querySelector('.form-agregarModulo')
const $alerta = d.querySelector('.small')

$formulario.addEventListener('submit', e=> {
    let archivo = $video.files[0]

    if(archivo && archivo.size > 104857600){
        e.preventDefault()
        $alerta.classList.remove('none')
    }else {
        $alerta.classList.add('none')
    }
})