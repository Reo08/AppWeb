const d = document

const $textarea = d.querySelector('textarea')
const $formulario = d.querySelector('.form-crearCurso')
const $alerta = d.querySelector('.smallArea')

$formulario.addEventListener('submit' , e=> {
    let exprecion = /^.{0,255}$/

    if(!exprecion.test($textarea.value)){
        $alerta.classList.remove('none')
        e.preventDefault()
    }else {
        $alerta.classList.add('none')
    }
})