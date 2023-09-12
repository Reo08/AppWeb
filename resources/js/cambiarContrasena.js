const d = document

const $form = d.querySelector('.formCambioContrasena')
const $alerta = d.querySelector('.small')


$form.addEventListener('submit', e =>{

    if($form.contrasena_nueva.value !== $form.contrasena_nueva2.value){
        e.preventDefault()
        $alerta.classList.remove('none')
    }else {
        $alerta.classList.add('none')
    }
})